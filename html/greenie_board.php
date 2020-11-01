<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>vCSG-3 Greenie Board</title>
        <!-- Bootstrap core CSS -->
       <!--<link href="http://demos.codexworld.com/includes/css/bootstrap.css" rel="stylesheet"> -->
        <!-- Add custom CSS here -->
        <link href="https://demos.codexworld.com/includes/css/style.css" rel="stylesheet">
		
		<link href="css/mystyle.css" rel="stylesheet">

        <style type="text/css">
    
        </style>
</head>
<body>
<?php
require_once 'includes.php';
$year = date("Y"); 
?>

<div class="demo-title"><h4>vCSG-3 Greenie Board</h4></div>
        <div class="container">

    <div class="row">
        <div class="col-lg-12">
                        <div class="panel panel-default">
                <div class="panel-heading">
                   <select id="year" name="year" title="Select year to show!" >
                       <option <?php echo "value = " . $year;?>><?php echo $year;?></option>
                   </select> Carrier Landing LSO Grades
                    
                </div>
                <div class="panel-body">


    <!-- Data list table --> 
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Jan</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Apr</th>
				<th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Aug</th>
                <th>Sep</th>
				<th>Oct</th>
                <th>Nov</th>
                <th>Dec</th>
                <th>AVG</th>
            </tr>
        </thead>
        <tbody>
<?php

$traps = get_traps_byPlayerName($con, $year);
foreach( $traps as $trap){
    $playerName = $trap['playername'];
    $playerId = $trap['id'];
    $janAvg = get_ptsAvg_byMonth($con, $playerId, 1, $year);
    $febAvg = get_ptsAvg_byMonth($con, $playerId, 2, $year);
    $marAvg = get_ptsAvg_byMonth($con, $playerId, 3, $year);
    $aprAvg = get_ptsAvg_byMonth($con, $playerId, 4, $year);
    $mayAvg = get_ptsAvg_byMonth($con, $playerId, 5, $year);
    $junAvg = get_ptsAvg_byMonth($con, $playerId, 6, $year);
    $julAvg = get_ptsAvg_byMonth($con, $playerId, 7, $year);
    $augAvg = get_ptsAvg_byMonth($con, $playerId, 8, $year);
    $sepAvg = get_ptsAvg_byMonth($con, $playerId, 9, $year);
    $octAvg = get_ptsAvg_byMonth($con, $playerId, 10, $year);
    $novAvg = get_ptsAvg_byMonth($con, $playerId, 11, $year);
    $decAvg = get_ptsAvg_byMonth($con, $playerId, 12, $year);
    $janChip = floor($janAvg[0]['pts']);
    $febChip = floor($febAvg[0]['pts']);
    $marChip = floor($marAvg[0]['pts']);
    $aprChip = floor($aprAvg[0]['pts']);
    $mayChip = floor($mayAvg[0]['pts']);
    $junChip = floor($junAvg[0]['pts']);
    $julChip = floor($julAvg[0]['pts']);
    $augChip = floor($augAvg[0]['pts']);
    $sepChip = floor($sepAvg[0]['pts']);
    $octChip = floor($octAvg[0]['pts']);
    $novChip = floor($novAvg[0]['pts']);
    $decChip = floor($decAvg[0]['pts']);
?>			
		 <tr>
                <td id="name"><?php echo $playerName ; ?></td>
                <td id="jan" class = "gScore-<?php echo $janChip; ?>"><div style="height:25px;"></div></td>
                <td id="feb" class = "gScore-<?php echo $febChip; ?>"></td>
                <td id="mar" class = "gScore-<?php echo $marChip; ?>"></td>
				<td id="apr" class = "gScore-<?php echo $aprChip; ?>"></td>
                <td id="may" class = "gScore-<?php echo $mayChip; ?>"></td>
                <td id="jun" class = "gScore-<?php echo $junChip; ?>"></td>
                <td id="jul" class = "gScore-<?php echo $julChip; ?>"></td>
                <td id="aug" class = "gScore-<?php echo $augChip; ?>"></td>
				<td id="sep" class = "gScore-<?php echo $sepChip; ?>"></td>
                <td id="oct" class = "gScore-<?php echo $octChip; ?>"></td>
                <td id="nov" class = "gScore-<?php echo $novChip; ?>"></td>
				<td id="dec" class = "gScore-<?php echo $decChip; ?>"></td>
                <td id="avg" class = "gScore-<?php echo $avgChip; ?>"></td>
            </tr>
		<?php	
} //End of Loop
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="js/traps.js"></script>
</body>
</html>