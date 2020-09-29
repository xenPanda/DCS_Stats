
<?php
require_once 'includes.php';

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
	<link rel="stylesheet" type="text/css" media="all" href="css/stats.css">
	</head>
	<body>
<div class="layout-column"><!--Main Layout Div-->
			<header id="page-header">
				<a href="/">CSG-3 Pilot Statistics</a>
			</header>
	  <section id="page-content">
  <div class="content"><!--Content Div-->
    <div id='search'><!--Search-->
      <h2>
    <?php echo "TOP 10 "?>
</h2>
    <form method="get" action="searchPlayers.php">
        <input type="text" name="searchName" placeholder="Search Pilot Name...">
        <input type="submit">
    </form>

    </div><!--Search-->
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
    <?php $stats = get_top10('kill_no', 'Planes', $con); ?>
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
    <?php $stats = get_top10_time($con); ?>
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




        <?php db_close_con($con); ?>
  </section>
    </div><!--Content Div-->
			<footer id="page-footer">

			</footer>
</div><!--Main Layout Div-->
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
