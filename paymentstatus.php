<?php 
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
    include 'partials/header.php';

    // include db 
    include 'partials/dbconnect.php'; 

	// following files need to be included
	require_once("PaytmKit/lib/config_paytm.php");
	require_once("PaytmKit/lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}
?>

<div class="container jumbotron mt-5 mb-1">
    <h1 class="display-4 text-center font-weight-bold">Check Your Payment Status</h1>
    <hr class="my-4">
    <div class="d-flex justify-content-center">
        <form class="form-inline" method="post" action="">
            <div class="form-group mx-sm-2">
                <!-- <label for="paymentstatus">Order Id</label> -->
                <input class="form-control mt-3" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID"
                    autocomplete="off" placeholder="Order Id" value="<?php echo $ORDER_ID ?>">
                <input class="btn btn-primary ml-2 mt-3" value="Check Now" type="submit" onclick="">
            </div>
        </form>
    </div>
    <?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>
    <div class="container col-sm-6 mt-3 ">
        <h2 class="text-center my-3">Payment Receipt</h2>
        <table class="table table-bordered">
            <tbody>
                <?php
					foreach($responseParamList as $paramName => $paramValue) {
            if (($paramName == "TXNID") || ($paramName == "ORDERID") || ($paramName == "TXNAMOUNT") || ($paramName == "STATUS") ){
				?>
                <tr>
                    <td><label><?php echo $paramName?></label></td>
                    <td><?php echo $paramValue?></td>
                </tr>
                <?php
					} }
				?>
            </tbody>
        </table>

        <?php
        }
        ?>
    </div>
</div>

<!-- included Support/contact Section Here  -->
<?php include 'partials/support.php'; ?>

<!-- include footer  -->
<?php include 'partials/footer.php'; ?>