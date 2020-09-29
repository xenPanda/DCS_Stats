<?php
require_once 'includes.php';
$playerid = $_GET['playerid'];
$playername = get_playername($playerid,$con);
$playername = $playername[0]['playername'];
$player_stats = get_player_stats($playerid, $con);
$player_airframes = get_player_airframes($playerid, $con);
$weapon_stats = get_player_weapon_stats($playerid, $con);
$lso_grades = get_lso_grades($playerid, $con);
$kill_stats = get_kill_stats($playerid, $con);
$ground_kill_stats = get_kill_stats($playerid, $con);
$helicopter_kill_stats = get_kill_stats($playerid, $con);
$ship_kill_stats = get_kill_stats($playerid, $con);
$building_kill_stats = get_kill_stats($playerid, $con);
$total_air_kills = 0;
$total_ground_kills = 0;
$total_helicopter_kills = 0;
$total_ship_kills = 0;
$total_building_kills = 0;
//Column Variables
$column_total_time = 'total_time';
$column_air_time = 'air_time';
$column_total_deaths = 'pilot_deaths';
$column_crash_deaths = 'crash_deaths';
$column_ejection_deaths = 'ejection_deaths';


$total_time = get_column_sum($column_total_time, $playerid, $con);
$total_time = convert_time($total_time[0]['SUM(total_time)']) ; 
$air_time = get_column_sum($column_air_time, $playerid, $con);
$air_time = convert_time($air_time[0]['SUM(air_time)']);
$total_deaths = get_column_sum($column_total_deaths, $playerid, $con);
$total_deaths = $total_deaths[0]['SUM(pilot_deaths)'] ;
$crash_deaths = get_column_sum($column_crash_deaths, $playerid, $con);
$crash_deaths = $crash_deaths[0]['SUM(crash_deaths)'] ;
$ejection_deaths = get_column_sum($column_ejection_deaths, $playerid, $con);
$ejection_deaths = $ejection_deaths[0]['SUM(ejection_deaths)'] ;
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
	<link rel="stylesheet" type="text/css" media="all" href="css/stats.css">
	</head>
	<body>
		<div class="layout-column">
			<header id="page-header">
				<a href="/">CSG-3 Pilot Statistics</a>
			</header>
			<section id="page-content">
