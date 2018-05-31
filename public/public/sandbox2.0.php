<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
require("../app/databaseConnector.php");

$sql1 = "SELECT m.id, m.start_time ,t1.name AS team1, t2.name AS team2 
                         FROM tbl_matches AS m 
                         LEFT JOIN tbl_teams  t1 ON m.team_id_a=t1.id
                         LEFT JOIN tbl_teams t2 ON m.team_id_b=t2.id";
$statement = $database->query($sql1);


$results = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "<ul>";
foreach ($results as $result){
                    echo "<li>".$result["team1"].""."</li>";
}
echo "</ul>";
echo "<select name='team-a' id=''>";

                        require("../app/databaseConnector.php");

$sql1 = "SELECT m.id, m.start_time ,t1.name AS team1, t2.name AS team2 
                         FROM tbl_matches AS m 
                         LEFT JOIN tbl_teams  t1 ON m.team_id_a=t1.id
                         LEFT JOIN tbl_teams t2 ON m.team_id_b=t2.id";
$statement = $database->query($sql1);


                        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($results as $result){
                            echo "<option name='team-a'>"."$result[team1]"."</option>";
                        }
                        echo "<input type='submit' name='team-a-select' value='selecteer team a'>";

echo "</select>";


?>
<?php
require("../app/databaseConnector.php");

$sql1 = "SELECT m.id, m.start_time ,t1.name AS team1, t2.name AS team2 
                         FROM tbl_matches AS m 
                         LEFT JOIN tbl_teams  t1 ON m.team_id_a=t1.id
                         LEFT JOIN tbl_teams t2 ON m.team_id_b=t2.id";
$statement = $database->query($sql1);


$results = $statement->fetchAll(PDO::FETCH_ASSOC);

$selected_a = true;

if($selected_a==true){
    if (isset($_POST['team-b-select'])){
        $selected_a = false;
    }
    foreach ($results as $result){
        echo "<option name='team-b'>" . "$result[team2]" . "</option>";
    }
}elseif($selected_a == false){
    echo $_SESSION['team-b'];
    echo "TEEEST";
}
echo "<input type='submit' name='team-b-select' value='selecteer team b'>";

?>
</body>
</html>