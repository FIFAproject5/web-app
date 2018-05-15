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
    <style>

        .slideshow-container {
            max-width: 80%;
            position: relative;
            margin: auto;
            height: 900px;
        }

        .mySlides {
            max-width: 100%;
            height:500px;
        }




        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px 10px;
            color: white;
            background-color: #000;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        .main-grid{
            grid-template-rows: 493px 243px;
        }

    </style>


</head>
<body>
<div class="slideshow-container">



    <div class="mySlides fade">
        <header>
            <h1>FIFA Dev Edition</h1>
            <p>Invoer Wedstrijd</p>
        </header>
        <div class="main-grid">
            <div class="input-results">
                <h2 class="input-result-tile-title">Invoer Wedstrijd</h2>
                <div class="input-results-container">
                    <div class="input-results-teams">
                        <select name="Team" id="">
                            <option value="Selecteer Team">Team 1</option>
                        </select>
                        <p>-</p>
                        <select name="Team" id="">
                            <option value="Selecteer Team">Team 1</option>
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
                                <option value="Selecteer scoorder">Team 2</option>
                            </select>
                            <input type="submit" value="Add">
                        </div>
                        <div>
                            <input type="submit" value="Add">
                            <select name="" id="scorer">
                                <option value="">Team 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-results-submit-score">
                        <ul>
                            <li>test</li>
                            <li>test</li>
                            <li>test</li>
                        </ul>
                        <input type="submit">
                    </div>
                </div>
            </div>
            <div class="poule">
                <h2>Poulestanden</h2>
                <?php
                require("../app/databaseConnector.php");

                $sql = "SELECT * FROM `tbl_teams` ORDER BY `created_at` DESC";
                $statement = $database->query($sql);

                $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach ($results as $result){

                }




                ?>
                <hr>
            </div>
            <div class="time-schedule">
                <h2>Tijdsschema</h2>
            </div>
        </div>
    </div>
    <div class="mySlides fade">
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
    <div class="mySlides">
        <header>
            <h1>FIFA Dev Edition</h1>
            <p>Invoer resultaten</p>
        </header>
        <div class="main-grid">
            <div class="results">

            </div>
            <div class="poule">
                <h2>Poulestanden</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, eum, obcaecati. Laboriosam dolorem in veritatis nemo enim odit repellat, aut id eius sequi nesciunt asperiores quam unde impedit non, ab.</p>
                <hr>
            </div>
            <div class="time-schedule">
                <h2>Tijdsschema</h2>
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
