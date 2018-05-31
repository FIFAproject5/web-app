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
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container">
    <header>
        <h1>FIFA Dev Edition</h1>
        <p>Invoer resultaten</p>
    </header>
    <div class="main-grid">
        <div class="input-results">
            <h2 class="input-result-tile-title">Invoer Resultaat</h2>
            <div class="input-results-container">
                <div class="input-results-teams">
                    <select name="Team" id="">
                        <?php
                        require("../app/databaseConnector.php");

                        $sql = "SELECT * FROM `tbl_teams`";
                        $statement = $database->query($sql);


                        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($results as $result){
                            echo "<option>"."$result[name]"."</option>";
                        }

                        ?>
                    </select>
                    <p>-</p>
                    <select name="Team" id="">
                        <?php
                        require("../app/databaseConnector.php");

                        $sql = "SELECT * FROM `tbl_teams`";
                        $statement = $database->query($sql);


                        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($results as $result){
                            echo "<option>"."$result[name]"."</option>";
                        }

                        ?>
                    </select>
                </div>
                <div class="input-results-score">
                    <p>4</p>
                    <p>-</p>
                    <p>0</p>
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
                        <input type="submit" value="Add">
                    </div>
                    <div>
                        <input type="submit" value="Add">
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
                    <input type="submit">
                </div>
            </div>
        </div>
        <div class="poule">
            <h2>Poulestanden</h2>
            <?php
            require("../app/databaseConnector.php");

            $sql = "SELECT tbl_matches.id, tbl_matches.score_team_a, tbl_teams.name FROM tbl_matches  
                        INNER JOIN tbl_teams ON tbl_matches.team_id_a=tbl_teams.id";
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

            </div>

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
