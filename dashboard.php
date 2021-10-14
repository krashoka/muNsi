<?php

session_start();

if (isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
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
		function display(){
				$.ajax({
					method:'post',
					url:'control/dashboardDisplay.php',
					data:{'displaySales':1,
						},
					success:function(data){
						$('#displaySales').html(data);
					}
				});

				$.ajax({
					method:'post',
					url:'control/dashboardDisplay.php',
					data:{'displayExpenses':1,
						},
					success:function(data){
						$('#displayExpenses').html(data);
					}
				});
			}

			display();

		function total(){
			$.ajax({
					method:'post',
					url:'control/dashboardDisplay.php',
					data:{'totalSales':1,
						},
					success:function(data){
					  $('#totalSales').html(data);
					}
				});

			$.ajax({
					method:'post',
					url:'control/dashboardDisplay.php',
					data:{'totalExpenses':1,
						},
					success:function(data){
						$('#totalExpenses').html(data);
					}
				});
			
		}

		total();

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

                <li class="active" style="margin-right: 21px">
                 <a href="dashboard.php" style="font-size: 14.5px "><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Dashboard  </a>
                </li>

                <li style="margin-right: 21px"><a href="sales.php" style="font-size: 14.5px ">  <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Supply </a></li>

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

		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<h3 style="font-family: cursive;">Overview :<hr style="border:1px solid #000"></h3>
					<div style="padding-left: 25px" id="overview"></div>
				</div>
				<div class="col-sm-5" align="center">
					<!--<table style=" width:250px;height: 130px; margin-top: 150px; background-color: rgb(34, 155, 84);text-align: center">
						<tr>
							<td style="color: #fff"></td>
							<td class="fa fa-money" style="font-size:70px;border:none; color: #fff;"></td>
						</tr>
						<tr>
							<td style="color: #fff"><h3>Revenue</h3></td>
						</tr>
					</table>-->
					<div class="row" style="width:300px;margin-top: 100px;margin-bottom: 50px;  background-color: rgb(34, 155, 84)">
						<div class="col-sm-6 fa fa-money" style="font-size: 70px; color: #fff;padding-top: 40px"></div>
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-12" style="height:75px;border-left: 1px solid #fff;border-bottom: 1px solid #fff;color: #fff"><h3>&#8377;&nbsp;<span id="revenue"></span></h3></div>
							</div>
							<div class="row">
								<div class="col-sm-12" style="border-left: 1px solid #fff;height:75px;color: #fff"><h3>Revenue</h3></div>
							</div>
						</div>
						<br><br>
					</div>
					
				</div>
				<div class="col-sm-1">
					
				</div>
			</div>

			<div class="row" style="margin-top: 20px">
				<div class="col-sm-6" style="padding-bottom: 20px">
					<h3 style="font-family: cursive;">Sales</h3><hr style="border:1px solid rgb(34, 155, 84)">
					<span style="font-size: 20px">Total Receivables :</span>
					<span style="font-size: 20px;float: right;padding-right: 20px;color:rgb(34, 155, 84)">&#8377;&nbsp;<span id="totalSales"></span></span>
					<br><br>
					<hr style="border:1px solid #bbb">
					<h4>Recent Sales</h4>
					<span id="displaySales"></span>
				</div>
				<div class="col-sm-6">
					<h3 style="font-family: cursive;">Expenses</h3><hr style="border:1px solid #f00">
					<span style="font-size: 20px">Total Expenses :</span>
					<span style="font-size: 20px;float: right;padding-right: 20px;color:#f00">&#8377;&nbsp;<span id="totalExpenses"></span></span>
					<br><br>
					<hr style="border:1px solid #bbb">
					<h4>Recent Purchases</h4>
					<span id="displayExpenses"></span>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script>
		  
		  	var sales = parseInt($('#totalSales').text());
			var expenses = parseInt($('#totalExpenses').text());

			$(document).ready(function(){
				var total = parseFloat(sales) - parseFloat(expenses);
				$('#revenue').text(total);
			});
		
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			data = new google.visualization.DataTable();
	        data.addColumn('string', '');
	        data.addColumn('number', '');
	        data.addRows([
	          ['Sales', sales],
	          ['Expenses', expenses]
	        ]);

			var options = {
			  is3D: true,
			  width:455,
			  height:300,
			  colors: ['rgb(34, 155, 84)', '#f00']
			};

			var chart = new google.visualization.PieChart(document.getElementById('overview'));
			chart.draw(data, options);
			}
		</script>
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