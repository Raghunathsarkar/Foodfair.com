<?php

$host = "localhost";
$name  = "root";
$pass = "";
$dbname = "mahendra";

$conn = mysqli_connect($host,$name,$pass,$dbname);

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
session_start();
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	echo '<pre>';
	

	if($_POST['STATUS'] == 'TXN_SUCCESS' && $_GET['purpose'] == "prem"){
		$id = $_POST['ORDERID'];
		$status = $_POST['STATUS'];
		$currency = $_POST['CURRENCY'];
		$gname = $_POST['GATEWAYNAME'];
		$bname = $_POST['BANKNAME'];
		$txnid = $_POST['TXNID'];
		$txamt = $_POST['TXNAMOUNT'];
		$btxid = $_POST['BANKTXNID'];
		$txndate = $_POST['TXNDATE'];
		$userid = $_GET['custid'];
		$sql = "INSERT INTO `premium_order`(`amt`, `user_id`) VALUES ('$txamt','$userid')";
		if (mysqli_query($conn,$sql)) {
			$sql = "UPDATE `users` SET `user_prem`= '1' WHERE id = '$userid'";
			if (mysqli_query($conn,$sql)) {
				header('location:http://localhost/Class%20Projects/Projects/YMC');
			}
		}
		
	}

	if($_POST['STATUS'] == 'TXN_SUCCESS' && $_GET['purpose'] == "petrol"){
		$id = $_POST['ORDERID'];
		$status = $_POST['STATUS'];
		$currency = $_POST['CURRENCY'];
		$gname = $_POST['GATEWAYNAME'];
		$bname = $_POST['BANKNAME'];
		$txnid = $_POST['TXNID'];
		$txamt = $_POST['TXNAMOUNT'];
		$btxid = $_POST['BANKTXNID'];
		$txndate = $_POST['TXNDATE'];
		$userid = $_GET['custid'];
		$purpose = $_GET['purpose'];
		$address = $_GET['address'];
		$phone = $_GET['phone'];
		$qty = $_GET['qty'];
		$sql = "INSERT INTO `orders`(`amt`, `address`, `phone`, `order_type`, `order_qty`, `payment`, `user_id`) VALUES ('$txamt', '$address', '$phone', 'petrol', '$qty', 'online', '$userid')";
		if (mysqli_query($conn,$sql)) {
			header('location:http://localhost/Class%20Projects/Projects/YMC');
		}
		
	}

	if($_POST['STATUS'] == 'TXN_SUCCESS' && $_GET['purpose'] == "diesel"){
		$id = $_POST['ORDERID'];
		$status = $_POST['STATUS'];
		$currency = $_POST['CURRENCY'];
		$gname = $_POST['GATEWAYNAME'];
		$bname = $_POST['BANKNAME'];
		$txnid = $_POST['TXNID'];
		$txamt = $_POST['TXNAMOUNT'];
		$btxid = $_POST['BANKTXNID'];
		$txndate = $_POST['TXNDATE'];
		$userid = $_GET['custid'];
		$purpose = $_GET['purpose'];
		$address = $_GET['address'];
		$phone = $_GET['phone'];
		$qty = $_GET['qty'];
		$sql = "INSERT INTO `orders`(`amt`, `address`, `phone`, `order_type`, `order_qty`, `payment`, `user_id`) VALUES ('$txamt', '$address', '$phone', 'diesel', '$qty', 'online', '$userid')";
		if (mysqli_query($conn,$sql)) {
			header('location:http://localhost/Class%20Projects/Projects/YMC');
		}
		
	}

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>