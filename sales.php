<?php

session_start();

if (isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" href="view/ashok_stylesheet.css"/>
	<script src ="control/jquery.js"> </script>
    <script src ="js/bootstrap.min.js"> </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript">

		//Code to display sales on sales page............
			function display(){
				$.ajax({
					method:'post',
					url:'control/salesDisplay.php',
					data:{'display':1,
						},
					success:function(data){
						$('#display').html(data);
					}
				});
			}

			display();

	</script> 

</head>
<body>
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

                <li class="active" style="margin-right: 21px"><a href="sales.php" style="font-size: 14.5px ">  <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Supply </a></li>

                 <li style="margin-right: 17px" ><a href="expenses.php" style="font-size: 14.5px ">   <span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp;Expense </a></li>

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

				<!-- SALES CONTENT -->
				<div class="col-sm-12" style="height:100vh; padding-right: 30px;">
					<div class="row" style="padding-top: 20px">

						<!-- INVOICES LIST -->
						<div class="col-sm-5">
							<div style="padding-bottom: 20px">
								<span style="font-size: 20px; font-weight: bolder;">Invoices</span>
								<button onclick="window.location.href='create_invoice.php'" style="float: right; color: #fff" class="btn btn-success">+&ensp;Create Invoice
								</button>
							</div>
							<div id="display" style="cursor: pointer;">
							</div>
						</div>

						<div class="col-sm-1"></div>

						<!-- BILL RECEIPT -->
						<div class="col-sm-6" style="border: 1px solid #bbb; padding: 20px">
							<div id="sales">
								<h3 style="text-align: center"><u>Bill Receipt</u></h3><br>
								<?php 
									if(isset($_GET['id'])){
										//echo "Bill Number- ". $_GET['id'];
										$id = $_GET['id'];
										$conn = mysqli_connect('localhost','root','','munsi_');
										$query = "SELECT * FROM `sales_order` WHERE `invoice_number`='".$id."'";
										$result = mysqli_query($conn, $query);
										if ($result) {
											while ($row = mysqli_fetch_array($result)) {
												?>
												<div class="row">
													<div class="col-sm-6">
														<span style="font-size: 18px;font-weight: bolder"><?php echo $row['sellingTo']; ?></span><br>
														Company Name : &ensp;&ensp;<span style="font-weight: bolder"><?php echo $row['companyName']; ?></span>
													</div>
													<div class="col-sm-6" style="text-align: right">
														Bill No. :<br>
														<span style="font-size: 16px;font-weight: bolder"><?php echo $row['invoice_code'].$row['invoice_number']; ?></span>
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-sm-6">
														<span style="font-size: 16px;font-weight: bolder">Billing Address :</span><br>
														<?php echo $row['billingAdd']; ?>
													</div>
													<div class="col-sm-6" style="text-align: right">
														Dated At :<br>
														<span style="font-size: 16px;font-weight: bolder"><?php echo $row['date']; ?></span>
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-sm-6">
														<span style="font-size: 16px;font-weight: bolder">Shipping Address :</span><br>
														<?php echo $row['shippingAdd']; ?>
													</div>
													<div class="col-sm-6" style="text-align: right">
														Amount :<br>
														<span style="font-size: 16px;font-weight: bolder">&#8377;&nbsp;<?php echo $row['finalBill']; ?></span>
													</div>
												</div>
												<br>
												<?php 
												$code = 'INV-0';
												$query2 = "SELECT * FROM `sales_items` WHERE `sales_number`='".$code.$id."'";
												$result2 = mysqli_query($conn, $query2);
												?>
												<div class="table-responsive">
													<table class="table" >
														<tr style="background-color: #ddd;">
															<td>Products/Services</td>
															<td>Qty.</td>
															<td>Rate</td>
															<td>Discount</td>
															<td>Net Amount</td>
														</tr>
													<?php
													if ($result2) {
														while ($row = mysqli_fetch_array($result2)) {
													?>
														<tr>
															<td><?php echo $row['services'] ?></td>
															<td><?php echo $row['quantity'] ?></td>
															<td><?php echo $row['rate'] ?></td>
															<td><?php echo $row['discount'] ?></td>
															<td><?php echo $row['amount'] ?></td>
														</tr>
													<?php
														}
													}
													?>
													</table>
												</div>
												<?php
											}
										}
									}
								?>
							</div>

							
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!-- Sales body content ends here -->

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