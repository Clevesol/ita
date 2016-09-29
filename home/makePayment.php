<!DOCTYPE  html>

<?php 

$page_title = "Payments";
include 'tmpl/header.php';
include 'opr/db/_con.php';
require_once 'btstrp/braintree/lib/Braintree.php';

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('jbpkfbm4yz2h4jfp');
Braintree_Configuration::publicKey('d4bd8qfpr3x3k7d4');
Braintree_Configuration::privateKey('f1abde30489d7e62713693857419e947');

include 'tmpl/header.php';

if(isset($_POST['oid']) && isset($_POST['uid'])){
	
	$amount = $_POST['amount'];
	$orderid = $_POST['oid'];
	$uid = $_POST['uid'];
}





?>

<body class="container-fluid">
<div style='padding-top: 100px;' class="container-fluid">
<?php include 'tmpl/navigation.php';
	if(!empty($orderid) && !empty($uid)) :
?>

<div class="container">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Payments</h3>
			</div>
			<div class="panel-body">
				
				<form class="form-horizontal" role="form" id="checkout" method="post" action="payment.php">
					<input type="hidden" id="uid" name='uid' value="<?php echo $uid;?>" />
					<div class='form-group'>
						<div class="col-sm-6 col-sm-offset-3">
							<label class='col-sm-5 control-label'>Order# : </label>
							<div class='col-sm-7'>
								<input type="text" style="text-align: right" class='form-control' readonly="readonly" id="orderid" name="orderid" value="<?php echo $orderid;?>"/>
							</div>
						</div>
					</div>
					
					<div class='form-group'>
						<div class="col-sm-6 col-sm-offset-3">
							<label class='col-sm-5 control-label'>Amount : </label>
							<div class='col-sm-7'>
								<input type="text" style="text-align: right" class='form-control' readonly="readonly" id="amount" name="amount" value="<?php echo $amount;?>"/>
							</div>
						</div>
						<hr class="col-sm-12"/>
						<div class='col-sm-12'>

							<h3 class="col-sm-10 col-sm-offset-1">Please Select a payment method</h3>
							<hr class='col-sm-12' />
						</div>
					</div>
					
					<div class='form-group'>
						<div class='col-sm-10 col-sm-offset-1'>
	  					<div id="payment-form"></div>
	  					<input class="btn btn-success" type="submit" value="Proceed"></div>
  					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	
	





<script src="https://js.braintreegateway.com/js/braintree-2.29.0.min.js"></script>
<script>
// We generated a client token for you so you can test out this code
// immediately. In a production-ready integration, you will need to
// generate a client token on your server (see section below).
var clientToken = '<?php echo Braintree_ClientToken::generate() ?>' ;
braintree.setup(clientToken, "dropin", {
  container: "payment-form"
});
</script>
<?php else: ?>
	<div class="container">
		<div class="col-sm-8 col-sm-offset-3">
			<h3>invalid request click <a href="/home">here</a> to continue</h3>
		</div>
	</div>
</div>

<?php endif;?>
</body>