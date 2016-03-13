
<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
if (login_check($mysqli) == true) :
include('partials/header.php');
?>
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>                    
                    <li class="active">Tabellen</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Database Logs</h2>
                </div>
                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
				<!-- START class row -->
                    <div class="row">
						<div class="col-md-12">

                            <!-- START live table -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Live-logs</h3>       
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
												<th>Naam inverter</th>
                                                <th>Datum</th>
                                                <th>Inverter</th>
                                                <th>Watt per uur</th>
                                                <th>dcpower</th>
                                                <th>dccurrent</th>
                                                <th>efficiency</th>
												<th>acfreq</th>
												<th>acvolt</th>
												<th>Temp</th>
												<th>status</th>
                                            </tr>
                                        </thead>
										<tbody>
										<?php
										mysql_connect($servername, $username, $password);
										mysql_select_db($database);
										$query = "SELECT inverters.inverter_name, enecsys.ts, enecsys.id, enecsys.wh, enecsys.dcpower, enecsys.dccurrent, enecsys.efficiency, enecsys.acfreq, enecsys.acvolt, enecsys.temp, enecsys.state  FROM inverters, enecsys WHERE inverters.inverter_serial = enecsys.id ORDER BY enecsys.ts DESC";
										$resultaat = mysql_query($query);
										while ($row = mysql_fetch_array($resultaat)) {
										?>
                                       
                                            <tr>
												<td><?php echo $row["inverter_name"]; ?></td>
                                                <td><?php echo $row["ts"]; ?></td>
                                                <td><?php echo $row["id"]; ?></td>
												<td><?php echo $row["wh"]; ?></td>
												<td><?php echo $row["dcpower"]; ?></td>
												<td><?php echo $row["dccurrent"]; ?></td>
												<td><?php echo $row["efficiency"]; ?></td>
												<td><?php echo $row["acfreq"]; ?></td>
												<td><?php echo $row["acvolt"]; ?></td>
												<td><?php echo $row["temp"]; ?></td>
												<td><?php $stater = $row["state"];
															if ($stater == 0) {
																echo "<font color=\"green\">" ?> <i class="fa fa-sun-o"></i><?php "</font>";
															} else if ($stater == 1) {
																echo "<font color=\"orange\">" ?> <i class="fa fa-cloud"></i> <?php "</font>";
															} else if ($stater == 3) {
																echo "<font color=\"red\">" ?><i class="fa fa-moon-o"></i> <?php "</font>";
															} else {
																echo "Error: Geen status";
															}; ?></td>
											</tr>
										<?php
										}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END live table -->

                        </div>
						<!-- START col-md-12 -->
                        <div class="col-md-12">

                            <!-- START day table -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Vandaag binnengekomen</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
												<th>Naam inverter</th>
                                                <th>Datum</th>
                                                <th>Inverter</th>
                                                <th>Watt per uur</th>
                                                <th>dcpower</th>
                                                <th>dccurrent</th>
                                                <th>efficiency</th>
												<th>acfreq</th>
												<th>acvolt</th>
                                            </tr>
                                        </thead>
										<tbody>
										<?php
										mysql_connect($servername, $username, $password);
										mysql_select_db($database);
										$query = "SELECT inverters.inverter_name, enecsys_day.ts, enecsys_day.id, enecsys_day.wh, enecsys_day.dcpower, enecsys_day.dccurrent, enecsys_day.efficiency, enecsys_day.acfreq, enecsys_day.acvolt, enecsys_day.temp, enecsys_day.state  FROM inverters, enecsys_day WHERE inverters.inverter_serial = enecsys_day.id ORDER BY ts ASC";
										$resultaat = mysql_query($query);
										while ($row = mysql_fetch_array($resultaat)) {
										?>
                                        
                                            <tr>
												<td><?php echo $row["inverter_name"]; ?></td>
                                                <td><?php echo $row["ts"]; ?></td>
                                                <td><?php echo $row["id"]; ?></td>
												<td><?php echo $row["wh"]; ?></td>
												<td><?php echo $row["dcpower"]; ?></td>
												<td><?php echo $row["dccurrent"]; ?></td>
												<td><?php echo $row["efficiency"]; ?></td>
												<td><?php echo $row["acfreq"]; ?></td>
												<td><?php echo $row["acvolt"]; ?></td>
                                            </tr>
										<?php
										}
										?>
                                        </tbody>
                                    </table>
                                </div>
								 
                            </div>
                            <!-- END day table -->

                        </div>
						<!-- END col-md-12 -->
						
                    </div>                                
                    <!-- END class row -->
                </div>
                <!-- PAGE CONTENT WRAPPER -->                                
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

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>        
        
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>    
        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS --> 
        
    </body>
</html>






