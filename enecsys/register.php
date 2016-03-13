<?php
include_once 'includes/register.inc.php';
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
                    <div class="login-title"><strong>Welkom</strong>, Registreer hier</div>
                    <form role="form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" class="form-horizontal" method="post" name="registration_form">
                    <div class="form-group">
                        <div class="col-md-12">
							<input type="text" class="form-control" placeholder="Gebruikersnaam" name="username" id="username" required autofocus>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-md-12">
							<input type="text" class="form-control" placeholder="E-mail" name="email" id="email" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
							<input type="password" name="password" class="form-control" placeholder="Wachtwoord" id="password" value="">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-md-12">
							<input type="password" name="confirmpwd" class="form-control" placeholder="Bevestig wachtwoord" id="confirmpwd" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
							<input type="button" class="btn btn-lg btn-success btn-block" value="Register" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwd);" />
                        </div>
                    </div>
                    </form>
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






