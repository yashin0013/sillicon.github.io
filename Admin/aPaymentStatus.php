<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

    // <!-- Includer header  -->
    include 'adminHeader.php'; 

    // include db 
    include '../partials/dbconnect.php'; 

	// following files need to be included
	require_once("../PaytmKit/lib/config_paytm.php");
	require_once("../PaytmKit/lib/encdec_paytm.php");

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
<div class="col-sm-6 mt-5 ml-5 px-5 py-3 ">
    <h4 class="bg-dark text-light p-2 text-center d-print-none">Patment status </h4>
    <form method="post" action="">
        <div class="form-group mx-sm-2 d-print-none">
            <!-- <label>ORDER ID</label> -->
            <input class="form-control mt-3" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID"
                autocomplete="off" placeholder="Order Id" value="<?php echo $ORDER_ID ?>">
            <input class="btn btn-primary my-2" value="Check Now" type="submit" onclick="">
        </div>
        <?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>
        <h2 class="text-center">Payment Receipt</h2>
        <table class="table table-bordered">
            <tbody>
                <?php
					foreach($responseParamList as $paramName => $paramValue) {
				?>
                <tr>
                    <td><label><?php echo $paramName?></label></td>
                    <td><?php echo $paramValue?></td>
                </tr>
                <?php
					}
				?>
            </tbody>
        </table>
        <div class="text-center">
            <button class="btn btn-danger d-print-none" onclick="javascript:window.print();">Print</button>
        </div>
        <?php
		}
		?>
    </form>
</div>
<!-- Includer header  -->
<?php include 'adminFooter.php'; ?>