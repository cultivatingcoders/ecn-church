<!DOCTYPE>
<html>
<head>
    <?php require_once("lib/head-utils.php"); ?>
    <?php require_once("indexNavBar.php"); ?>
    <link href="https://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet">
    <title>News Letter & Events</title>
    <!-- Custom styles for this template -->

    <style>
        body{
            font-family: 'Pontano Sans', sans-serif;
            background-image: url("/lib/img/sunflower.JPG");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            color: white;
        }
        #flyer {
            padding-top: 25px;
            padding-bottom: 25px;
            text-align: center;
        }
        .bulletin .row {
            text-align: left;
            background: rgba(43, 43, 43, 0.76);
            color: white;
            font-family: 'Pontano Sans', sans-serif;
            border-radius: 25px;
            border: 2px solid #232323;
            padding: 20px;
        }
        #first {
            padding-top: 100px;
            padding-bottom: 50px;
        }
        .responsive-image {
            height: auto;
            width: 100%;
        }
    </style>

</head>

<body>



    <div id="first" class="container">
        <div class="container bulletin" id="bulletin">
            <div class="row bulletin">
            <div class="container" id="flyer">
                <h3>Corn Ripening Retreat @ Good Shepherd Mission</h3>
                <h3>Previous Retreat</h3>
                <img src="/lib/img/cornRipening.JPG" border="0" class="responsive-image" alt="Null">
            </div>
            </div>
        </div>
    </div>


<ol class="breadcrumb text-center">
    <li><a href="index.php">Home</a></li>
    <li><a href="areaMissContact.php">Area Mission Contact</a></li>
    <li><a href="calendarNew.php">Calendar</a></li>
    <li><a href="findaChurch.php">Find A Church</a></li>
    <li><a href="missionsRetreats.php">Missions/Retreats</a></li>
    <li class="active"></li>
</ol>
</body>

</html>