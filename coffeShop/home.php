<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width-device-width,initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
		<link href="date/jquery.datepick.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/buttons.css" />
        <link rel="stylesheet" type="text/css" href="css/select_box.css" />
        <title>cherryDrops</title>
        <?php include('config.inc');
            include_once 'home_func.php';
        session_start();
        $_SESSION['table_no']=0;
        $_SESSION['boy_no']=0;
        $user_id=$_SESSION['user_id'];
        $res=  mysql_fetch_array(mysql_query("select * from user where user_id=$user_id"));
        $username=$res['name'];
        $user_type=$res['level'];
        $side_bar=get_sidebar($user_type);
        $_SESSION['order']=-1;
        $_SESSION['from_edit']=0;
        ?>
        <style>
            .hide_off{display: none;}
        </style>
    </head>
    <body>
        
            <div class="">
                
                <div class="container">
                    <div class="nav pull-left">
                        <img src="img/words.gif" />
                    </div>
                    <div class="nav pull-right logo">
                        <img src="img/logo.gif" />
                    </div>
                    </div>
            
        </div>
        <div class="container">
             <center>
            <div class="border">
                    
                        &nbsp;&nbsp;&nbsp;<a href='#' class="what_to_do button big orange" id="1">Home</a>&nbsp;&nbsp;&nbsp;
                        <?php
                        echo $side_bar;
                        ?>
                        &nbsp;&nbsp;&nbsp;<a href='#' class="button big orange what_to_do" id="8">Settings</a>&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;<a href='logout.php' class="button big orange" id="6">Logout</a>&nbsp;&nbsp;&nbsp;
                </div></center>
            <div class="container bg_needed">
            
               
                 <center>   
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </center>
                <div class="row-fluid">
                <div class="span12" id="master">
                 <center> <pre style="font-size:18"> A Flash Back right to the dream, suddenly a cherry felt on a head,  gifted to his loved ones with love.

The power of dreams to create and passion to love - melted the idea of "Cafe Cherry Drops" - a place 

to eat mouthwatering foods cooked with love for the loved ones finally served passionately. Every 

single precious time you spent with your loved ones; it will be so muchhhh memorable. We believe to 

move n shake, up & down; check it out - the best in town!     

               </pre> </center></div>
            </div>
                
        </div>
            <center>
            <div class="border">
                    

                        <h4 class="">Welcome <?php echo $username;?></h4>
                        
                        
                </div></center>
        </div>
        </body>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/master.js" type="text/javascript"></script>
        <script src="order/js/order.js" type="text/javascript"></script>
        <script src="add/js/add_item.js" type="text/javascript"></script>
        <script src="edit/js/edit_item.js" type="text/javascript"></script>
        <script src="report/js/report.js" type="text/javascript"></script>
        <script src="status/js/status.js" type="text/javascript"></script>
         <script type="text/javascript" src="date/normal.js"></script>
         <script src="setting/js/settings.js" type="text/javascript"></script>
        <script type="text/javascript" src="date/jquery.datepick.js"></script>
    
</html>
