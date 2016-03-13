           <?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
 
sec_session_start();
if (login_check($mysqli) == true) :
include('partials/header.php');
			?>   
      
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Gebruiker toevoegen</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
				<?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
                <!-- START class="row" -->
                    <div class="row">
					
					<!-- START class="col-md-12" -->
                        <div class="col-md-12">
                            
							<!-- START Form register -->
                            <form role="form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" class="form-horizontal" method="post" name="registration_form">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Account</strong> Registreren</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <p>Op deze pagina kan je een account registreren</p>
                                </div>
                                <div class="panel-body">                                                                        
                                    
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Gebruikersnaam</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                               <input type="text" class="form-control" placeholder="gebruikersnaam" name="username" id="username" required autofocus>
                                            </div>                                            
                                            <span class="help-block">Vul hier uw gebruikersnaam</span>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">E-mail</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" placeholder="E-mail" name="email" id="email" required autofocus>
                                            </div>                                            
                                            <span class="help-block">Voer hier u e-mail in</span>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Wachtwoord</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="password" name="password" class="form-control" placeholder="Wachtwoord" id="password" value="">
                                            </div>                                            
                                            <span class="help-block">Vul hier uw wachtwoord in</span>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Wachtwoord bevestigen</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                               <input type="password" name="confirmpwd" class="form-control" placeholder="Wachtwoord bevestigen" id="confirmpwd" value="">
                                            </div>                                            
                                            <span class="help-block">Vul hier nog een keer hetzelfde wachtwoord in </span>
                                        </div>
                                    </div>
                                                                     
                                                                       
                                    
                                </div>
                                <div class="panel-footer">                             
									<input type="button" value="voeg toe" class="btn btn-primary pull-right" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwd);">
                                </div>
                            </div>
                            </form>
                            <!-- END Form register -->
                        </div>
						<!-- END class="col-md-12" -->
					</div>                    
					<!-- END class="row" -->
					
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->             
        <?php else : 
            			include("login.php");		
			endif; ?>
        <?php
	include("partials/signout_bar.php");
	?>
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>                
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- END THIS PAGE PLUGINS -->       
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->                   
    </body>
</html>






