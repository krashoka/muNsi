<?php

session_start();

if (isset($_SESSION['email'])) {
?>
<?php

$current_user = $_SESSION['email'];
$connect=mysqli_connect('localhost','root','','munsi_');
if (isset($_POST['save'])) {
	
$query2="UPDATE `users_details` SET `phoneNo`='".$_POST['contact']."',`street`='".$_POST['street']."',`city`='".$_POST['city']."',`state`='".$_POST['state']."',`zipCode`='".$_POST['pinCode']."',`company_type`='".$_POST['compType']."' WHERE `registered_user`='".$current_user."'";
	
mysqli_query($connect,$query2) or die("cannot update");

}

$query="SELECT  * FROM `users_details` WHERE `registered_user`='".$current_user."'";
$result = mysqli_query($connect,$query);
$row =mysqli_fetch_array($result);
 
 $fullName = $row['firstName'].' '.$row['lastName'];

?>
 
 <!-- html coding -->
<!doctype html>
<html>
<head>
      <link rel="stylesheet" type="text/css" href="view/style.css" />
     <link rel="stylesheet" href="css/bootstrap.css" /> 
     <script src ="control/jquery.js"> </script>
     <script src ="js/bootstrap.min.js"> </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style type="text/css">
	
.col-sm-3 label{
	
	font-family: sans-serif;
	color: #404040;
}
.col-sm-11 input{
	color: #404040;
	margin-left: 4px; 
	border: none;
	
	outline: none;
	background: transparent;
}


</style>






</head>
<body  style="margin: 0; padding: 0" 
    >

<!-- background shade -->

  <!--        <div class="backme" >
  <h2></h2>  
  </div>      -->

<!--navigation bar......     -->
 
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

                <li class="active" style="margin-right: 21px" ><a href="profilechng.php" style="font-size: 14.5px "> <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Profile  </a></li>


                <li ><a href="control/logout.php" style="font-size: 14.5px ">  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp;&nbsp;log out </a></li>

           </ul>
        </div>

    </div>
</nav>
 

<div class="container">
    
    <div class="row" style=" margin-top:80px">
         <div class="col-sm-2">
	     </div>
	

<!--personal details......     -->
	
         <div class="col-sm-10">

         <form method="post" action="profilechng.php">
		  <div class="jumbotron" style="margin-top:-60px;margin-right:180px;background-image: linear-gradient(#ffffff ,#f5f5f5); opacity: 3;border: 0.5px solid #bbb; border-top: none;
		  ">
	           <div class="row" >
			    
		           <div class="col-sm-6">
		           <h3 style="color: #404040">personal details</h3>
				   <hr style="height:.76px;background-color:#404040; margin-top: 15px; margin-bottom: 0px"/>
		           </div>
	               <div class="col-sm-6">
		         <span class="glyphicon glyphicon-user pull-right" style=" font-size:60px; color: #707070 "></span> 
		           </div>
			   </div>
			   <br /><br />
               <div class="row">
			      <div class="col-sm-3">
                  <label > FullName :  </label>
				  </div>
				  <div class="col-sm-9">
				  <div class="row">
                   <div class="col-sm-11">
				  <label style="color: #404040; margin-top:9px; margin-left: 18px"><?php echo $fullName; ?></label>
				  </div>
				  <div class="col-sm-1">
	
				  </div>
				  </div>
				  </div>
			   </div>
			   <br /><br />
               <div class="row">
			      <div class="col-sm-3">
                  <label > Email Id :  </label>
				  </div>
				  <div class="col-sm-9">
				   <div class="row">
                   <div class="col-sm-11">
				  <label style="color: #404040; margin-top:9px; margin-left: 18px"> <?php echo $row['registered_user']; ?></label>
				  </div>
				   <div class="col-sm-1">
	
				  </div>
				  </div>
				  </div>
			   </div>
			   <br /><br />
			    <div class="row">
			      <div class="col-sm-3">
                  <label > contact :  </label>
				  </div>
				  <div class="col-sm-9">
                  <div class="row">
                   <div class="col-sm-11">
				  <input disabled="disabled" type="number" id="edt-3" class="form-control" name= "contact" placeholder="contact" value="<?php echo $row['phoneNo']; ?>"   />
				  </div>
				  <div class="col-sm-1">
	
				  </div>
				  </div>
				  </div>
			   </div>
			   <br /><br />
			    <div class="row">
			      <div class="col-sm-3">
                  <label > street :  </label>
				  </div>
				  <div class="col-sm-9">
				  <div class="row">
				    <div  class="col-sm-11">
				  <input disabled="disabled"  type="text" id="edt-4" class="form-control" name="street"  placeholder="address" value="<?php echo $row['street']; ?>"    />
				    </div>
				    <div class="col-sm-1">
	
				    </div>
				    </div>
				  </div>
			   </div>
			   <br /><br />
			    <div class="row">
			      <div class="col-sm-3">
                  <label > city :  </label>
				  </div>
				  <div class="col-sm-9">
				  <div class="row">
				    <div  class="col-sm-11">
				  <input disabled="disabled"  type="text" id="edt-5" class="form-control" name= "city"  placeholder="address" value="<?php echo $row['city']; ?>"    />
				    </div>
				    <div class="col-sm-1">
	
				    </div>
				    </div>
				  </div>
			   </div><br /><br />
			    <div class="row">
			      <div class="col-sm-3">
                  <label > state :  </label>
				  </div>
				  <div class="col-sm-9">
				  <div class="row">
				    <div  class="col-sm-11">
				  <input disabled="disabled"  type="text" id="edt-6" class="form-control" name= "state"  placeholder="address" value="<?php echo $row['state']; ?>"    />
				    </div>
				    <div class="col-sm-1">
	
				    </div>
				    </div>
				  </div>
			   </div>
			   <br /><br />
			    <div class="row">
			      <div class="col-sm-3">
                  <label > pin code :  </label>
				  </div>
				  <div class="col-sm-9">
				  <div class="row">
				    <div  class="col-sm-11">
				  <input disabled="disabled"  type="text" id="edt-7" class="form-control" name= "pinCode"  placeholder="address" value="<?php echo $row['zipCode']; ?>"    />
				    </div>
				    <div class="col-sm-1">
	
				    </div>
				    </div>
				  </div>
			   </div>
             </div>  
             	

    
 
<!--company details......     -->


                   <div class="jumbotron" style="margin-right:180px;background-image: linear-gradient(#f5f5f5 ,#ffffff); opacity: 3;border: 0.5px solid #bbb; border-bottom:  none ">
	           <div class="row" >
			    
		           <div class="col-sm-6">
		           <h3 style="color: #404040">company's detail</h3>
				   <hr style="height:1px;background-color:#404040; margin-top: 15px; margin-bottom: 0px"/>
				  		           </div>
	               <div class="col-sm-6">
		           <span class="glyphicon glyphicon-user pull-right" style=" font-size:60px; color: #707070"></span>
				   
		           </div>
			   </div>
			   <br /><br />
               <div class="row">
			      <div class="col-sm-3">
                  <label > company name :  </label>
				  </div>
				  <div class="col-sm-9">
				  <label style="color: #404040; margin-top:9px; margin-left: 18px" name= "comp_name"  > <?php echo $row['companyName']; ?>    </label>
				  </div>
			   </div>
			   <br /><br />
			    <div class="row">
			      <div class="col-sm-3">
                  <label > company type :  </label>
				  </div>
				  <div class="col-sm-9">
				  <div class="row">
				    <div class="col-sm-11">
				  <input disabled="disabled"  type="text" id="edt-8" class="form-control" name= "compType" placeholder="address" value="<?php echo $row['company_type']; ?>"    />
				  </div>
				  <div class="col-sm-1">
		
				  </div>
				  </div>
			   </div>
             </div>  					
          </div>	 


     


<!-- button for saving -->



	<div class="wrapper">
	  <div class="bton ">
	  	<input type="submit" name="save" value="save changes" >
	  </div>
	</div> 
	</form>

	<!--  button for edit -->
	 <div class="wrapper">
	  <div class="btonn ">
	  	<button class="btn btn-default" type="button" id="edit"> <span  class=" glyphicon glyphicon-pencil "></span> edit</button>
	  </div>
	</div> 
</div>

</div>

<!--- js script coding -->
<script type="text/javascript">
	$(document).ready(function() {
		$(':disabled').css('background','none')
	})
	;
    $('#edit').click(function(){
    	
    	$('input').removeAttr('disabled');
    });



</script>

</body>
</html>

<!-- nav bar down toggle -->

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
	