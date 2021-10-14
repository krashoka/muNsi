<?php

session_start();

if (isset($_SESSION['email'])) {
?>
<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="view/style.css" />
     <link rel="stylesheet" href="css/bootstrap.css" /> 
     <script src ="control/jquery.js"> </script>
     <script src ="js/bootstrap.min.js"> </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

     <!-- table styling -->
    <style type="text/css">
  table , tr, td,th 
  {
    text-align: center;
  }
  tr th{
    background-color: rgb(34, 155, 84);
    color: #fff;
  }
 
  </style> 
</head>

  

<body style="margin: 0; padding: 0;" >

<!-- bar content -->

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

                <li class="dropdown active" style="margin-right: 21px" ><a class="   
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
 

<!-- body content --> 				

<div class="container" style=" margin-top:-10px">
    <div class="row">
        <div class="col-sm-10">
             <h4 class="pull-left"> supply records </h4>
        </div>
        <div class="col-sm-2">
          <form class="form-inline">
            <input class="search-box pull-right form-control" id="splyName" type="text" name="search" placeholder="search"
              style="padding-right:35px" >
       
             <button class= "btn btn-default  glyphicon glyphicon-search" id="search"  style=" background: none;float: right; margin-top: -35px;  " ></button> 
        
            <br>
            <div id="srchlist" style="width:92%;display: none;font-size: 15.4px;background-color: #fff; position: absolute;z-index: 1000;margin-top: 15px;border: 1px  solid #bbb; text-align: left; line-height: 28px;     border-radius: 4px;padding: 8px 12px 5px 12px; margin-right: 10px">
           </div>
           </form>
          </div>
    </div>
</div>
      			
				   
<!--table creation  --> 


<div id="tableData" class="container">  
<div class="table-responsive"  style="margin-top: 15px">
       <table class="table">
           <tr>
               <th>inv-no</th>
               <th>customer name</th>
               <th>customer id</th>
               <th>comapany name</th>
               <th>date</th>
               <th>rate</th>
               <th>discount</th>
               <th>price</th>
           </tr>

           <?php
           $connect=mysqli_connect('localhost','root','','munsi_');

           $current_user = $_SESSION['email'];
          
        $sql ="SELECT `invoice_number`,`sellingTo`,`customer_id`,`companyName`,`date`,`totalRate`,`totalDiscount`,`finalBIll` from `sales_order` WHERE `registered_user`='".$current_user."'";
        $result=  mysqli_query($connect,$sql);

        if($result->num_rows >0){
          while($row = $result -> fetch_assoc()){
            echo "<tr><td>" . $row["invoice_number"] . "</td>" .
             "<td>" . $row["sellingTo"] . "</td>" .
             "<td>" . $row["customer_id"] . "</td>" .
             "<td>" . $row["companyName"] . "</td>" .
             "<td>" . $row["date"] . "</td>" .
             "<td>" . $row["totalRate"] . "</td>" .
             "<td>" . $row["totalDiscount"] . "</td>" .
             "<td>" . $row["finalBIll"] . 
             "</td></tr>" ;
          }
          echo "</table>";
        }
        else {
          echo "0 result";
        }

       

           ?>
         
       </table>
</div>
</div>

<div id="seletedTableData" style="display: none" class="container">
</div>

</body>
</html>

<!-- script of serch menu  -->

<script type="text/javascript">
  $(document).ready(function(){
    $('#splyName').keyup(function(){
        var query = $( this).val();
        if(query != '')
        {
            $.ajax({
                url:"srchSply.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {    $('#srchlist').fadeIn();
                    $('#srchlist').show();
                    $('#srchlist').html(data);
                }
            });
        }
      else{   $('#srchlist').fadeOut();           
            $('#splyName').html("");
          } 

    });

    $(document).on('click', '.nameOfUser', function(){
        $('#splyName').val($(this).text());
        $('#srchlist').hide();
    });
  });

</script> 

<!-- nav bar down toggle -->

<script type="text/javascript">
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
   
  });
});
</script>


<!--  search button script -->

<script type="text/javascript">
  $('#search').click(function(){
    var customerName = $('#splyName').val();

    $.ajax({
      url:"srchSply.php",
      method:"post",
      data:{customerName:customerName},
      success:function(data)
      {   $('#tableData').hide();
          $('#seletedTableData').html(data);
          $('#seletedTableData').show();
      }
    });
  });
</script>

<?php
}
else{
    echo "<script>window.location.assign('login_page.php')</script>";
   }
?>
