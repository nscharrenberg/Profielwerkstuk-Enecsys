 <?php
							include_once 'includes/db_connect.php';

                            $query = "
                              SELECT ts, id, wh
                              FROM enecsys
                              ORDER BY ts ASC";
                            $result = $mysqli->query( $query );


                            if ( !$result ) {
                              // Nope
                              $message  = 'Invalid query: ' . $mysqli->error . "\n";
                              $message .= 'Whole query: ' . $query;
                              die( $message );
                            }


                            while ( $row = $result->fetch_assoc() ) {
                              echo $row['category'] . ' | ' . $row['value1'] . ' | ' .$row['value2'] . "\n";
                            }


                            mysqli_close($mysqli);
?> 