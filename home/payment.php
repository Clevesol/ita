<?php

require_once 'btstrp/braintree/lib/Braintree.php';
require 'opr/db/_con.php';
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('jbpkfbm4yz2h4jfp');
Braintree_Configuration::publicKey('d4bd8qfpr3x3k7d4');
Braintree_Configuration::privateKey('f1abde30489d7e62713693857419e947');

$result = Braintree_Transaction::sale(['amount' => $_POST['amount'], 'paymentMethodNonce' => $_POST['payment_method_nonce'], 'options' => ['submitForSettlement' => true,'storeInVaultOnSuccess' => false,]]);

if($result){
	$_conob = new _con();
	//echo $_POST['uid'] . ' ' . $_POST['orderid'] . ' ' . $_POST['amount'];
	$_conob->exeQuery("insert into payments(pid,uid,amount) values('{$_POST['orderid']}','{$_POST['uid']}','{$_POST['amount']}')");
	$_conob->exeQuery("update orders set status='3' where id='{$_POST['orderid']}' ");
	header('location:/home/activity.php');
}
/*
if ($result -> success) {

	print_r("success!: " . $result -> transaction -> id);
	$deresult = Braintree_PaymentMethod::delete($_POST['payment_method_nonce']);
	if ($deresult -> success)
		echo "success";
} else if ($result -> transaction) {
	print_r("Error processing transaction:");
	print_r("\n  code: " . $result -> transaction -> processorResponseCode);
	print_r("\n  text: " . $result -> transaction -> processorResponseText);
} else {
	print_r($_POST);
	echo "<br><br><br><br>";
	print_r("Validation errors: \n");
	print_r($result -> errors -> deepAll());
}
 * 
 */
 
 
?>