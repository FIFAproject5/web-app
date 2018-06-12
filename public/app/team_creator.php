<?php
require ("../app/DatabaseConnector.php");

if (isset($_POST['createteam'])) {
    $teamname = $_POST['teamname'];
    $sql = "INSERT INTO `tbl_teams` (`name`) VALUES ('$teamname')";
    $database->query($sql);
//    fore players


}

if (isset($_POST['delete'])){
    $name = $_POST['delete'];
    $deletequery = "DELETE FROM `tbl_teams` WHERE `name`= '$name'";
    $database->query($deletequery);
}

$selectplayers= $_POST["team-creator"];

var_dump($selectplayers);

header("Location:../public/main.php");