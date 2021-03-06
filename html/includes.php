<!--
  DCS_Stats - DCS stats collection via Slmod and insert into MySql DB

  Author: Chris Barilla (Panda)
  Date:   09/05/2020

  Filename: includes.php
  Version: 0.0.1
-->
<?php
require_once 'db_connector.php';


  function get_top10($column, $kill_type, $con ) {

    $sql = "SELECT SUM($column) as a2a_kills, playerid, airframe FROM kills WHERE kill_type = '$kill_type' GROUP By playerid ORDER BY a2a_kills DESC LIMIT 10";
    $result = mysqli_query($con, $sql);
    
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

        return $row; 
           
}

  function get_top10_time($con){

    $sql = "SELECT airframe, playerid, air_time FROM airframe_stats ORDER BY air_time DESC LIMIT 10";
    $result = mysqli_query($con, $sql);
    
    $stats = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    //mysqli_close($con);
    return $stats;
  
  }
  
  function get_playername($playerid,$con){
  
    $sql = "SELECT playername FROM players WHERE id = '$playerid'";
    $result = mysqli_query($con, $sql);
    
    $playername = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    //mysqli_close($con);
    return $playername;
  
  }

  function get_search_results($searchName, $con) {

    $sql = "SELECT playername, id FROM players WHERE playername LIKE '%{$searchName}%'";
    $result = mysqli_query($con, $sql);
    
    $searchResults = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $searchResults;
  
    }

    function get_player_stats($playerid, $con) {

        $sql = "SELECT * FROM airframe_stats WHERE playerid = '$playerid'";
        $result = mysqli_query($con, $sql);
        
        $player_stats = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $player_stats;
      
    }

    function get_column_sum($column, $playerid, $con ) {

        $sql = "SELECT SUM($column) FROM airframe_stats WHERE playerid = '$playerid'";
        $result = mysqli_query($con, $sql);
        
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
          
        return $row;        
    }

    function get_player_airframes($playerid, $con) {

        $sql = "SELECT airframe, total_time, air_time FROM airframe_stats WHERE playerid = '$playerid'";
        $result = mysqli_query($con, $sql);
        
        $player_airframes = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $player_airframes;
      
    }

    function convert_time($time) {
        
        $hours = floor($time / 3600);
        $minutes = floor(($time / 60) % 60);
        $seconds = $time % 60;

        #$time = $hours.':'.$minutes.':'.$seconds;
        $time = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
        return $time;
    }


    function get_player_weapon_stats($playerid, $con) {

        $sql = "SELECT weapon, hit, shot, kills FROM weapons WHERE playerid = '$playerid'";
        $result = mysqli_query($con, $sql);
        
        $weapon_stats = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $weapon_stats;
      
    }

    function get_weapon_sum($column, $playerid, $weapon_type, $con ) {

        $sql = "SELECT SUM($column) FROM weapons WHERE playerid = '$playerid' AND weapon = '$weapon_type'";
        $result = mysqli_query($con, $sql);
        
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
          
        return $row;        
    }

    function get_kill_stats($playerid, $con) {

        $sql = "SELECT kill_type, kill_sub_type FROM kills WHERE playerid = '$playerid'";
        $result = mysqli_query($con, $sql);
        
        $kills = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $kills;
      
    }

    function get_kill_sum($column, $playerid, $kill_type, $kill_sub_type, $con ) {

        $sql = "SELECT SUM($column) FROM kills WHERE playerid = '$playerid' AND kill_sub_type = '$kill_sub_type'";
        $result = mysqli_query($con, $sql);
        
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
          
        return $row;        
    }

    function get_kills_total($column, $playerid, $kill_type, $con ) {

        $sql = "SELECT SUM($column) FROM kills WHERE playerid = '$playerid' AND kill_type = '$kill_type'";
        $result = mysqli_query($con, $sql);
        
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

            return $row; 
               
    }

    function get_pvp_total($column, $playerid, $result_type, $con ) {

        $sql = "SELECT SUM($column) FROM pvp WHERE playerid = '$playerid' AND result = '$result_type'";
        $result = mysqli_query($con, $sql);
        
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

            return $row; 
               
    }

    function get_lso_grades($playerid, $con) {

        $sql = "SELECT * FROM traps WHERE playerid = '$playerid' ORDER BY trap_no DESC LIMIT 10";
        $result = mysqli_query($con, $sql);
        
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $row;
      
    }

?>
