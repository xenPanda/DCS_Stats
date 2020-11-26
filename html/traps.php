
<!--
DCS_Stats - DCS stats collection via Slmod and insert into MySql DB

Author: Chris Barilla (Panda)
Date:   11/01/2020

Filename: traps.php
Version: 0.0.3
-->
<?php
require_once 'includes.php';
$playerId = $_GET['playerId'];
$playerName = $_GET['playerName'];
$month = $_GET['month'];
$year = $_GET['year'];
$dateObj   = DateTime::createFromFormat('!m', $month);
$monthName = $dateObj->format('F'); 
$lso_grades = get_lso_gradesByMonth($playerId, $month, $con);
// echo $playerId . "<br />";
// echo $playerName . "<br />";
// echo $month . "<br />";
// echo $year;
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo $playerName;?> - Traps</title>
        <!-- Bootstrap core CSS -->
       <!--<link href="http://demos.codexworld.com/includes/css/bootstrap.css" rel="stylesheet"> -->
        <!-- Add custom CSS here -->
        <link href="https://demos.codexworld.com/includes/css/style.css" rel="stylesheet">
		
		<link href="css/mystyle.css" rel="stylesheet">

        <style type="text/css">
    
        </style>
</head>
<div class="demo-title"><h4><?php echo $playerName ;?><br />Traps For <?php echo $monthName ;?> <?php echo $year;?></h4></div>
        <div class="container">

    <div class="row">
        <div class="col-lg-12">
                        <div class="panel panel-default">
                <div class="panel-heading">
                <?php //echo $playerName ;?>

                </div>
                <div class="panel-body">
                <table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>
						Airframe
                        </th>
                        <th>
                        Grade 
                        </th>
						<th>
						Wire
                        </th>
                        <th>
                        Comment
                        </th>
						<th>
                        Date
                    </th>
					</tr>
				</thead>
				<tbody>
                <?php 
                        // TRAP STATS GO HERE 
                        foreach ($lso_grades as $key => $value) {
							$pairframe = str_replace("_", " ", $value['airframe']);
							$pairframe = ucwords($pairframe);
                            echo '<tr> <td >'. $pairframe . '</td> <td class="td-center">'. $value['grade'] . '</td><td class="td-center">'. $value['wire'] . '</td> <td>'. $value['comment'] . '</td> <td class="td-center">'. $value['date'] . '</td> </tr>';
                        }
                    ?>
				</tbody>
			</table>
</div>
<body>

