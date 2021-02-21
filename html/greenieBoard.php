<?php
require_once 'includes.php';
$year = date("Y"); 
$squad = '%';
$server = '%';
?>
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
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <style type="text/css">
    
        </style>
</head>
<body>


<div class="demo-title"><h4>vCSG-3 Greenie Board</h4></div>
        <div class="container">

    <div class="row">
        <div class="col-lg-12">
                        <div class="panel panel-default">                          
                <div class="panel-heading">
                    <form action="trap_data.php" method="get" id="filter">
                    <select id="year" name="year" title="Select year to show!" ></select>
                    <select id="squad" name="squad" title="Select your squad!" ></select>
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
                <div id="display_table" class="panel-body">

</div>
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
    var year = (new Date).getFullYear();
    $.ajax({
        url: "trap_data.php",
        type: "GET",
        data: $('#form').serialize() + '&year=' + year + '&squad=%' + '&server=%'
       }).done(function(response) { //
            $("#display_table").html(response);
        });
    });

$('#year').each(function() {
    var year = (new Date()).getFullYear();
    var current = year;
    year -= 2;
    for (var i = 0; i < 3; i++) {
        if ((year+i) == current)
            $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
        else
            $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
}
});

$('#squad').each(function() {
    $(this).append('<option selected value="%">All</option>');
    $(this).append('<option value="%1__">Jolly Rodgers</option>');
    $(this).append('<option value="%2__">Top Hatters</option>');
    $(this).append('<option value="%3__">Sidewinders</option>');
    $(this).append('<option value="%4__">Fighting Bengals</option>');
});

</script>

</body>
</html>