<?php

require("DatabaseConnector.php");

$sql =("INSERT INTO `recepten` (`titel`, `beschrijving`, `ingredienten`) VALUES ('$_POST[recipeTitle]', '$_POST[recipeDescription]', '$_POST[recipeIngredients]')");

$newsql = filter_var($sql);

    $database->query($newsql);

    header("Location:../public/index.php");
