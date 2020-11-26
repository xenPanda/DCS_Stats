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
                <td id="jan" ><a href="traps.php?playerId=<?php echo $playerId ?>&playerName=<?php echo $playerName ;?>&month=1&year=<?php echo $year; ?>"><li class = "gScore-<?php echo $janChip; ?>"></li></a></td>
                <td id="feb" ><a href="traps.php?playerId=<?php echo $playerId ?>&playerName=<?php echo $playerName ;?>&month=2&year=<?php echo $year; ?>"><li class = "gScore-<?php echo $febChip; ?>"></li></a></td>
                <td id="mar" ><a href="traps.php?playerId=<?php echo $playerId ?>&playerName=<?php echo $playerName ;?>&month=3&year=<?php echo $year; ?>"><li class = "gScore-<?php echo $marChip; ?>"></li></a></td>
				<td id="apr" ><a href="traps.php?playerId=<?php echo $playerId ?>&playerName=<?php echo $playerName ;?>&month=4&year=<?php echo $year; ?>"><li class = "gScore-<?php echo $aprChip; ?>"></li></a></td>
                <td id="may" ><a href="traps.php?playerId=<?php echo $playerId ?>&playerName=<?php echo $playerName ;?>&month=5&year=<?php echo $year; ?>"><li class = "gScore-<?php echo $mayChip; ?>"></li></a></td>
                <td id="jun" ><a href="traps.php?playerId=<?php echo $playerId ?>&playerName=<?php echo $playerName ;?>&month=6&year=<?php echo $year; ?>"><li class = "gScore-<?php echo $junChip; ?>"></li></a></td>
                <td id="jul" ><a href="traps.php?playerId=<?php echo $playerId ?>&playerName=<?php echo $playerName ;?>&month=7&year=<?php echo $year; ?>"><li class = "gScore-<?php echo $julChip; ?>"></li></a></td>
                <td id="aug" ><a href="traps.php?playerId=<?php echo $playerId ?>&playerName=<?php echo $playerName ;?>&month=8&year=<?php echo $year; ?>"><li class = "gScore-<?php echo $augChip; ?>"></li></a></td>
				<td id="sep" ><a href="traps.php?playerId=<?php echo $playerId ?>&playerName=<?php echo $playerName ;?>&month=9&year=<?php echo $year; ?>"><li class = "gScore-<?php echo $sepChip; ?>"></li></a></td>
                <td id="oct" ><a href="traps.php?playerId=<?php echo $playerId ?>&playerName=<?php echo $playerName ;?>&month=10&year=<?php echo $year; ?>"><li class = "gScore-<?php echo $octChip; ?>"></li></a></td>
                <td id="nov" ><a href="traps.php?playerId=<?php echo $playerId ?>&playerName=<?php echo $playerName ;?>&month=11&year=<?php echo $year; ?>"><li class = "gScore-<?php echo $novChip; ?>"></li></a></td>
				<td id="dec" ><a href="traps.php?playerId=<?php echo $playerId ?>&playerName=<?php echo $playerName ;?>&month=12&year=<?php echo $year; ?>"><li class = "gScore-<?php echo $decChip; ?>"></li></a></td>
                <td id="avg" ><a href="traps.php?playerId=<?php echo $playerId ?>&playerName=<?php echo $playerName ;?>&month=10&year=<?php echo $year; ?>"><li class = "gScore-<?php echo $avgChip; ?>"></li></a></td>
            </tr>
		<?php	
} //End of Loop
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="js/traps.js"></script>
</body>
</html>