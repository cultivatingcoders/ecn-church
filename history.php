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

        .logoImage {
            width: 350px;
            height: 350px;
            padding-left: 50px;
            padding-top: 75px;
        }

        p {
            color: white;
            text-align: center;
            font-size: 18px;
            padding-bottom: 35px;
        }

        #bg {
            background-position: center top;
            padding: 20px 90px 20px 90px;
        }

        #search-container {
            position: relative;
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


    <div class="logoImage">
        <img src="/lib/img/episcopalchurchinnavajolandlogo_480.png" class="img-responsive" alt="Awesome.jpg">
    </div>


    <div id="bg">
        <div id="search-container">
            <div id="search-bg"></div>
            <div id="search">


                <h1>History & Beliefs</h1>
                <p>
                We call ourselves ‘The Dine’ - The People - and we are one of the largest Native American Indian tribes in the United States. We have lived in the Southwest for hundreds of years, with a culture embedded in the Divine Creator and a tradition of worship with roots deep in the earth.
                Our relationship with the United States government has been difficult: We were forcibly removed from our land in 1863 and, on The Long Walk, were marched hundreds of miles away. Our possessions were taken, our farmlands destroyed, and our livestock killed. Later, our children were taken from us, placed in boarding schools, and punished for speaking our language and practicing our culture. We have internalized much of this sorrow, and today, we experience high rates of addiction and suicide. Given our geography, unemployment and under-employment are high.
                </p>
                <p>
                Despite this, we continue to serve proudly in the United States military. Many of our brothers and sisters are currently in Iraq and Afghanistan. The Navajo Code Talkers of World War II are renowned for helping to win the war in the Pacific. Additionally, Navajo military enlistment is much higher than the national average.
                The Episcopal Church began a medical mission in Ft. Defiance in 1894, Farmington, NM in 1922, and Bluff UT in 1942. All real Missions started out as a Medical Mission. In 1978, The Episcopal Church founded the Area Mission on the 27,000 square miles in Arizona, New Mexico, and Utah, which are contiguous with the Navajo Nation. Until recently, our buildings were falling into disrepair and leadership and vision came from non-native clergy.
                </p>
                <p>
                Today, there is a new spirit and a new energy in our land! We have re-opened some churches and planted new ones. We have ordained four Navajo priests and three deacons. We have reached out to the many Navajo military veterans. We have repaired beautiful but aging buildings for rental income and program use. We are expanding retreat opportunities and building Hogan’s for educational AND ceremonial purposes. As time passes, the world is looking to indigenous peoples and communities to learn and engage in our history and traditions.
                </p>
                <p>
                We, in the Episcopal Church in Navajoland, have developed projects to protect Mother Earth and help put us on the road to self-sufficiency: The Blue Corn Project, the Bee and Honey Project, and ShiMa’ of Navajoland hand-crafted soaps.
                </p>
                <p>
                True to our culture, corn is important and sacred, we use corn in ceremony and is a staple food item. Along with our nourishing corn, herbs and roots collected all around Navajoland are made into various healing soaps made in our kitchens and packaged by our people. In the first months of receiving bees and hives, we were able to produce 100 pounds of honey and in the process pollinate our blue corn, squash, and other plants. We have adapted in recycling, and abolishing the use of Styrofoam and compost all things we can. But, as times passes, and we continue in the teachings and learning of our culture, we also need to adapt to technology. By creating the Cheii's Web Development Shop, we aim to bring web development training to our Navajo people so that we have the skill set so needed in Navajoland. These efforts derive from our visioning together as we work to achieve our potential. Ultimately, these new beginnings will lead to a fully indigenous clergy, economic sustainability, and a deeper appreciation of the unique gifts we bring to the wider church.
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
