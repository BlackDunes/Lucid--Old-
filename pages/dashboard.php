<?php

$link = mysql_connect($sqlhostname, $sqlusername , $sqlpassword);
if (!$link) exit("Could not connect to MySQL");
if (!mysql_select_db($sqldatabase)) {
      echo "Could not select DB. Error: ", mysql_error();
      exit;
}

if ($link) {



			echo '
			<div id="dashsidebar">			
			
					<div id="unitbox" class="dashbox">
						<div class="dashboxtitle">
							Units
						</div>
						<div class="dashboxcontent">
							<center>';
								
			$query = "SELECT * FROM units WHERE teacherid = " . $_SESSION["id"] . " ORDER BY id DESC LIMIT 0, 5";
    		$Result = mysql_query($query, $link)  or die(mysql_error());
    		$num_units = mysql_num_rows($Result);
    		$ii = 1;
    		while($units = mysql_fetch_array($Result)) {
				echo'<div class="dashunittitle" style="background-color: #' . $units['color'] . '';
				if ($ii == 1) {
					echo '; -moz-border-top-right-radius: 5px; border-top-right-radius: 5px; -moz-border-top-left-radius: 5px; border-top-left-radius: 5px';
				}
				if (($ii == $num_units) or ($ii == 5)) {
					echo '; -moz-border-bottom-right-radius: 5px; border-bottom-right-radius: 5px; -moz-border-bottom-left-radius: 5px; border-bottom-left-radius: 5px';
				}
				echo '">
									<a href="unit.php?id=' . $units["id"] . '">' . $units["name"] . '</a>';
									
				       
										echo '
								</div>';
					$ii++;
			}
			$query2 = "SELECT * FROM units WHERE teacherid = " . $_SESSION["id"] . " ORDER BY id DESC";
    		$Result2 = mysql_query($query2, $link)  or die(mysql_error());
    		$num_units_nolimit = mysql_num_rows($Result2);

			if ($num_units == 0) {
				echo 'No units found!';
			}
			
							echo'</center>
						</div>
						<div class="dashboxbottomer">';
			if ($num_units > 0) {
							echo '<a href="index.php?p=units">
								View All (' . $num_units_nolimit . ')
							</a>';
			} else {
							echo '<a href="index.php?p=addunit">
								Create a Unit
							</a>';
			}
						echo '</div>					
					</div>
					
					
					<div id="classbox" class="dashbox">
						<div class="dashboxtitle">
							Classes
						</div>
						<div class="dashboxcontent">
							<center>';
							
			$query = "SELECT * FROM classes WHERE teacherid = " . $_SESSION["id"] . " ORDER BY id DESC";
    		$Result = mysql_query($query, $link)  or die(mysql_error());
    		$num_classes = mysql_num_rows($Result);
    		$ii = 1;
    		while($classes = mysql_fetch_array($Result)) {
				echo'<div class="dashclasstitle" style="background-color: #' . $classes['color'] . '';
				if ($ii == 1) {
					echo '; -moz-border-top-right-radius: 5px; border-top-right-radius: 5px; -moz-border-top-left-radius: 5px; border-top-left-radius: 5px';
				}
				if (($ii == $num_classes) or ($ii == 5)) {
					echo '; -moz-border-bottom-right-radius: 5px; border-bottom-right-radius: 5px; -moz-border-bottom-left-radius: 5px; border-bottom-left-radius: 5px';
				}
				echo '">  ' . $classes["name"] . '</div>';
				$ii++;
							
				}
				
				if ($num_classes == 0) {
					echo 'No classes found!';
				}			
							
							echo '</center>
						</div>';
			

						echo '<div class="dashboxbottomer">';
			if ($num_classes > 0) {
							echo '<a href="index.php?p=classes">
								View All (' . $num_classes . ')
							</a>';
			} else {
							echo '<a href="index.php?p=createclass">
								Create a Class
							</a>';
			}

						echo'</div>	
					</div>					
					<div id="activitybox" class="dashbox">
						<div class="dashboxtitle">
							Activities
						</div>
						<div class="dashboxcontent">
							<center>
							No activities found!
							</center>
						</div>
						<div class="dashboxbottomer">
							<a href="index.php?p=createactivity">
								Create an Activity
							</a>
						</div>	
					</div>
				</div>
				<div id="dashmain">
					<div class="pagetitle" style="width: 500px">
						My Dashboard
					</div>';
			$currdayofweek = date("N");
			$week_number = date("W");
			if ($currdayofweek == 7) {
				$week_number = $week_number + 1;
			}

			$year = date("Y");
			for($day=0; $day<=6; $day++)
			{
				$theweekday = date('D', strtotime($year."W".$week_number.$day));
				$themonth = date('F', strtotime($year."W".$week_number.$day));
				$thedaynum = date('j', strtotime($year."W".$week_number.$day));
				echo '<div class="';
    			if ($day == 0) {
    				echo 'sundayholder';
    			} else if ($day == 6) {
    				echo 'saturdayholder';
    			} else {
    				echo 'weekdayholder';
    			}
    			echo '">';

    			echo '<div class="';
    			if ($day == 0) {
    				echo 'itssunday';
    			} else if ($day == 6) {
    				echo 'itssaturday';
    			} else {
    				echo 'weekday';
    			}

    			$todaydate = date('D M j');
    			$selecteddate = date('D M j', strtotime($year."W".$week_number.$day));
    			if ($todaydate == $selecteddate) {
    				echo ' itstoday';
    			}

    			echo '"><div class="weekdayarea">' . $theweekday . '</div>
    					<div class="montharea">' . $themonth . '</div>
    					<div class="dayarea">' . $thedaynum . '</div>
    					</div>
    					<div class="';
    					if ($day == 0) {
    						echo 'pointsundayholder';
    					} else if ($day == 6) {
    						echo 'pointsaturdayholder';
    					} else {
    						echo 'pointholder';
    					}
    					echo'">';
    					if ($todaydate == $selecteddate) {
    				echo '<img src="assets/images/pointer.png">';
    					}
    					echo '</div>
    					</div>';
			}


					echo '
					<div id="dashclear"></div>
					<div class="currentunitsheader">
					</div>
					<div class="currentunitsholder">
						<div class="curunitsleftbar">';
						$query = "SELECT * FROM classes WHERE teacherid = " . $_SESSION["id"] . " AND schoolyear = '" . $thisschoolyear . "' AND active = 1";
    					$Result = mysql_query($query, $link)  or die(mysql_error());
    					$num_classes = mysql_num_rows($Result);
    					if ($num_classes == 0) {
    						echo '<div class="curclasscontentbottom">No classes found for this school year!</div>';
    					} else {
    						$counter1 = 1;
    						while($currentclasses = mysql_fetch_array($Result)) {

    							echo '
    							<div class="curclassheader" id="class' . $currentclasses["id"] . '" style="color: #' . $currentclasses["color"] . '">
									<a href="class.php?id=' . $currentclasses["id"] . '">' . $currentclasses["name"] . '</a>
								</div><div class="curclasscontent';
								if ($counter1 == $num_classes) {
    								echo 'bottom';
    							}
								echo '">';
								$units = $currentclasses["units"];
								if (empty($units)) {
									echo 'This class contains no units!';
								} else {
									$query2 = "SELECT * FROM units WHERE id IN (" . $units . ") AND NOW() BETWEEN startdate AND enddate ORDER BY startdate ASC";
    								$Result2 = mysql_query($query2, $link)  or die(mysql_error());
    								$num_units = mysql_num_rows($Result2);
    								if ($num_units == 0) {
    									echo 'This class contains no currently active units!';
    								} else {
    									$counter2 = 1;
    									while($currentunits = mysql_fetch_array($Result2)) {
    										echo '
    										<div class="classunitholder';
    										if ($counter2 == $num_units) {
    											echo 'last';
    										}
    										echo '">
											<div class="classunitthumbpic" style="background-image: url(images/unitpics/thumbs/' . $currentunits['image'] . '); border-color: #' . $currentunits['color'] . '">
											</div>
											<div class="classunitdescription">
												<a href="unit.php?id=' . $currentunits['id'] . '">' . $currentunits['name'] . '</a><br />
												<span class="classunitdescribetext">' . $currentunits['description'] . '</span> 
											</div>
											<div id="dashclear"></div>
											</div>';
											$counter2++;
										}
    								}
    							}
    							echo '
									</div>';
							$counter1++;
    						}
    					}
							
						echo '
						</div>
						<div class="curunitsrightbar">
						</div>
						<div id="dashclear"></div>
					</div>
					<div class="currentunitsfooter">
					</div>
			</div>
		</div>
		<div id="dashclear"></div>';
}
				
?>