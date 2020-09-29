<?php
require_once 'includes.php';

$searchName = $_GET['searchName'];

//echo "Your search name is: ".$searchName.".";

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
    <?php echo "SEARCH RESULTS "?>
</h2>
    <form method="get" action="searchPlayers.php">
        <input type="text" name="searchName" placeholder="Search Pilot Name...">
        <input type="submit">
    </form>
    </div><!--Search-->
    <div class="columns-row"> 
            <div >
              <table class='stats'>
                <thead>
                  <tr>
                    <th></th>
                    <th class="aleft">Player</th>
                    <th class="aleft">A2A Kills</th>
                    <th class="aleft">Total Server Time</th>
                    <th></th>
                    </tr>
                </thead>

                    <?php $players = get_search_results($searchName, $con); ?>
                    <?php foreach ($players as $player){ 
                    $playerid = $player['id'];
                    $playername = $player['playername'];
                    $column_total_time = 'total_time';
                    $total_time = get_column_sum($column_total_time, $playerid, $con);
                    $total_time = convert_time($total_time[0]['SUM(total_time)']) ; 
                    //$column_total_air_kills = 'total_air_kills';
                    //$total_air_kills = get_column_sum($column_total_air_kills, $playerid, $con);
                    //$total_air_kills = $total_air_kills[0]['SUM(total_air_kills)'] ;
                    $total_a2a_kills = get_kills_total('kill_no', $playerid, 'Planes', $con);
                    //print_r($total_a2a_kills);
                    if (is_null($total_a2a_kills[0]['SUM(kill_no)']))
                {
                   $total_air_kills = 0;
                } else {
                    $total_air_kills = $total_a2a_kills[0]['SUM(kill_no)'];
                }
                    ?>
                    <tr>
                <td style="width:25%;"></td>
                <td> <a href="playerStats.php?playerid=<?php echo htmlspecialchars($playerid) ?>"><?php echo htmlspecialchars($playername);?> </a></td>
                <td> <?php echo htmlspecialchars($total_air_kills);?></td>
                <td> <?php echo htmlspecialchars($total_time);?></td> 
                <td style="width:25%;"></td>
                </tr>
                <?php } ?> <!--END FOR LOOP -->
                </table>
          </div>
    </div>

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