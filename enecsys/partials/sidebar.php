<!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.php"></a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="<?php echo $avatar; ?>" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?php echo $avatar; ?>" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo htmlentities($_SESSION['username']); ?></div>
                            </div>
                            
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigatie</li>
                    <li>
                        <a href="index.php"><span class="fa fa-home"></span> <span class="xn-text">Home</span></a>                        
                    </li>  
					<li>
                        <a href="<?php echo $pvoutput; ?>"><span class="fa fa-desktop"></span> <span class="xn-text">PV Output</span></a>                        
                    </li> 
					<li>
                        <a href="tables.php"><span class="fa fa-table" data-box="#mb-tablewarn"></span> <span class="xn-text">Tabellen</span></a>                        
                    </li>
					<li class="xn-title">Instellingen</li>
					<li>
                        <a href="add_inverter.php"><span class="fa fa-cog" data-box="#mb-tablewarn"></span> <span class="xn-text">Inverter toevoegen</span></a>                        
                    </li>
					<li>
                        <a href="register3.php"><span class="fa fa-user" data-box="#mb-tablewarn"></span> <span class="xn-text">Gebruiker toevoegen</span></a>                        
                    </li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->