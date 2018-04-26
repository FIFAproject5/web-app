<?php

require("databaseconnector.php");

if (isset($_POST['delete'])){
    $name = $_POST['delete'];
    $deletequery = "DELETE FROM `tbl_teams` WHERE `name`= '$name'";
    $database->query($deletequery);
}
header("Location:../public/invoer-teams.php");