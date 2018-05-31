<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Invoer Resultaten</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
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
