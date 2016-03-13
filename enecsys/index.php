<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
if (login_check($mysqli) == true) :
include('partials/header.php');
include('inverter_overview.php');
?>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->                       
        
<!-- START WIDGET CLOCK -->
                            <div class="widget widget-info widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                                                        
                            </div>                        
                            <!-- END WIDGET CLOCK -->
        
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                   <div class="row">
                        <?php
						include ("includes/connect.php");
						$query = "SELECT inverter_name, id, wh, ts, state FROM inverters, enecsys WHERE inverters.inverter_serial = enecsys.id GROUP BY(id)";
						$resultaat = mysql_query($query);
						while ($row = mysql_fetch_array($resultaat))

						{
							?>
						<div class="col-md-3">
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon">
							   <div class="widget-item-left">
                                    <span class="<?php $stater = $row["state"];
															if ($stater == 0) {
																echo "<font color=\"green\">" ?> <i class="fa fa-sun-o"></i><?php "</font>";
															} else if ($stater == 1) {
																echo "<font color=\"orange\">" ?> <i class="fa fa-cloud"></i> <?php "</font>";
															} else if ($stater == 3) {
																echo "<font color=\"red\">" ?><i class="fa fa-moon-o"></i> <?php "</font>";
															} else {
																echo "<font color=\"black\">" ?><i class="fa fa-times"></i> <?php "</font>";
															}; ?></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo "" . $row["inverter_name"] .  "<br />"; ?></div>
                                    <div class="widget-title"> <?php echo "" . $row["wh"] .  " wh <br />"; ?></div>	
                                    <div class="widget-subtitle"><?php echo "Laatste update: " . $row["ts"] .  "<br />";?></div>
									<div class="widget-subtitle"><?php echo "Serienummer: " . $row["id"] .  "<br />";?></div> 
									
                                </div>      
                                <div class="widget-controls">                               
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>                      
						
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
							<?php
							}

							?>	

				</div>
				
				<div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
						
				     <!-- START TABLE total today -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
								<?php
						$datum = $_POST["datum"];
						
						
						?>
                                    <h3 class="panel-title"><?php
									if (!$datum) {
										echo "Totale gegevens Vandaag";
									} else if ($datum == vandaag) {
										echo "Totale gegevens Vandaag";
									} else if ($datum == maand) {
										echo "Totale gegevens deze maand";
									} else if ($datum == jaar) {
										echo "Totale gegevens dit jaar";
									}
									?>
									</h3>
								
						
						   <div class="pull-right">
						<form name="form" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" role="form" class="form-horizontal">
						<select name="datum">
						
						<option <?php if ($datum == "vandaag") { ?>selected <?php } ?>> vandaag </option>
						<option <?php if ($datum == "maand") { ?>selected <?php } ?>> maand </option>
						<option <?php if ($datum == "jaar") { ?>selected <?php } ?>> jaar </option>
						<option <?php if ($datum == "levensjaar") { ?>selected <?php } ?>> levensjaar </option>
						

						</select>
						<input type="submit" value="ok">
						</form>
						</div>
						</div>
						<?php
						if (!$datum) {
						?>
						
						<div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Naam</th>
                                                <th>Inverter</th>
                                                <th>Watt</th>
                                            </tr> 
                                        </thead>
										
									<?php
									include("includes/db_connect.php");
									mysql_connect($servername, $username, $password);
										mysql_select_db($database);
										$query = "SELECT inverters.inverter_name, enecsys_day.ts, enecsys_day.id, SUM(enecsys_day.wh), enecsys_day.dcpower, enecsys_day.dccurrent, enecsys_day.efficiency, enecsys_day.acfreq, enecsys_day.acvolt, enecsys_day.temp, enecsys_day.state  FROM inverters, enecsys_day WHERE inverters.inverter_serial = enecsys_day.id GROUP BY id";
										$resultaat = mysql_query($query);
										while ($row = mysql_fetch_array($resultaat)) {
										?>
                                       
                                            <tr>
												<td><?php echo $row["inverter_name"]; ?></td>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["SUM(enecsys_day.wh)"]; ?></td>
												
											</tr>
										<?php
										}
										?>
									 
                                    </table>                                
                                </div>
                          						  </div>
								</div> 
							   </div>
						<?php 
						}
						else if ($datum == "vandaag")
						{
							?>
							
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Naam</th>
                                                <th>Inverter</th>
                                                <th>Watt</th>
                                            </tr> 
                                        </thead>
										
									<?php
									include("includes/db_connect.php");
									mysql_connect($servername, $username, $password);
										mysql_select_db($database);
										$query = "SELECT inverters.inverter_name, enecsys_day.ts, enecsys_day.id, SUM(enecsys_day.wh), enecsys_day.dcpower, enecsys_day.dccurrent, enecsys_day.efficiency, enecsys_day.acfreq, enecsys_day.acvolt, enecsys_day.temp, enecsys_day.state  FROM inverters, enecsys_day WHERE inverters.inverter_serial = enecsys_day.id GROUP BY id";
										$resultaat = mysql_query($query);
										while ($row = mysql_fetch_array($resultaat)) {
										?>
                                       
                                            <tr>
												<td><?php echo $row["inverter_name"]; ?></td>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["SUM(enecsys_day.wh)"]; ?></td>
												
											</tr>
										<?php
										}
										?>
									 
                                    </table>                                
                                </div>
                          						  </div>
								</div> 
							   </div>
						<?php						  
						}
						else if ($datum == "maand")
						{
					?>
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Naam</th>
                                                <th>Inverter</th>
                                                <th>Watt</th>
                                            </tr> 
                                        </thead>
										
									<?php
									include("includes/db_connect.php");
									mysql_connect($servername, $username, $password);
										mysql_select_db($database);
										$query = "SELECT inverters.inverter_name, cday.ts, cday.id, SUM(cday.wh), cday.dcpower, cday.dccurrent, cday.efficiency, cday.acfreq, cday.acvolt, cday.temp, cday.state  FROM inverters, cday WHERE inverters.inverter_serial = cday.id GROUP BY id";
										$resultaat = mysql_query($query);
										while ($row = mysql_fetch_array($resultaat)) {
										?>
                                       
                                            <tr>
												<td><?php echo $row["inverter_name"]; ?></td>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["SUM(cday.wh)"]; ?></td>
												
											</tr>
										<?php
										}
						}
						else if ($datum == "jaar")
						{
					?>
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Naam</th>
                                                <th>Inverter</th>
                                                <th>Watt</th>
                                            </tr> 
                                        </thead>
										
									<?php
									include("includes/db_connect.php");
									mysql_connect($servername, $username, $password);
										mysql_select_db($database);
										$query = "SELECT inverters.inverter_name, cmonth.ts, cmonth.id, SUM(cmonth.wh), cmonth.dcpower, cmonth.dccurrent, cmonth.efficiency, cmonth.acfreq, cmonth.acvolt, cmonth.temp, cmonth.state  FROM inverters, cmonth WHERE inverters.inverter_serial = cmonth.id GROUP BY id";
										$resultaat = mysql_query($query);
										while ($row = mysql_fetch_array($resultaat)) {
										?>
                                       
                                            <tr>
												<td><?php echo $row["inverter_name"]; ?></td>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["SUM(cmonth.wh)"]; ?></td>
												
											</tr>
										<?php
										}
						}
						else if ($datum == "levensjaar")
						{
					?>
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Naam</th>
                                                <th>Inverter</th>
                                                <th>Watt</th>
                                            </tr> 
                                        </thead>
										
									<?php
									include("includes/db_connect.php");
									mysql_connect($servername, $username, $password);
										mysql_select_db($database);
										$query = "SELECT inverters.inverter_name, cyear.ts, cyear.id, SUM(cyear.wh), cyear.dcpower, cyear.dccurrent, cyear.efficiency, cyear.acfreq, cyear.acvolt, cyear.temp, cyear.state  FROM inverters, cyear WHERE inverters.inverter_serial = cyear.id GROUP BY id";
										$resultaat = mysql_query($query);
										while ($row = mysql_fetch_array($resultaat)) {
										?>
                                       
                                            <tr>
												<td><?php echo $row["inverter_name"]; ?></td>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["SUM(cyear.wh)"]; ?></td>
												
											</tr>
										<?php
										}
						}
						
										?>
										
										
						
									 
                                    </table>                                
                                </div>
                            </div>
						
                            <!-- END TABLE total today -->
							
							

				
			<!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
			<?php else : 
            			include("login.php");		
			endif; ?>
        <?php
	include("partials/signout_bar.php");
	?>

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