<div class="pilot-page">
    <div id="pilot">
        <h1>
            <?php       
                echo htmlspecialchars($playername); 
            ?>
        </h1>
        <h2>
            Logbook
        </h2>
    </div>
	<div class="columns-row">
		<div class="column quarter">
			<table class="vertical">
				<thead>
					<tr>
						<th colspan="2">
							Combat log
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>
							PvP Kills
						</th>
						<td>
                            <?php $pvp_kills = get_pvp_total('number', $playerid, 'kills', $con); 
                            if (is_null($pvp_kills[0]['SUM(number)']))
                            {
                                $pvp_kills = 0;
                                echo $pvp_kills;
                            } else {
                                $pvp_kills = $pvp_kills[0]['SUM(number)'];
                                echo $pvp_kills;
                            }
                            
                            ?>
						</td>
					</tr>
					<tr>
						<th>
							PvP Losses
						</th>
						<td>
                        <?php $pvp_losses = get_pvp_total('number', $playerid, 'losses', $con); 
                            if (is_null($pvp_losses[0]['SUM(number)']))
                            {
                                $pvp_losses = 0;
                                echo $pvp_losses;
                            } else {
                                $pvp_losses = $pvp_losses[0]['SUM(number)'];
                                echo $pvp_losses;
                            }
                            
                            ?>
						</td>
					</tr>
					<tr>
						<th>
							Total Air Kills
						</th>
						<td>
                            <?php  
                            $total_a2a_kills = get_kills_total('kill_no', $playerid, 'Planes', $con);
                            //print_r($total_a2a_kills);
                            if (is_null($total_a2a_kills[0]['SUM(kill_no)']))
                        {
                            echo 0;
                        } else {
                            echo $total_a2a_kills[0]['SUM(kill_no)'];
                        }
                            ?>
						</td>
					</tr>
					<tr>
						<th>
							Total Ground Kills
						</th>
						<td>
                        <?php
                        $total_a2g_kills = get_kills_total('kill_no', $playerid, 'Ground Units', $con);
                        //print_r($total_a2g_kills);
                        if (is_null($total_a2g_kills[0]['SUM(kill_no)']))
                        {
                            echo 0;
                        } else {
                            echo $total_a2g_kills[0]['SUM(kill_no)'];
                        }  
                        ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="column quarter">
			<table class="vertical">
				<thead>
					<tr>
						<th colspan="2">
							Flight log
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>
							Total Time
						</th>
						<td>
                        <?php echo $total_time; ?>
						</td>
					</tr>
					<tr>
						<th>
							Flight Time
						</th>
						<td>
                        <?php echo $air_time; ?>
						</td>
					</tr>
					<tr>
						<th>
							Total Deaths
						</th>
						<td>
						<?php echo $total_deaths; ?>
						</td>
					</tr>
					<tr>
						<th>
							Crash Deaths
						</th>
						<td>
						<?php echo $crash_deaths; ?>
						</td>
					</tr>
					<tr>
						<th>
							Ejections
						</th>
						<td>
						<?php echo $ejection_deaths; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="column half right">
			<table class="stats">
				<thead>
					<tr>
						<th class="aleft">
							Airframe
						</th>
						<th class="aright">
							Total Time
						</th>
						<th class="aright">
							Flight Time
						</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach ($player_airframes as $key => $value){
                        $airframe_total_time = convert_time($value['total_time']);
                        $airframe_air_time = convert_time($value['air_time']);
                        $pairframe = str_replace("_", " ", $value['airframe']);
                        $pairframe = ucwords($pairframe);
                        echo '<tr> <td>'. $pairframe . '</td> <td class="time">'. $airframe_total_time . '</td> <td class="time">'. $airframe_air_time. '</td> </tr>';
                    }
                    ?>

				</tbody>
			</table>
		</div>
    </div>
    <div id='kills'>
	    <h2>
		    Kills
        </h2>
    </div>
	<div class="columns-row">
		<div class="column fifth">
			<table class="vertical kills">
				<thead>
					<th colspan="2">
						planes
					</th>
				</thead>
				<tbody>
                    
                <?php 
                            //KILL STATS HERE
                                foreach ($kill_stats as $key => $value) {
                                $kill_type = $value['kill_type'];
                                    if ($kill_type == 'Planes') {
                                $kill_sub_type = $value['kill_sub_type'];
                                //print_r($kill_stats);
                                //print_r($value);
                                //print($kill_type);
                                //print($kill_sub_type);
                                //$kill_type = 'Planes';
                                $sum_kill_no = get_kill_sum('kill_no', $playerid, $kill_type, $kill_sub_type, $con);
                                //print_r($sum_kill_no);
                                $kill_no = $sum_kill_no[0]['SUM(kill_no)'];
                                //print($kill_no);
                                echo '<tr> <th>'. $kill_sub_type . '</th> <td>'. $kill_no . '</td> </tr>';
                                $total_air_kills += $kill_no;
                                    }

                                }
                        ?>
					<tr>
						<th>Total</th>
						<td><?php echo $total_air_kills; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="column fifth">
			<table class="vertical kills">
				<thead>
					<th colspan="2">
						ground units
					</th>
				</thead>
				<tbody>
                            <?php
                            foreach ($ground_kill_stats as $key => $value) {
                            $kill_type = $value['kill_type'];
                                if ($kill_type == 'Ground Units') {
                            $kill_sub_type = $value['kill_sub_type'];
                            //print_r($ground_kill_stats);
                            //print_r($value);
                            //print($kill_type);
                            //print($kill_sub_type);
                            //$kill_type = 'Gound Units';
                            $sum_kill_no = get_kill_sum('kill_no', $playerid, $kill_type, $kill_sub_type, $con);
                            //print_r($sum_kill_no);
                            $kill_no = $sum_kill_no[0]['SUM(kill_no)'];
                            //print($kill_no);
                            echo '<tr> <th>'. $kill_sub_type . '</th> <td>'. $kill_no . '</td> </tr>';
                            $total_ground_kills += $kill_no;
                               }

                            }
                            ?>
					<tr>
						<th>Total</th>
						<td><?php echo $total_ground_kills; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="column fifth">
			<table class="vertical kills">
				<thead>
					<th colspan="2">
						ships
					</th>
				</thead>
				<tbody>
                <?php
                            foreach ($ship_kill_stats as $key => $value) {
                            $kill_type = $value['kill_type'];
                                if ($kill_type == 'Ships') {
                            $kill_sub_type = $value['kill_sub_type'];
                            //print_r($ground_kill_stats);
                            //print_r($value);
                            //print($kill_type);
                            //print($kill_sub_type);
                            //$kill_type = 'Gound Units';
                            $sum_kill_no = get_kill_sum('kill_no', $playerid, $kill_type, $kill_sub_type, $con);
                            //print_r($sum_kill_no);
                            $kill_no = $sum_kill_no[0]['SUM(kill_no)'];
                            //print($kill_no);
                            echo '<tr> <th>'. $kill_sub_type . '</th> <td>'. $kill_no . '</td> </tr>';
                            $total_ship_kills += $kill_no;
                               }

                            }
                            ?>
					<tr>
						<th>Total</th>
						<td><?php echo $total_ship_kills; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="column fifth">
			<table class="vertical kills">
				<thead>
					<th colspan="2">
						helicopters
					</th>
				</thead>
				<tbody>
                <?php
                            foreach ($helicopter_kill_stats as $key => $value) {
                            $kill_type = $value['kill_type'];
                            //print_r($helicopter_kill_stats);
                                if ($kill_type == 'Helicopters') {
                            $kill_sub_type = $value['kill_sub_type'];
                            //print_r($value);
                            //print($kill_type);
                            //print($kill_sub_type);
                            //$kill_type = 'Gound Units';
                            $sum_kill_no = get_kill_sum('kill_no', $playerid, $kill_type, $kill_sub_type, $con);
                            //print_r($sum_kill_no);
                            $kill_no = $sum_kill_no[0]['SUM(kill_no)'];
                            //print($kill_no);
                            echo '<tr> <th>'. $kill_sub_type . '</th> <td>'. $kill_no . '</td> </tr>';
                            $total_helicopter_kills += $kill_no;
                               }

                            }
                            ?>
					<tr>
						<th>Total</th>
						<td><?php echo $total_helicopter_kills; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="column fifth">
			<table class="vertical kills">
				<thead>
					<th colspan="2">
						buildings
					</th>
				</thead>
				<tbody>
                <?php
                            foreach ($building_kill_stats as $key => $value) {
                            $kill_type = $value['kill_type'];
                                if ($kill_type == 'Ships') {
                            $kill_sub_type = $value['kill_sub_type'];
                            //print_r($ground_kill_stats);
                            //print_r($value);
                            //print($kill_type);
                            //print($kill_sub_type);
                            //$kill_type = 'Gound Units';
                            $sum_kill_no = get_kill_sum('kill_no', $playerid, $kill_type, $kill_sub_type, $con);
                            //print_r($sum_kill_no);
                            $kill_no = $sum_kill_no[0]['SUM(kill_no)'];
                            //print($kill_no);
                            echo '<tr> <th>'. $kill_sub_type . '</th> <td>'. $kill_no . '</td> </tr>';
                            $total_building_kills += $kill_no;
                               }

                            }
                            ?>
					<tr>
						<th>Total</th>
						<td><?php echo $total_building_kills; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="columns-row">
		<div class="column two-thirds hover_img">
        <h2 id='traps'>LSO GRADES (Last 10) </h2>
			<table class="stats">
				<thead>
					<tr>
						<th class='align-left'>
							Airframe
                        </th>
                        <th>
                        Grade 
                        </th>
						<th>
							Wire
                        </th>
                        <th>
                        <a href="#">Comment<span><img src="images/LSO Grade Cheat Sheet.png" alt="image" height="1000" /></span></a>
                        </th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                        // TRAP STATS GO HERE 
                        foreach ($lso_grades as $key => $value) {
							$pairframe = str_replace("_", " ", $value['airframe']);
							$pairframe = ucwords($pairframe);
                            echo '<tr> <td class="traps">'. $pairframe . '</td> <td class="traps">'. $value['grade'] . '</td><td class="traps">'. $value['wire'] . '</td> <td class="traps">'. $value['comment'] . '</td> <td class="traps">'. $value['date'] . '</td> </tr>';
                        }
                    ?>
				</tbody>
			</table>
		</div>
		<div class="column third right">
			<h2 id='employment'>
				Weapon Employement
			</h2>
			<table class="stats">
				<thead>
					<tr>
						<th class='align-left'>
							weapon
						</th>
						<th>
							Shots
                        </th>
                        <th>
                        Hits 
                        </th>
						<th>
							Kills
						</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                        // WEAPON STATS GO HERE 
                        foreach ($weapon_stats as $key => $value) {
                            //print_r($value);
                            $weapon_type = $value['weapon'];
                            //print($weapon_type);
                            $numHits = get_weapon_sum('numHits', $playerid, $weapon_type, $con);
                            $numHits = $numHits[0]['SUM(numHits)'];
                            $shot = get_weapon_sum('shot', $playerid, $weapon_type, $con);
                            $shot = $shot[0]['SUM(shot)'];
                            $kills = get_weapon_sum('kills', $playerid, $weapon_type, $con);
                            $kills = $kills[0]['SUM(kills)'];
                            echo '<tr> <td>'. $weapon_type . '</td> <td class="weapons">'. $shot . '</td> <td class="weapons">'. $numHits . '</td> <td class="weapons">'. $kills . '</td> </tr>';
                        }
                    ?>
				</tbody>
			</table>
		</div>
    </div>

</div>
			</section>
			<footer id="page-footer">

			</footer>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script>
			$(function() {
				$('body').addClass('loaded');
				$('.submit-on-change').change(function(event) {
					$(this).submit();
				});
			});
		</script>
	</body>
</html>