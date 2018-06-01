<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fifa Dev edition</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
<div class="slideshow-container">
    <div class="mySlides fade">
        <?php
        session_start();
        ?>
        <div class="container">
            <header>
                <h1>FIFA Dev Edition</h1>
                <p>Invoer </p>
            </header>
            <div class="main-grid">
                <div class="input-results">
                    <h2 class="input-result-tile-title">Invoer Resultaat</h2>
                    <form method="post" action="../app/score.php">
                        <div class="input-results-container">
                            <div class="input-results-teams">
                                <select name="team-a" id="">
                                    <?php
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

                                    ?>
                                </select>
                                <p>-</p>
                                <select name="team-b" id="">
                                    <?php
                                    require("../app/databaseConnector.php");

                                    $sql1 = "SELECT m.id, m.start_time ,t1.name AS team1, t2.name AS team2 
                         FROM tbl_matches AS m 
                         LEFT JOIN tbl_teams  t1 ON m.team_id_a=t1.id
                         LEFT JOIN tbl_teams t2 ON m.team_id_b=t2.id";
                                    $statement = $database->query($sql1);


                                    $results = $statement->fetchAll(PDO::FETCH_ASSOC);



                                    foreach ($results as $result){
                                        echo "<option name='team-b'>" . "$result[team2]" . "</option>";
                                    }
                                    echo "<input type='submit' name='team-b-select' value='selecteer team b'>";

                                    ?>
                                </select>
                            </div>
                            <div class="input-results-score">
                                <?php
                                echo "<p>".$_SESSION["player-score-a"]."</p>";
                                echo "<p>-</p>";
                                echo "<p>".$_SESSION["player-score-b"]."</p>";
                                ?>
                            </div>
                            <div class="input-results-scorers">
                                <div>
                                    <select name="" id="">
                                        <?php
                                        require("../app/databaseConnector.php");

                                        $sql = "SELECT * FROM `tbl_players`";
                                        $statement = $database->query($sql);


                                        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($results as $result){
                                            echo "<option>"."$result[first_name]"." "."$result[last_name]"."</option>";
                                        }

                                        ?>
                                    </select>
                                    <input type="submit" value="Add" name="score-team-a">
                                </div>
                                <div>
                                    <input type="submit" value="Add" name="score-team-b">
                                    <select name="" id="scorer">
                                        <?php
                                        require("../app/databaseConnector.php");

                                        $sql = "SELECT * FROM `tbl_players`";
                                        $statement = $database->query($sql);


                                        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($results as $result){
                                            echo "<option>"."$result[first_name]"." "."$result[last_name]"."</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="input-results-submit-score">
                                <input type="submit" value="verzend score" name="send-score">
                                <input type="submit" value="reset" name="reset-score">
                            </div>
                    </form>
                </div>
            </div>
            <div class="poule">
                <h2>Poulestanden</h2>
                <?php
                require("../app/databaseConnector.php");

                $sql = "SELECT tbl_matches.id, tbl_matches.score_team_a, tbl_teams.name FROM tbl_matches INNER JOIN tbl_teams ON tbl_matches.team_id_a=tbl_teams.id";
                $statement = $database->query($sql);


                $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                echo "<ul>";
                foreach ($results as $result){
                    echo "<li>".$result["name"].""."</li>";
                }
                echo "</ul>";


                ?>
                <hr>
            </div>
            <div class="time-schedule">
                <h2>Tijdsschema</h2>
                <div>
                    <h3>Team 1</h3>
                    <?php
                    require("../app/databaseConnector.php");

                    $sql = "SELECT t1.name as team_id_a , t2.name as team_id_b , start_time
                    FROM tbl_matches AS c
                    LEFT JOIN tbl_teams t1 ON c.team_id_a = t1.id
                    LEFT JOIN tbl_teams t2 on c.team_id_b = t2.id";
                    $statement = $database->query($sql);


                    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                    echo "<div class='time-grid'>";
                    foreach ($results as $result){
                        echo "<div class='time-grid-item'>"."<div>".$result['team_id_a']."</div>"."<div>".$result['team_id_b']."</div>"."<div>" .$result['start_time']."</div>"."</div>";

                    }
                    echo "</div>";

                    ?>
                </div>

            </div>
        </div>
    </div>
    </div>
    <div class="mySlides fade">
        <div class="container">
            <header>
                <h1>FIFA Dev Edition</h1>
                <p>Invoer resultaten</p>
            </header>
            <div class="main-grid">
                <div class="results">
                    <?php

                    require("../app/databaseConnector.php");


                    $sql = "SELECT t1.name as team_id_a , t2.name as team_id_b , score_team_a , score_team_b
                    FROM tbl_matches AS c
                    LEFT JOIN tbl_teams t1 ON c.team_id_a = t1.id
                    LEFT JOIN tbl_teams t2 on c.team_id_b = t2.id";

                    $statement = $database->query($sql);
                    $results = $statement->fetchAll();

                    echo "<div class='results-flex'>";
                    foreach ($results as $result) {
                        if ( $result["score_team_a"] > -1){

                            echo "<div class='results-flex-item'>";
                            echo "<div>";
                            echo $result["team_id_a"];
                            echo "</div>";

                            echo "<div>";
                            echo $result["score_team_a"];
                            echo "-";
                            echo $result["score_team_b"];
                            echo "</div>";

                            echo "<div>";
                            echo $result["team_id_b"];
                            echo "</div>";
                            echo "</div>";
                        }

                    }


                    echo "</div>";

                    ?>
                </div>
                <div class="poule">
                    <h2>Poulestanden</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, eum, obcaecati. Laboriosam dolorem in veritatis nemo enim odit repellat, aut id eius sequi nesciunt asperiores quam unde impedit non, ab.</p>
                    <hr>
                </div>
                <div class="time-schedule">
                    <h2>Tijdsschema</h2>
                    <?php
                    require("../app/databaseConnector.php");

                    $sql = "SELECT t1.name as team_id_a , t2.name as team_id_b , start_time
                    FROM tbl_matches AS c
                    LEFT JOIN tbl_teams t1 ON c.team_id_a = t1.id
                    LEFT JOIN tbl_teams t2 on c.team_id_b = t2.id";
                    $statement = $database->query($sql);


                    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                    echo "<div class='time-grid'>";
                    foreach ($results as $result){
                        echo "<div class='time-grid-item'>"."<div>".$result['team_id_a']."</div>"."<div>".$result['team_id_b']."</div>"."<div>" .$result['start_time']."</div>"."</div>";

                    }
                    echo "</div>";

                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="mySlides">
        <div class="container">
            <header>
                <h1>FIFA Dev Edition</h1>
                <p>Invoer teams en spelers</p>
            </header>
            <form action="../app/team_creator.php" method="post" class="team-creator-container">
                <div class="team-creator-flex">
                    <div class="team-name">
                        <h3>1</h3>
                        <label for="team-name">Naam Team</label>
                        <input type="text" id="teamname" name="teamname">

                        <h3>Teams bekijken</h3>
                        <ul class="team-player-list">
                            <?php
                            require("../app/databaseConnector.php");

                            $sql = "SELECT * FROM `tbl_teams` ORDER BY `created_at` DESC";
                            $statement = $database->query($sql);

                            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($results as $result){
                                echo '<li>'.'<div>'.$result['name'].'<form method="post" action="../app/delete.php">'.'<button type="submit" name="delete" value="'. $result['name'].'">X</button>'.'</div>'.'</li>'.'</form>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="select-player">
                        <h3>2</h3>
                        <div class="select-player-flex">
                            <?php
                            require("../app/databaseConnector.php");

                            $sql = "SELECT * FROM `tbl_players` ORDER BY `id` DESC";
                            $statement = $database->query($sql);

                            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                            for ($i =1; $i< 7; $i++){
                                echo '<p>'."Selecteer speler".' '.$i.'</p>';
                                echo '<select name="team-creator" id="team-creator">';
                                echo '<option value="" disabled selected>Select een speler</option>';
                                foreach ($results as $result) {
                                    echo "<option>"
                                        . $result["first_name"] . " "
                                        . $result["last_name"] . "</option>";
                                }
                                echo "</select>";
                            }

                            ?>
                        </div>
                    </div>
                    <div class="submit-team">
                        <h3>3</h3>
                        <input type="submit" name="createteam">
                    </div>
                </div>
        </div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>


<script src="slideshow.js"></script>
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
    ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>
