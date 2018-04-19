<?php
require("databaseconnector.php");

if (isset($_POST['createteam'])) {
    $teamname = $_POST['teamname'];
    $sql = "INSERT INTO `tbl_teams` (`name`) VALUES ('$teamname')";
    $database->query($sql);
}

if (isset($_POST['delete'])){
    $name = $_POST['delete'];
    $deletequery = "DELETE FROM `tbl_teams` WHERE `name`= '$name'";
    $database->query($deletequery);
}
header("Location:../public/invoer-teams.php");