           <?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
include_once 'includes/db_connect.php';
 
sec_session_start();
if (login_check($mysqli) == true) :
include('partials/header.php');
			?>   
      
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Inverter toevoegen</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
					<!-- START ROW -->
                    <div class="row">
						<!-- START COL-MD-12 -->
                        <div class="col-md-12">
                            <!-- START FORM -->
                            <form name="info" class="form-horizontal" action="./function_inv.php" method="post">
							<!-- START PAnel Panel-Default -->
                            <div class="panel panel-default">
								<!-- START Panel-Heading -->
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Inverter</strong> Toevoegen</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
								<!-- END Panel Header -->
								<!-- START Panel Body -->
                                <div class="panel-body">
                                    <p>Op deze pagina kan je Inverters toevoegen, en een naam geven.</p>
                                </div>
								<!-- END Panel Body -->
								<!-- START Panel-body -->
                                <div class="panel-body">                                                                        
                                    <!-- START Form Group Inverter Serial -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Inverter ID</label>
										<!-- START COL MD6 COL XS12 -->
                                        <div class="col-md-6 col-xs-12"> 
											<!-- START Group input -->										
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="serial" class="form-control"/>
                                            </div>      
											<!-- END Group input -->
                                            <span class="help-block">Hier moet je de Inverter ID of Serial Invoeren.</span>
                                        </div>
										<!-- END COL MD6 COL XS12 -->
                                    </div>
									<!-- END Form Group Inverter Serial -->
									<!-- START Form Group Inverter naam -->
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Inverter naam</label>
										<!-- START COL MD6 COL XS12 -->
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
												<!-- START Group input -->
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="inverter" class="form-control"/>
                                            </div>   
												<!-- END Group input -->												
                                            <span class="help-block">Geef je inverter een naam om het makkelijk te kunnen vinden.</span>
                                        </div>
										<!-- END COL MD6 COL XS12 -->
                                    </div>
									<!-- END Form GRoup Inverter naam -->
									<!-- START Form-Group Type -->
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Inverter Type</label>
										<!-- START COL MD6 COL XS12 -->
                                        <div class="col-md-6 col-xs-12">   
											<!-- START Group input -->
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="type" class="form-control"/>
                                            </div> 
											<!-- END Group Input -->
                                            <span class="help-block">Welk type inverter heb je? e.g. SMI-480-60 </span>
                                        </div>
										<!-- END COL MD6 COL XS12 -->
                                    </div>
									<!-- END Form-Group Type-->
                                                                     
                                                                       
                                    
                                </div>
								<!-- END Panel-body -->
									<!-- START Submit knop -->
									<input type="submit" value="voeg toe" class="btn btn-primary pull-right">
									<!-- END Submit Knop -->
                                </div>
								<!-- END Panel-Heading -->
                            </div>
							<!-- END PAnel Panel-Default -->
                            </form>
                            <!-- END FORM -->
                        </div>
						<!-- END COL-MD-12 -->
                    </div>                    
                    <!-- END ROW -->
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
        
        <!-- START LOGOUT GELUIDEN -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END LOGOUT GELUIDEN --> 

		<!-- START NIET INGELOGT -->
        <?php else : 
            			include("login.php");		
			endif; ?>
		<!-- END NIET INGELOGT -->
		
		<!-- START LOGOUT -->
        <?php
	include("partials/signout_bar.php");
	?>
		<!-- END LOGOUT -->
    <!-- START SCRIPTS -->
        <!-- START JS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>                
        <!-- END JS -->
        
        <!-- START PLUGINS JS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- END PLUGINS JS -->       
        
        <!-- START TEMPLATE JS -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE JS -->
    <!-- END SCRIPTS -->                   
    </body>
</html>






