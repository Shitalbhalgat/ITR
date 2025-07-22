<?php
require 'db.php';

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);
$method = $_POST['payment_method'];
$amount = 50000; 
// Insert order
$sql = "INSERT INTO orders (customer_name, email, contact, amount, payment_method)
        VALUES ('$name', '$email', '$contact', $amount, '$method')";
mysqli_query($conn, $sql);

$order_id = mysqli_insert_id($conn);

if ($method === 'cod') {
    header("Location: cod_thankyou.php?order_id=$order_id");
    exit;
} elseif ($method === 'razorpay') {
    // Razorpay order creation
    require 'vendor/autoload.php';
    $api = new \Razorpay\Api\Api('YOUR_KEY_ID', 'YOUR_KEY_SECRET');

    $razorpayOrder = $api->order->create([
        'receipt'         => "order_rcptid_$order_id",
        'amount'          => $amount,
        'currency'        => 'INR',
        'payment_capture' => 1
    ]);

    $razorpay_order_id = $razorpayOrder->id;

    // Update with Razorpay order_id
    $update = "UPDATE orders SET payment_id = '$razorpay_order_id' WHERE id = $order_id";
    mysqli_query($conn, $update);

    header("Location: razorpay_payment.php?order_id=$order_id");
    exit;
} else {
    echo "Invalid payment method.";
}
?>


razorpay_payment.php

<?php
require 'db.php';

$order_id = $_GET['order_id'];
$sql = "SELECT * FROM orders WHERE id = $order_id LIMIT 1";
$result = mysqli_query($conn, $sql);
$order = mysqli_fetch_assoc($result);

if (!$order) {
    die("Invalid order.");
}
?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<button id="rzp-button">Pay ₹<?php echo $order['amount']/100; ?></button>

<script>
var options = {
    "key": "<?php echo 'YOUR_KEY_ID'; ?>",
    "amount": "<?php echo $order['amount']; ?>",
    "currency": "INR",
    "name": "Your Store",
    "description": "Order #<?php echo $order_id; ?>",
    "order_id": "<?php echo $order['payment_id']; ?>",
    "handler": function (response){
        window.location.href = "razorpay_success.php?order_id=<?php echo $order_id; ?>&payment_id=" + response.razorpay_payment_id;
    },
    "prefill": {
        "name": "<?php echo $order['customer_name']; ?>",
        "email": "<?php echo $order['email']; ?>",
        "contact": "<?php echo $order['contact']; ?>"
    }
};
document.getElementById('rzp-button').onclick = function(e){
    var rzp = new Razorpay(options);
    rzp.open();
    e.preventDefault();
}
</script>


razorpay_success.php

<?php
require 'db.php';
require 'vendor/autoload.php';

use Razorpay\Api\Api;

$order_id = $_GET['order_id'];
$payment_id = $_GET['payment_id'];

$sql = "SELECT * FROM orders WHERE id = $order_id LIMIT 1";
$result = mysqli_query($conn, $sql);
$order = mysqli_fetch_assoc($result);

if (!$order) die("Order not found.");

$api = new Api('YOUR_KEY_ID', 'YOUR_KEY_SECRET');

try {
    $payment = $api->payment->fetch($payment_id);
    if ($payment->status === 'captured') {
        $update = "UPDATE orders SET status='paid', payment_id='$payment_id' WHERE id=$order_id";
        mysqli_query($conn, $update);
        echo "Payment successful!";
    } else {
        $update = "UPDATE orders SET status='failed' WHERE id=$order_id";
        mysqli_query($conn, $update);
        echo "Payment failed or not completed.";
    }
} catch (Exception $e) {
    echo "Error verifying payment: " . $e->getMessage();
}
?>
