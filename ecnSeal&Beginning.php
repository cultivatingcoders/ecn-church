<!DOCTYPE html>
<html>
<head>
    <?php require_once("lib/head-utils.php"); ?>
    <?php require_once("indexNavBar.php"); ?>
    <link href='https://fonts.googleapis.com/css?family=Crimson+Text:600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet">
    <title>History</title>

    <!-- Custom styles for this template -->

    <style>
        body {
            background-image: url("/lib/img/historyAndBeliefs.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            text-align: center;
            font-family: 'Pontano Sans', sans-serif;
        }

        #logoImage {
            width: 100%;
            height: 350px;
            padding-top: 75px;
            text-align: center;
        }

        p {
            color: white;
            text-align: center;
            font-size: 18px;
            padding-bottom: 35px;
        }

        ul {
            font-size: 18px;
            text-align: left;
            padding-left: 90px;
        }

        #bg {
            background-position: center top;
            padding: 200px 90px 20px 90px;
        }

        #search-container {
            position: center;
        }


        #search-bg {
            /* Absolutely position it, but stretch it to all four corners, then put it just behind #search's z-index */
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 99;

            /* Pull the background 70px higher to the same place as #bg's */
            background-position: center -70px;

            -webkit-filter: blur(10px);

        }

        #search {
            /* Put this on top of the blurred layer */
            position: relative;
            z-index: 100;
            padding: 20px;
            border-radius: 20px;

            background: rgba(43, 43, 43, 0.76);
            color: white;
        }

        @media (max-width: 600px ) {
            #bg { padding: 10px; }
            #search-bg { background-position: center -10px; }
        }

        #search h2, #search h5, #search h5 a { text-align: center; color: #fefefe; font-weight: normal; }
        #search h2 { margin-bottom: 50px }
        #search h5 { margin-top: 70px }


        * {margin: 0; padding: 0;}


    </style>
</head>
<body>


<div id="logoImage" class="container" >
    <img src="/lib/img/episcopalchurchinnavajolandlogo_480.png" alt="">
</div>


<div id="bg">
    <div id="search-container">
        <div id="search-bg"></div>
        <div id="search">


            <h1>About the ECN Seal</h1>
                <ul>
                    <li>Mount Blanca (Tsisnaasjini' - Dawn or White Shell Mountain)
                        Sacred Mountain of the East
                        near Alamosa in San Luis Valley, Colorado</li>

                    <li>
                        Mount Taylor (Tsoodzil - Blue Bead or Turquoise Mountain)
                        Sacred Mountain of the South
                        north of Laguna, New Mexico
                    </li>

                    <li>
                        San Francisco Peaks (Doko'oosliid - Abalone Shell Mountain)
                        Sacred Mountain of the West
                        near Flagstaff, Arizona
                    </li>

                    <li>
                        Mount Hesperus Dibé Nitsaa (Big Mountain Sheep) - Obsidian Mountain
                        Sacred Mountain of the North
                        La Plata Mountains, Colorado
                    </li>
                </ul>

                <p>
                    In 1894, The Episcopal Church began a medical mission here. In 1978, The Episcopal Church founded the Area Mission on the 27,000 square miles in Arizona, New Mexico, and Utah, which are contiguous with the Navajo Nation.
                    Until recently, our buildings were falling into disrepair and leadership and vision came from non-native clergy.
                </p>


        </div>
    </div>
</div>


<ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li><a href="areaMissContact.php">Area Mission Contact</a></li>
    <li><a href="calendarNew.php">Calendar</a></li>
    <li><a href="findaChurch.php">Find A Church</a></li>
    <li><a href="missionsRetreats.php">Missions/Retreats</a></li>
    <li class="active"></li>
</ol>
</body>

</html>