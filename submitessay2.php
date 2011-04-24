<?php
  session_start();
  require_once('constants.php');
  require_once('common_fns.php');
  require_once('common_fns_payment.php');
  require_once('common_fns_student.php');
  // ensure the user is logged
  check_valid_user();
       //declare an array
	 $myOrder = array();
	 // the total number of basic services
	 $total_basic_count=0;
	 // the total number of comprehensive services
	 $total_comp_count = 0;
	 // the number of the services with "selected"
	 $myIndex = 0;
	 // total price 
	 $myTotal = 0;
	 // processing fee
	 $myFee = 0;
    
	// display the slected items
	function display () {
	
	    global $myOrder, $total_basic_count, $total_comp_count, $myIndex, $myTotal;
		//$count = $total_basic_count + $total_comp_count;
		
		echo '<tr>';
		for ($row = 0; $row < $myIndex; $row++) {
			echo '<tr>';
			echo '<td align="center" valign="middle" bgcolor="#FFFFFF">'.$myOrder[$row][0].'</td>';
			if ($myOrder[$row][1] == 1) 
				echo '<td align="center" valign="middle" bgcolor="#FFFFFF">Basic</td>';
			else
				echo '<td align="center" valign="middle" bgcolor="#FFFFFF">Comprehensive</td>';
			echo '<td align="center" valign="middle" bgcolor="#FFFFFF">'.'$'.$myOrder[$row][4].'</td>';
			echo '</tr>';
			$myTotal = $myTotal + $myOrder[$row][4];
		}
	}
    // search the service selections except for 'canceled"
	function search(){ 
		global $myOrder, $total_basic_count, $total_comp_count, $myIndex;
	    // unset those
	      $myOrder = array();
		$total_basic_count = 0;
		$total_comp_count = 0;
		$myIndex = 0;
		
		$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		
		// ename   --   essay name
		// stypeid ---  service type ID
		// eid     ---- essay ID
		// uid     ---- UID
		// price   ---- price
		$query = "select distinct es.essay_name ename, es.word_count ewcount, ss.service_type_id stypeid, es.essay_id eid, ss.service_selection_id ssid, ss.service_status ssstatus from essay es, service_selection ss where ss.essay_id = es.essay_id and service_status != 'cancelled' and ss.uid = ".$_SESSION['user_id']."";
		//$query = "select distinct es.essay_name ename, ss.service_type_id stypeid, es.essay_id eid, ss.service_selection_id ssid, ss.service_status ssstatus from essay es, service_selection ss where ss.essay_id = es.essay_id and service_status != 'cancelled' and ss.uid = 13 ";
		$data = mysqli_query($dbc,$query)or die(mysqli_error());

		$num = mysqli_num_rows($data);
		
		if($num!=0){
			while($row1 = mysqli_fetch_array($data)){
			    if ($row1['stypeid'] == 1) {
					++$total_basic_count;
				}
				else {
					++$total_comp_count;
			    }
				// insert it to the array only for the services of "selected"
				if ($row1['ssstatus'] == 'selected') {
				    if ($row1['stypeid'] == 1) 
					    $price = BASIC_PRICE;
					
					else 
					    $price = COMPREHENSIVE_PRICE;
					 
					$myOrder[$myIndex] = array($row1['ename'], $row1['stypeid'], $row1['eid'], $row1['ssid'], "$price", $row1['ewcount']);
					++$myIndex;
				}
			}
			//return $count;
		}
		else{
			//return $count;
		}	
		mysqli_close($dbc);
		
	}
	
	// calculation of price for each item
	function calprice() {
		global $myOrder, $myIndex;
		$init_bcount = 0;
		$init_ccount = 0;
		
		$dbc = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		// stypeid ---  service type ID
		$query = "select  ss.service_type_id stypeid from service_selection ss where service_status in ('assigned', 'paid', 'checkout') and ss.uid = ".$_SESSION['user_id']."";
		$data = mysqli_query($dbc,$query)or die(mysqli_error());

		$num = mysqli_num_rows($data);
		if($num!=0){
			while($row = mysqli_fetch_array($data)){
				if ($row['stypeid'] == 1) {
						++$init_bcount;
				}
				else {
						++$init_ccount;
				}
			}
		}
		// 0 - essay name
		// 1 - service type ID  1(basic); 2(comprehensive)
		// 2 - essay ID
		// 3 - service select ID 
		// 4 - price
		for ($i= 0; $i< $myIndex; $i++)
		{
			// basic package
			if ($myOrder[$i][1] == 1) {
				++$init_bcount;
				$base_price = 0;
				// calculate a basic price
				if ($myOrder[$i][5] <= 450)
					$base_price = BASIC_PRICE;
				else if ($myOrder[$i][5] > 451 && $myOrder[$i][5] <= 550)
					$base_price = BASIC_PRICE + 20;
				else if ($myOrder[$i][5] > 551 && $myOrder[$i][5] <= 750)
					$base_price = BASIC_PRICE + 40;
				else
					$base_price = BASIC_PRICE + 60;
				// discount
				if ($init_bcount == 1)
					$myOrder[$i][4] = $base_price;
				else if ($init_bcount == 2)
					$myOrder[$i][4] = $base_price * 0.90;
				else 
					$myOrder[$i][4] = $base_price * 0.85;
			}
			// comprehensive package
			else {
				++$init_ccount;
				if ($init_ccount == 1)
					$myOrder[$i][4] = COMPREHENSIVE_PRICE;
				else if ($init_ccount == 2)
					$myOrder[$i][4] = COMPREHENSIVE_PRICE * 0.90;
				else 
					$myOrder[$i][4] = COMPREHENSIVE_PRICE * 0.85;
			}
		}	
		mysqli_close($dbc);
		
		// add these to the session and then checkout page picks them up
		$_SESSION['myOrder'] = $myOrder;
		$_SESSION['myIndex'] = $myIndex;
	}

