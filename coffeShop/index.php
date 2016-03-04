<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width-device-width,initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/login-form.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/buttons.css" />
        <title>cherryDrops</title>
        <?php include('config.inc');
        session_start();
        $_SESSION['table_no']=0;
        $_SESSION['user_id']=-1;
        $_SESSION['order']=-1;
        ?>
        <style>
            .hide_off{display: none;}
            
        </style>
    </head>
    <body>
         <center>
        <div class="">
                
                <div class="container">
                    <div class="nav pull-left">
                        <img src="img/words.gif" />
                    </div>
                    <div class="nav pull-right">
                        <img src="img/logo.gif" />
                    </div>
                    </div>
            
        </div>
        <div class="container  bg_needed" >
           
           <div class="login-form">

	<h1>Login Form</h1>

	<form action="#">

		<input type="text" class="username" placeholder="username" >
		
		<input type="password" class="password" placeholder="password">
		
		
		
		<input type="submit" value="log in" class="trust_me" style='display: none'>

	</form>

</div>
            </div>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/login-form.js"></script>
    </center></body>
</html>
