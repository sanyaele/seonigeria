<?php
require_once ('includes/db.php');
require_once ('includes/common.php');
require_once ('includes/process_pay.php');

use Process\process AS initiate;
use Process\verify AS confirm;

if (empty($_SESSION['ref'])){
    // FORM HAS BEEN SUBMITTED, BUT PAYMENT HAS NOT BEEN INITIATED
    $make_pay = new initiate;
    if (!($make_pay->process_pay())){
        echo "Error: There was a problem Initiating this payment";
        exit();
    }
} else {
    // PAYMENT HAS BEEN INITIATED, VERIFY THE PAYMENT
    if (!($verify_pay = new confirm)){
        echo "Thank you. We will verify your payment and get back to you as soon as possible";
        exit();
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank you</title>
</head>
<body>
    <div>
        <img src="images/success.gif" alt="Transfer Successful" class="img-fluid">
    </div>
    <div>
      Your transfer was successful <a href="index.php" class="btn btn-info" target="_top">Continue</a>
    </div>
</body>
</html>