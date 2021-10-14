<!doctype html>
<html>
	<head>
		<title>sign in</title>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="view/style.css"/>

		

	</head>
<body style="height: 100%">

  <!-- navbar -->

  <nav class="navbar navbar-expand-md navbar-inverse navbar-fixed-top flex-column flex-md-row bd-navbar" style="background-color: #100e0e;position: sticky">
       <div class="container" >
       
       <a style="font-family: cursive;color: #338033;font-size: 23px;filter: brightness(1.5)" href="index.html" class ="navbar-brand">muNsi_</a>

      <ul class="nav navbar-nav navbar-right">
        <li style="margin-right: 21px" ><a href="Admin/admin_login.html" style="font-size: 16.5px;font-weight: bolder; "> <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Admin  </a></li>
      </ul>
      </div>
  </nav>
	<div class="container"  ">
  	<div class="row">
    	<div class="col-md-4 col-sm-4 col-xs-12"></div>

    	<div class="col-md-4 col-sm-4 col-xs-12">

    		<!-- content -->
    		<form method="post" action="control/login.php" style="border: 0px solid #bbb; padding: 10px 30px; border-radius: 10px; margin-top: 10vh;
      		box-shadow: 0px 8px 23px 0px rgb(0,0,0,0.4)">

          <div class="form-group">
          <h2 style="text-align: center; color:#404040; font-family: cursive;">sign in</h2><br/><br/>
            <label for="exampleInputEmail1" style="font-size: 16.5px;font-weight:500">Email address:</label>
            <input type="email" name="email" class="form-control" placeholder="Email" style="border: none;border-bottom: 0.8px solid #bbb">
          </div> 
          <div class="form-group" >
            <label for="exampleInputPassword1" style="font-size: 16.5px;font-weight:500">Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Password" style="border: none;border-bottom: 0.8px solid #bbb">
          </div><br>
          <input type="submit" value="Get Started" name="login" class="btn btn-success btn-block" style=" font-size: 15.8px; font-family: cursive; "><br>
        </form>	
        <br/><br/>
        <h4 style="text-align: center;">Don't have an account? <a href="register_page.html"><u>Create an account</u></a></h4>
      </div>

      <div class="col-md-4 col-sm-4 col-xs-12"></div>
    </div>
  </div>

</body>
</html>




























