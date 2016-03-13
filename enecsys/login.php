<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title><?php echo $sitename ?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->      

		<!-- Scripts -->
	    <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
        
        <div class="login-container">
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Welkom</strong>, Meld u hier aan</div>
                    <form action="includes/process_login.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
							<input type="text" class="form-control" placeholder="E-Mail" name="email" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
							<input type="password" name="password" class="form-control" placeholder="Wachtwoord" id="password" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="register.php" class="btn btn-link btn-block">Heb je nog geen account?</a>
                        </div>
                        <div class="col-md-6">
							<input type="button" class="btn btn-lg btn-success btn-block" value="login" onclick="formhash(this.form, this.form.password);" />
                        </div>
                    </div>
                    </form>
				<?php
				if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
						echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
				} else {   
                        echo "";
                }
?>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; Martijn & Noah
                    </div>
                    <div class="pull-right">
                        <a href="#">Enecsys</a> |
                        <a href="#">Raspberry Pi</a> |
                        <a href="#">Documentatie</a>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /container -->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
    </body>
</html>






