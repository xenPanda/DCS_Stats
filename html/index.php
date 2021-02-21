
<?php

require_once 'includes.php';
$server = '%';
?>

<!DOCTYPE HTML>

<html lang="en">

	<head>
<title>CSG-3 Stats</title>
	<link rel="stylesheet" type="text/css" media="all" href="css/stats.css">

	<link rel="icon" 

      type="image/png" 

      href="images/favicon.ico">

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
<div class="panel-heading">
                    <form action="top10.php" method="get" id="filter">
                    <select id="server" name="server" title="Select your server!" >
                    <option selected value="%">All</option>
                    <?php
                    $servers = get_servers($con);
                    print_r($servers);
                    foreach($servers as $server){
                        $serverid = $server['serverid'];
                        echo "<option value = " . $serverid . ">" . $serverid . "</option>";
                    }
                    ?>
                    </select>
                    <button type="submit">Submit</button>
                </form>
                </div>

    <form method="get" action="searchPlayers.php">

        <input type="text" name="searchName" placeholder="Search Pilot Name...">

        <input type="submit">

    </form>



    </div><!--Search-->

    <div id="display_table" class="panel-body">

</div>

        <?php db_close_con($con); ?>

  </section>

    </div><!--Content Div-->

			<footer id="page-footer">



			</footer>

</div><!--Main Layout Div-->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

		<script>

$("#filter").submit(function(event) {
  event.preventDefault(); //prevent default action 
  let post_url = $(this).attr("action"); //get form action url
  let request_method = $(this).attr("method"); //get form GET/POST method
  let form_data = $(this).serialize(); //Encode form elements for submission	
    $.ajax({
        url: post_url,
        type: request_method,
        data: form_data
    }).done(function(response) { //
        $("#display_table").html(response);
    });
});
$( document ).ready( function (){
$.ajax({
url: "top10.php",
type: "GET",
data: $('#form').serialize() + '&server=%'
}).done(function(response) { //
    $("#display_table").html(response);
});
});

			$(function() {

				$('body').addClass('loaded');

				$('.submit-on-change').change(function(event) {

					$(this).submit();

				});

			});

		</script>

	</body>

</html>