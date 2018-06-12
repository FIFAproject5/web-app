<?php
require ("../app/DatabaseConnector.php");

session_start();

if (isset($_POST['score-team-a'])){
    $_SESSION['player-score-a']++;
    header("Location:../public/main.php");
}

if (isset($_POST['score-team-b'])){
    $_SESSION['player-score-b']++;
    header("Location:../public/main.php");
}

if (isset($_POST['reset-score'])){
    $_SESSION['player-score-a']=0;
    $_SESSION['player-score-b']=0;

    header("Location:../public/main.php");
}

if (isset($_POST['team-a-select'])){
    $selectedteama = $_POST['team-a'];
    $_SESSION[$selectedteama];
    header("Location:../public/main.php");
}

if (isset($_POST['team-b-select'])){
    $selectedteamb = $_POST['team-b'];
    $_SESSION[$selectedteamb];
    header("Location:../public/main.php");
}


if (isset($_POST['send-score'])){
    $scorea=$_SESSION['player-score-a'];
    $scoreb=$_SESSION['player-score-b'];

    $sql = "SELECT `id` FROM `tbl_teams` WHERE `name` = {$_POST['team-a']}'";

    $statement = $database->query($sql);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    var_dump($results['id']);

    header("Location:../public/main.php");
}