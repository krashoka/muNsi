<?php

session_start();

if (isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Purchase Order</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" href="view/ashok_stylesheet.css"/>
	<script src ="control/jquery.js"> </script>
    <script src ="js/bootstrap.min.js"> </script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.1/dist/sweetalert2.all.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#newVendor').click(function(){
					$('#addNewVendor').show(500);
					$('#createBill').hide();
			});
			$('#vendorName').click(function(){
				$('#searchBox').toggle();
			});
		});
	</script> 
	
</head>
<body>
	<div id="createBill" style="width: 100%">
		<!-- NAVBAR HEADER STARTS FROM HERE -->
		<nav class="navbar navbar-expand-md navbar-inverse navbar-fixed-top flex-column flex-md-row bd-navbar" style="background-color: #100e0e;position: sticky">
     <div class="container" >
     
     <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse" >
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>

        <a style="font-family: cursive;color: #338033;font-size: 23px;filter: brightness(1.5)" href="index.html" class ="navbar-brand">muNsi_</a>
    </div>



        <div class="collapse navbar-collapse navHeaderCollapse">
          
          <ul class="nav navbar-nav navbar-right">

                <li style="margin-right: 21px">
                 <a href="dashboard.php" style="font-size: 14.5px "><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Dashboard  </a>
                </li>

                <li style="margin-right: 21px"><a href="sales.php" style="font-size: 14.5px ">  <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Supply </a></li>

                 <li class="active" style="margin-right: 17px" ><a href="expenses.php" style="font-size: 14.5px ">   <span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp;Expense </a></li>

                <li class="dropdown" style="margin-right: 21px" ><a class="   
                  dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 14.5px ">   <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Record&nbsp;&nbsp;<span class="caret"></span> </a>
          
                     <ul class="dropdown-menu" style="border-radius: 6px;">
                         <li ><a href="expnrecod.php">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;expense</a></li>

                         <li class="divider"> </li>
                         <li><a href="supplyrecod.php">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;supply</a></li>

                         
                         <li class="divider"> </li>
                         <li class="dropdown-submenu" style="position: relative;"><a href="#" class="test" >&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;person <span class="caret"></span></a>
                         <ul class="dropdown-menu" style="border-radius: 6px; left: 100%;margin-top: -10px">
                           <li><a class="test" href="customerrecod.php">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;customer</a></li>
                           <li class="divider"> </li>
                           <li><a class="test" href="vendorrecord.php">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;vendor</a></li>
                         </ul>
                         </li>

                     </ul>
                </li>

                <li style="margin-right: 21px" ><a href="profilechng.php" style="font-size: 14.5px "> <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Profile  </a></li>


                <li ><a href="control/logout.php" style="font-size: 14.5px ">  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp;&nbsp;log out </a></li>

           </ul>
        </div>

    </div>
