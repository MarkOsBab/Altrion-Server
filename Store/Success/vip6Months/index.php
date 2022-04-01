<?php  

/*/ Insert DB /*/
include '../../../assets/inc/paypal/insert_db/vip6Months.php';

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require "../../../assets/inc/paypal/app/start.php";
if(!isset($_GET["success"] , $_GET["paymentId"] , $_GET["PayerID"])){
	die();
}

if((bool) $_GET["success"] === false){
	die();
}

$paymentId = $_GET["paymentId"];
$payerId = $_GET["PayerID"];

$payment = Payment::get($paymentId,$apiContext );
$execute = new PaymentExecution();
$execute->setPayerId($payerId);

try{
	$result = $payment->execute($execute , $apiContext );
	/* var_dump($result); */
	vip6Months();
	header("Location: ../../Purchase_Success");
}
catch(Exception $e){
	$data = json_decode($e->getData());
	var_dump($data->message);
	die();
}
