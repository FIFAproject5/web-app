<?php

require("databaseconnector.php");

if (isset($_POST['delete'])){
    $deletequery = "DELETE FROM `tbl_teams`";
    $database->query($deletequery);
}