<?php

$server = $_GET['server'];

require_once 'includes.php';
?>

<div class="columns-row"> 

<div class="column half">

<table class='stats'>

    <thead>

    <tr>

        <th class="aleft">Player</th>

        <th class="aleft">Airframe</th>

        <th class="aleft">A2A Kills</th>

        </tr>

</thead>

<?php $stats = get_top10('kill_no', 'Planes', $con, $server); ?>

<?php //print_r($stats);?>

<?php foreach ($stats as $stat){ 

$playerid = $stat['playerid'];

//print($playerid);

$playername = get_playername($playerid,$con);

$playername = $playername[0]['playername'];

$airframe = str_replace("_", " ", $stat['airframe']);

$airframe = ucwords($airframe);

?>

<tr>



<td> <a href="playerStats.php?playerid=<?php echo htmlspecialchars($playerid) ?>"><?php echo htmlspecialchars($playername);?> </a></td>

<td> <?php echo $airframe;?></td>

<td> <?php echo htmlspecialchars($stat['a2a_kills']);?></td> 

</tr>

<?php } ?> <!--END FOR LOOP -->

</table>

</div>

<div class="column half">

<table class='stats'>

    <thead>

    <tr>

        <th class="aleft">Player</th>

        <th class="aleft">Airframe</th>

        <th class="aleft">Air Time</th>

        </tr>

</thead>

<?php $stats = get_top10_time($con, $server); ?>

<?php foreach ($stats as $stat){ 

$playerid = $stat['playerid'];

//print($playerid);

$playername = get_playername($playerid,$con);

$playername = $playername[0]['playername'];

$airframe = str_replace("_", " ", $stat['airframe']);

$airframe = ucwords($airframe);

?>

<tr>



<td> <a href="playerStats.php?playerid=<?php echo htmlspecialchars($playerid) ?>"><?php echo htmlspecialchars($playername);?> </a></td>

<td> <?php echo $airframe;?></td>

<td> <?php echo convert_time($stat['air_time']);?></td> 

</tr>

<?php } ?> <!--END FOR LOOP -->

</table>



</div>

</div><!--Column-row-->