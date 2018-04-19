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
    <form action="../app/team_creator.php" method="post" class="team-creator-container">
        <div class="team-creator-flex">
            <div class="team-name">
                <h3>1</h3>
                <label for="team-name">Naam Team</label>
                <input type="text" id="teamname" name="teamname">

                <h3>Teams bekijken</h3>
                <ul>
                    <?php
                    require("../app/databaseConnector.php");

                    $sql = "SELECT * FROM `tbl_teams` ORDER BY `created_at` DESC";
                    $statement = $database->query($sql);

                    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($results as $result){
                        echo '<li>'.$result['name'].'</li>'.
                            '<button type="submit" name="delete" value="'. $result['name'] .'">Delete</button>';
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
                            echo "<option>" . $result["first_name"] . " " . $result["last_name"] . "</option>>";
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
    </form>
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
