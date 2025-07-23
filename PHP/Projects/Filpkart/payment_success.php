<?php
session_start(); 


$conn = mysqli_connect("localhost", "root", "", "orderss");
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Razorpay SDK
require('Razorpay/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

// Razorpay API keys
$keyId = 'rzp_test_HJ28ri5GZ0Xw2b';
$keySecret = 'sCCYjzJfdYNvAxroArU5zyFH';

$success = true;
$error = "Payment Failed";

if (!empty($_POST['razorpay_payment_id']) && !empty($_POST['razorpay_order_id']) && !empty($_POST['razorpay_signature'])) {

    $api = new Api($keyId, $keySecret);

    
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $razorpay_order_id   = $_POST['razorpay_order_id'];
    $razorpay_signature  = $_POST['razorpay_signature'];

    try {
        // Verify the payment signature
        $attributes = [
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $razorpay_payment_id,
            'razorpay_signature' => $razorpay_signature
        ];

        $api->utility->verifyPaymentSignature($attributes);

    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Signature Error: ' . $e->getMessage();
    }

} else {
    $success = false;
    $error = "Missing payment data from Razorpay!";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Status</title>
</head>
<body>
    <?php if ($success): ?>
        <h2> Payment Successful</h2>
        <p>Payment ID: <strong><?php echo htmlspecialchars($razorpay_payment_id); ?></strong></p>

        <?php
        // Update DB status to 'paid'
        $sql = "UPDATE orders 
                SET status='paid' 
                WHERE razorpay_order_id='$razorpay_order_id'";

        if (mysqli_query($conn, $sql)) {
            echo "<p><strong>Database updated successfully!</strong></p>";
        } else {
            echo "<p> DB Error: " . mysqli_error($conn) . "</p>";
        }
        ?>

    <?php else: ?>
        <h2> Payment Failed</h2>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