</nav>
		<!-- Navbar header ends here -->

		<!-- SALES BODY CONTENT STARTS FROM HERE -->
		<div class="container">
			<div class="row">

				<div class="col-sm-12" style="padding-right: 30px">

						<div class="row" style="margin-bottom: 20px">	
							<div class="col-sm-9">
								<h2>New Purchase Order</h2><br>
								<div class="row">
									<div class="col-sm-6" style="border:4px solid  #fff">
										Vendor Name <br>
										<div>
											<input name="vendorName" id="vendorName" readonly="true" style="cursor: pointer" class="form-control" placeholder="Select a vendor" />
										    <div id="searchBox" style="width:93%; background-color: #fff; position: absolute; z-index: 1000;display: none; margin-top: 5px;border: 1px solid #bbb; text-align: left; line-height: 28px; border-radius: 2px; padding: 8px 12px 5px 12px">
										    	<input type="search" id="searchVendor" class="form-control">
										    	<span id="suggestion" style="cursor: pointer;"></span>
										    	<span style="cursor:pointer;border: 0px; color:#00f" id="newVendor" class="glyphicon glyphicon-plus form-control">&nbsp;New Vendor</span>
										    </div>	
									  	</div>
									  	<br>
									  	Company Name&ensp;<input type="text" class="form-control" id="company">
									  	<br>
									  	Billing Address :<br>
										<textarea id='billAdd' class="form-control" style="height: 100px; resize: none; padding: 5px"></textarea>
									</div>
									<div class="col-sm-6" style="border:4px solid  #fff">
										Dated At&nbsp;&nbsp;<input type="date" class="form-control" name="currentDate" id="currentDate"><br>
										Delivery Date <input type="date" class="form-control" id="deliveryDate"><br>
										Shipping Address :<span id="copy2" style="color: #00f; cursor: pointer;">&#8595; same as Billing address</span><br>
										<textarea id='shipAdd' class="form-control" style="height: 100px; resize: none;padding: 5px"></textarea>
									</div>
								</div>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-2">
								<h2>Amount</h2>
								<h2>&#8377;&nbsp;<span id="amountDisplay">0.0</span></h2>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table bdr" id="addRow" style="min-width: 600px">
								<tr style="background-color: rgb(34, 155, 84);color: #fff">
									<td style='width:40%'>Products/Services</td>
									<td style='width:15%;text-align: right'>Quantity</td>
									<td style='width:15%;text-align: right'>Rate</td>
									<td style='width:15%;text-align: right'>Discount</td>
									<td style='width:15%;text-align: right'>Amount</td>
								</tr>
								<tr>
									<td><textarea required="true" style='resize:none' contentEditable='true' class='form-control services'></textarea></td>
									<td><input type='number' style='text-align: right' class='form-control quantity' placeholder='0.00' contentEditable='true' required="true" value="1" /></td>
									<td><input type='number' style='text-align: right' class='form-control rate' placeholder='0.00' contentEditable='true' required="true" /></td>
									<td><input type='number' style='text-align: right' class='form-control dcnt' placeholder='0.00' value="0" contentEditable='true'/></td>
									<td style='text-align: right; width:15%'><div class="amount">0.00</div></td>
								</tr>
							</table>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<button onclick="addTableRow()" class="btn btn-info">Add Row</button>&ensp;&ensp;
								<button onclick="removeRow()" class="btn btn-warning">Remove Row</button>
							</div>
							<div class="col-sm-4">
								<div class='totalBill'>
									<table class="table bdr">
										<tr>
											<td colspan="2"><h2>Sub Total :</h2></td>
										</tr>
										<tr>
											<td>Total Rate</td>
											<td width="50%">:&ensp;&ensp;&#8377;&ensp;<span id="totalRate"></span></td>
										</tr>
										<tr>
											<td>Total Discount</td>
											<td width="50%">:&ensp;&ensp;&#8377;&ensp;<span id="totalDiscount"></span></td>
										</tr>
										<tr>
											<td><span style="font-size: 28px">Final Bill</span></td>
											<td width="50%">:&ensp;&ensp;&#8377;&ensp;<span id="finalBill"></span></td>
										</tr>
									</table>
								</div>
							</div>
						</div>

						<div class="row footer"'>
							<div class="col-sm-12" style="padding-left: 25px">
								<button onclick="window.location.href='expenses.php'" type="button" id="purchaseBill" class="btn btn-success">Save Purchase</button>
								&ensp;&ensp;
								<button onclick="window.location.href='expenses.php'" type="button" id="cancelBill" class="btn btn-default">Cancel</button>
							</div>
						</div>

				</div>
			</div>
		</div>
	</div>
		<!---------------New VENDOR Details Section--------------->
		
	<div class="container-fluid" id="addNewVendor" style="display:none; background-color: rgba(0,0,0,0.8); width: 100%; position:absolute; top:0;z-index: 2">
		
		<div class="row">
			
			<div class="col-sm-2"></div>
			
			<div class="col-sm-8" style="background-color:#fff; margin-top: 10px; padding: 10px 25px 10px 25px;">

					<h3>New Vendor :<span id="closeNewVendor" style="float: right" class="glyphicon glyphicon-remove cancel"></span></h3><br><br>
					<div class="row">
						<div class="col-sm-12" style="border-bottom: 2px solid #bbb;margin-bottom: 10px">
							<table class="table">
								<tr>
									<td>Vendor Name</td>
									<td><input type="text" id="vendorFirstName" placeholder="First Name" class="form-control" required="true"></td>
									<td><input type="text" id="vendorLastName" placeholder="Last Name" class="form-control"></td>
								</tr>
								<tr>
									<td>Company Name</td>
									<td><input type="text" id="vendorCompanyName" class="form-control" required="true"></td>
								</tr>
								<tr>
									<td>Contact Email</td>
									<td><input type="email" id="vendorEmail" class="form-control" required="true"></td>
								</tr>
								<tr>
									<td>Contact Number</td>
									<td><input type="number" id="vendorvendorWorkPhone" placeholder="Work Phone" class="form-control" required="true"></td>
									<td><input type="number" id="vendorMobile" placeholder="Mobile" class="form-control" required="true"></td>
								</tr>
								<tr>
									<td>Website</td>
									<td><input type="text" id="vendorWebsite" class="form-control"></td>
								</tr>
							</table>
						</div>
					</div>

					<h4>Customer Address :</h4>
					<br><br>
					<div class="row">
						<div class="col-sm-6">
							<div>BILLING ADDRESS</div> <br>
							<table class="table">
								<tr>
									<td>Country</td>
									<td>
										<select required="true" id="billingCountry" class="form-control">
											<option>Select</option>
											<option>India</option>
											<option>USA</option>
											<option>UK</option>
											<option>Sri Lanka</option>
											<option>France</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Address</td>
									<td><textarea required="true" id="billingAddress" class="form-control" style="height: 70px;resize: none;"></textarea></td>
								</tr>
								<tr>
									<td>City</td>
									<td><input required="true" type="text" id="billingCity" class="form-control"></td>
								</tr>
								<tr>
									<td>State</td>
									<td><input required="true" type="text" id="billingState" class="form-control"></td>
								</tr>
								<tr>
									<td>PIN Code</td>
									<td><input required="true" type="number" id="billingPinCode" class="form-control"></td>
								</tr>
								<tr>
									<td>Phone</td>
									<td><input required="true" type="number" id="billingPhone" class="form-control"></td>
								</tr>
								<tr>
									<td>Fax</td>
									<td><input type="number" id="billingFax" class="form-control"></td>
								</tr>
							</table>
						</div>
						<div class="col-sm-6">
							<div>SHIPPING ADDRESS<span id="copy" style="float: right; color: #00f; cursor: pointer;">&#8595; same as Billing address</span></div> <br>
							<table class="table">
								<tr>
									<td>Country</td>
									<td>
										<select required="true" id="shippingCountry" class="form-control">
											<option>Select</option>
											<option>India</option>
											<option>USA</option>
											<option>UK</option>
											<option>Sri Lanka</option>
											<option>France</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Address</td>
									<td><textarea required="true" id="shippingAddress" class="form-control" style="height: 70px;resize: none;"></textarea></td>
								</tr>
								<tr>
									<td>City</td>
									<td><input required="true" type="text" id="shippingCity" class="form-control"></td>
								</tr>
								<tr>
									<td>State</td>
									<td><input required="true" type="text" id="shippingState" class="form-control"></td>
								</tr>
								<tr>
									<td>PIN Code</td>
									<td><input required="true" type="number" id="shippingPinCode" class="form-control"></td>
								</tr>
								<tr>
									<td>Phone</td>
									<td><input required="true" type="number" id="shippingPhone" class="form-control"></td>
								</tr>
								<tr>
									<td>Fax</td>
									<td><input type="number" id="shippingFax" class="form-control"></td>
								</tr>
							</table>
						</div>
					</div>
					<div style="margin-bottom: 15px;">
						<button type="button" id="save" class="btn btn-success" value="Save">Save</button>&ensp;&ensp;&ensp;<button class="btn btn-default cancel">Cancel</button>
					</div>
			</div>
			
			<div class="col-sm-2"></div>

		</div>
	</div>

	<script type="text/javascript">
			$('#save').click(function(){
				var vendorFirstName = $('#vendorFirstName').val();
				var vendorLastName = $('#vendorLastName').val();
				var vendorCompanyName = $('#vendorCompanyName').val();
				var vendorEmail = $('#vendorEmail').val();
				var vendorWorkPhone = $('#vendorWorkPhone').val();
				var vendorMobile = $('#vendorMobile').val();
				var vendorWebsite = $('#vendorWebsite').val();
				var billingCountry = $('#billingCountry').val();
				var billingAddress = $('#billingAddress').val();
				var billingCity = $('#billingCity').val();
				var billingState = $('#billingState').val();
				var billingPinCode = $('#billingPinCode').val();
				var billingPhone = $('#billingPhone').val();
				var billingFax = $('#billingFax').val();
				var shippingCountry = $('#shippingCountry').val();
				var shippingAddress = $('#shippingAddress').val();
				var shippingCity = $('#shippingCity').val();
				var shippingState = $('#shippingState').val();
				var shippingPinCode = $('#shippingPinCode').val();
				var shippingPhone = $('#shippingPhone').val();
				var shippingFax = $('#shippingFax').val();
				
				$.ajax({
						method:'post',
						url : 'control/contacts_vendor.php',
						data :{
								fName : vendorFirstName, 
								lName : vendorLastName, 
								cName : vendorCompanyName,
								email : vendorEmail, 
								workPhone : vendorWorkPhone, 
								mobile : vendorMobile,
								website : vendorWebsite, 
								bCountry : billingCountry, 
								bAddress : billingAddress,
								bCity : billingCity, 
								bState : billingState, 
								bPinCode : billingPinCode,
								bPhone : billingPhone, 
								bFax : billingFax, 
								sCountry : shippingCountry,
								sAddress : shippingAddress, 
								sCity : shippingCity, 
								sState : shippingState,
								sPinCode : shippingPinCode, 
								sPhone : shippingPhone, 
								sFax : shippingFax
							},
						success:function(data){
							$('#vendorFirstName').val('');
							$('#vendorLastName').val('');
							$('#vendorCompanyName').val('');
							$('#vendorEmail').val('');
							$('#vendorWorkPhone').val('');
							$('#vendorMobile').val('');
							$('#vendorWebsite').val('');
							$('#billingCountry').val('Select');
							$('#billingAddress').val('');
							$('#billingCity').val('');
							$('#billingState').val('');
							$('#billingPinCode').val('');
							$('#billingPhone').val('');
							$('#billingFax').val('');
							$('#shippingCountry').val('Select');
							$('#shippingAddress').val('');
							$('#shippingCity').val('');
							$('#shippingState').val('');
							$('#shippingPinCode').val('');
							$('#shippingPhone').val('');
							$('#shippingFax').val('');
						}
				});

				$('#vendorName').val(vendorFirstName+' '+vendorLastName);
				$('#billAdd').html(billingAddress+', '+billingCity+', '+billingState+', '+billingCountry+', '+'\nPin Code : '+billingPinCode);
				$('#company').val(vendorCompanyName);
				$('#addNewVendor').hide(500);
				$('#createBill').show();
				$('#searchBox').hide();
			});

			//function to Cancel Add New Contact tab and erasing all written contents
			$('.cancel').click(function(){
				$('#vendorFirstName').val('');
				$('#vendorLastName').val('');
				$('#vendorCompanyName').val('');
				$('#vendorEmail').val('');
				$('#vendorWorkPhone').val('');
				$('#vendorMobile').val('');
				$('#vendorWebsite').val('');
				$('#billingCountry').val('Select');
				$('#billingAddress').val('');
				$('#billingCity').val('');
				$('#billingState').val('');
				$('#billingPinCode').val('');
				$('#billingPhone').val('');
				$('#billingFax').val('');
				$('#shippingCountry').val('Select');
				$('#shippingAddress').val('');
				$('#shippingCity').val('');
				$('#shippingState').val('');
				$('#shippingPinCode').val('');
				$('#shippingPhone').val('');
				$('#shippingFax').val('');

				$('#addNewVendor').hide(500);
				$('#createBill').show();
				$('#searchBox').hide();
			});

			$('#purchaseBill').click(function(){

				//customer purchaseOrder send to purchaseOrder.php
				var vendorName = $('#vendorName').val();
				var company = $('#company').val();
				var currentDate = $('#currentDate').val();
				var deliveryDate = $('#deliveryDate').val();
				var billAdd = $('#billAdd').val();
				var shipAdd = $('#shipAdd').val();
				var totalRate = $('#totalRate').text();
				var totalDiscount = $('#totalDiscount').text();
				var finalBill = $('#finalBill').text();
				var vendorCompanyName = $('#vendorCompanyName').val();

				//product details send to salesItems.php
				var services = [];
			 	var quantity = [];
			 	var rate = [];
			 	var dcnt = [];
			 	var amount = [];

				$( ".services" ).each(function( index ) {
					services[index] =  $( this ).val(); 
				});
				$( ".quantity" ).each(function( index ) {
				  	quantity[index] =  $( this ).val(); 
				});
				$( ".rate" ).each(function( index ) {
				  rate[index] =  $( this ).val(); 
				});
				$( ".dcnt" ).each(function( index ) {
				  dcnt[index] =  $( this ).val(); 
				});
				$( ".amount" ).each(function( index ) {
				  amount[index] =  $( this ).text(); 
				});

				$.ajax({
					method:'post',
					url: 'control/purchaseOrder.php',
					data:{
						vendorName : vendorName,
						company :company,
						currentDate : currentDate,
						deliveryDate : deliveryDate,
						billAdd : billAdd,
						shipAdd : shipAdd,
						totalRate : totalRate,
						totalDiscount : totalDiscount,
						finalBill : finalBill,
						services : services,
						quantity : quantity,
						rate : rate,
						dcnt : dcnt,
						amount : amount
					},
					success:function(data){
						$('#vendorName').val('');
						$('#company').val('');
						$('#billAdd').val('');
						$('#shipAdd').val('');
						$('#totalRate').text('');
						$('#totalDiscount').text('');
						$('#finalBill').text('');	
						$('#amountDisplay').text('0.00');

						$('.services').val('');
						$('.quantity').val('1');
						$('.rate').val('');
						$('.dcnt').val('');
						$('.amount').text('0.00');
					}
				});
			});	

		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#copy').click(function(){
					$('#shippingCountry').val($('#billingCountry').val());
					$('#shippingAddress').val($('#billingAddress').val());
					$('#shippingCity').val($('#billingCity').val());
					$('#shippingState').val($('#billingState').val());
					$('#shippingPinCode').val($('#billingPinCode').val());
					$('#shippingPhone').val($('#billingPhone').val());
					$('#shippingFax').val($('#billingFax').val());
				});

				$('#copy2').click(function(){
					$('#shipAdd').val($('#billAdd').val());
				});
			});
		</script>

		<script type="text/javascript">
							
			$('#searchVendor').keyup(function(){
				var nameOne = $(this).val();
				$.ajax({
					method:'post',
					url:'search_vendor.php',
					data:{name:nameOne},
					success:function(data){
						$('#suggestion').html(data);
					}
				});
			});

			$(document).on('click','.nameOfUser',function(){
				var userSelected = $(this).text();
				$('#vendorName').val(userSelected);
				$('#vendorName').attr('readonly','true');
				$('#searchBox').hide();

				$.ajax({
					method:'post',
					url:'search_vendor.php',
					data:{userName:userSelected},
					success:function(data){
						$('#billAdd').val(data);
					}
				});

				$.ajax({
					method:'post',
					url:'search_vendor.php',
					data:{company:userSelected},
					success:function(data){
						$('#company').val(data);
					}
				});
			});

			function datee(){
				var d = new Date();

				var month = d.getMonth()+1;
				var day = d.getDate();

				var output = d.getFullYear()+ '-' +(month<10 ? '0' : '') + month + '-' +(day<10 ? '0' : '') + day;
				    
				    
				//var datee = $.datepicker.formatDate('yy/mm/dd', new Date());
				$('#currentDate').val(output);
			}
			datee();
		</script> 

		<script type="text/javascript" src='control/invoice.js'></script>

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
   
  });
});
</script>

<?php
}
else{
    echo "<script>window.location.assign('login_page.php')</script>";
   }
?>