?>
<?php
	//call backend first
	search();
	// May need to call calculation prices
	calprice($myOrder, $myIndex);
	// set the cookies so paypal can call back
	set_cookies();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Submit Essay Step_2</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">  
<!--   
var LastLeftID = "";   
  
function DoMenu(emid){   
    var obj = document.getElementById(emid);    
    obj.className = (obj.className.toLowerCase() == "expanded"?"collapsed":"expanded");   
    if((LastLeftID!="")&&(emid!=LastLeftID)){   
        document.getElementById(LastLeftID).className = "collapsed";   
    }   
        LastLeftID = emid;   
}   
-->  
</script>
</head>
<body>
<div id="ftop">
  <div id="header">
     <div id="usename">Welcome  &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="images/logout.gif" width="10" height="10" />&nbsp;Logout</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="changepw.php">Change Password</a></div>
  </div>
</div>
<div class="clearfloat"></div>
<div id="maincontect">
  <div id="leftnav">
    <h1>STUDENT</h1>
    <?php display_student_side_menu(); ?>
  </div>
  <div id="mainSubE2">
    <div id="mcontect">
      <div id="step">
        <ul>
          <li><a>1 Submit Essay</a></li>
          <li><a style="background-color:red">2 Review Order and Pay </a></li>
          <li><a>3 Confirmation</a></li>
        </ul>
      </div>
      <div id="profile">
        <div id="ordershow">
          <h1 class="hname4">Your Order:</h1>
          <table width="500" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
            <tr>
              <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>Essay Name</strong></td>
              <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>Service Package </strong></td>
              <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>Price</strong></td>
            </tr>
			<!-- It will display order items   -->
			<?php  $payment = display();  ?>
          </table>
          <div id="payment"><strong>Subtotal: </strong><?php echo "$"."$myTotal"; ?></div>
        </div>
        <div id="pay"> &nbsp;Payment Method:
          <div id="paymentmethod">
		   <!--
            <h2 class="hname2">
              <input type="radio" name="Pay" id="Pay in USD"  value="radio"/>
              <label for="Pay in USD">Pay in USD (Master/Visa and PayPal)</label>
            </h2>
            <h2 class="hname2">
              <input type="radio" name="Pay" id="Pay in RMB"  value="radio2"/>
              <label for="Pay in RMB">Pay in RMB</label>
            </h2>
			-->
			<h2 class="hname2">
			<!--
			<input type="radio" name="Pay" id="Pay in USD"  value="radio"/>
			-->
			<label for="Pay in USD">Pay in USD (Master/Visa and PayPal)</label>
			</h2>
          </div>
        </div>
        <div id="paymentenunciation">** When you click on &quot;Pay&quot; button, you will be redirected to an online payment website. We don't store any sensitive information on our website. </div>
      </div>
	  <form action="./buy/checkout.php" method="post">
      <div id="payor"><a href="submitessay1.php"><img src="images/back01.gif" width="60" height="24" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="image" src="images/pay01.gif" name="submit" width="60" height="24" /></div>
	  </form>
    </div>
  </div>
</div>
</div>
<div class="clearfloat"></div>
<div id="foot">
  <div id="footer">
    <div id="copyright">
      <?php copyright_portion(); ?>
    </div>
  </div>
</div>
</body>
</html>