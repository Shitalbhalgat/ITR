<?php
session_start(); // Needed for $_SESSION

require('Razorpay/Razorpay.php');
use Razorpay\Api\Api;

// Create DB connection
$conn = mysqli_connect("localhost", "root", "", "orderss");
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Razorpay API credentials
$keyId = 'rzp_test_HJ28ri5GZ0Xw2b';
$keySecret = 'sCCYjzJfdYNvAxroArU5zyFH';

// Initialize API
$api = new Api($keyId, $keySecret);

// Create Razorpay order
$orderData = [
    'receipt'         => 'rcptid_11',
    'amount'          => 2000 * 100, // amount in paise
    'currency'        => 'INR',
    'payment_capture' => 1
];

$order = $api->order->create($orderData);
$razorpay_order_id = $order['id'];

// Store in session (optional)
$_SESSION['razorpay_order_id'] = $razorpay_order_id;

// Save to DB
$sql = "INSERT INTO orders (razorpay_order_id, amount, status) 
        VALUES ('$razorpay_order_id', {$orderData['amount']}, 'created')";

if (!mysqli_query($conn, $sql)) {
    die("DB Error: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <form action="payment_success.php" method="POST">
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="<?php echo $keyId; ?>"
            data-amount="<?php echo $orderData['amount']; ?>"
            data-currency="INR"
            data-order_id="<?php echo $razorpay_order_id; ?>"
            data-buttontext="Pay Now"
            data-name="My Store"
            data-description="Test Transaction"
            data-image="https://s29.postimg.org/r6dj1g85z/daft_punk.jpg"
            data-prefill.name="John Doe"
            data-prefill.email="john@example.com"
            data-theme.color="#F37254">
        </script>
        <input type="hidden" name="order_id" value="<?php echo $razorpay_order_id; ?>">
    </form>
</body>
</html>
