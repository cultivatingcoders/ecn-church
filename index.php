<!DOCTYPE html>
<html>
<head>
    <?php require_once("lib/head-utils.php"); ?>
    <?php require_once("indexNavBar.php");?>
    <!-- Custom styles for this template -->
    <link href="/lib/css/styleindex.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quattrocento' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Oswald:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet">
    <title>Home</title>
</head>
<body>
<!---------Beginning Carousel ----------------------------------------------------------------------------------------->


    <div class="container-fluid">
        <div class="row">

            <div id="inCarMain" class="col-sm-8">
                <div id="carousel-example-generic" class="carousel slide container" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="6"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="7"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="8"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="9"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="10"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="11"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="/lib/img/oldHosp.jpg " alt="...">
                            <div class="carousel-caption" id="caption">
                                <h2>The Old Hospital, Farmington, NM</h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="/lib/img/oldHosInterior.jpg " alt="...">
                            <div class="carousel-caption" id="caption">
                                <h2>Inside the Old Hospital, Farmington, NM</h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="/lib/img/sheepCamp.jpg " alt="...">
                            <div class="carousel-caption" id="caption">
                                <h2>Sheep Camp Upper Fruitland, New Mexico</h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="/lib/img/WRYouth.jpg " alt="...">
                            <div class="carousel-caption" id="caption">
                                <h2>South East Region Youth</h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="/lib/img/GSMBell.JPG " alt="...">
                            <div class="carousel-caption" id="caption">
                                <h2>Good Shepherd Mission Bell Ft. Defiance, AZ </h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="/lib/img/greenField.JPG" alt="...">
                            <div class="carousel-caption" id="caption">
                                <h2>Harvest Time</h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="/lib/img/groundBlueCorn.JPG" alt="...">
                            <div class="carousel-caption" id="caption">
                                <h2>Ground Blue Corn</h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="/lib/img/4sunFlowers.JPG" alt="...">
                            <div class="carousel-caption" id="caption">
                                <h2>New Mexico Sun Flowers</h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="/lib/img/ruinsCDc.JPG" alt="...">
                            <div class="carousel-caption" id="caption">
                                <h2>Canyon De Chelly Chinle, AZ</h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="/lib/img/stCBell.JPG" alt="...">
                            <div class="carousel-caption" id="caption">
                                <h2>St. Christopher’s Bell Bluff, UT</h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="/lib/img/windowR.JPG" alt="...">
                            <div class="carousel-caption" id="caption">
                                <h2>Window Rock Monument</h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="/lib/img/gsmCross2.JPG" alt="...">
                            <div class="carousel-caption" id="caption">
                                <h2>Good Shepherd Mission Cross Ft. Defiance, AZ</h2>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

<!---------End Carousel ----------------------------------------------------------------------------------------------->
<!---------Begin side 6 Buttons --------------------------------------------------------------------------------------->
            <div class="col-sm-4" id="buttons">
                <span style="display: inline-block; width: 100px; vertical-align: top;">
                    <a type="button" href="#bulletin" class="btn btn-default" style="width: 200px; height: 90px;">Recent News</a>
                    <a type="button" href="bishopsPage.php" class="btn btn-default" style="width: 200px; height: 90px;" target="_blank">Bishop's Page<br>& Calendar</a>
                    <a type="button" href="howToHelp.php" class="btn btn-default" style="width: 200px; height: 90px;" target="_blank">How to Help/<br>Donate</a>
                    <a type="button" href="newsLetterEvents.php" class="btn btn-default" style="width: 200px; height: 90px;" target="_blank">Newsletter/<br>Events</a>
                    <a type="button" href="ecnSeal&Beginning.php" class="btn btn-default" style="width: 200px; height: 90px;" target="_blank">ECN Seal<br>& Beginnings</a>
                    <a type="button" href="http://www.cheiiswebdev.com/" class="btn btn-default" style="width: 200px; height: 90px;" target="_blank">Cheii's Web<br> Development</a>
                </span>
            </div>

        </div>
    </div>
<!---------End side 6 Buttons ----------------------------------------------------------------------------------------->


<!---------Bulletin Space on Home page--------------------------------------------------------------------------------->
    <div class="container bulletin" id="bulletin">
        <div class="row bulletin">

            <div class="col-xs-4" id="dhead">
                <h2><a class="black" href="utahRegion.php" target="_blank">Utah Region's Latest News</a></h2>
            </div>

            <div class="col-xs-4" id="dhead">
                <h2><a class="black" href="sanJuanRegion.php" target="_blank">S.J. Region's Latest News</a></h2>
            </div>

            <div class="col-xs-4" id="dhead">
                <h2><a class="black" href="southEast.php" target="_blank">S.E. Region's Latest News</a></h2>
            </div>

            <div class="col-xs-4">
                <h3>Come Celebrate Valentine's Day Dinner</h3><!--- Input Bulletin Heading here ------------------------------->
                <h3>Sunday February 11 th , 2017 from 5 to 8 pm</h3><!--- Input Bulletin Med. Text here ------------>
                <h3>St. Christopher’s Community Center</h3><!--- Input Bulletin Heading here ------------------------------->
                <h3><center>$12.00 Per Plate</center><h3><!--- Input Bulletin Med. Text here ------------>

            </div>

            <div class="col-xs-4">
                <h3>All Saint's Cake Walk</h3><!--- Input Bulletin Heading here ------------------------------->
                <h3>Friday February, 10th</h3><!--- Input Bulletin Med. Text here ------------>
                <h3>5:30 PM - 9:00 PM</h3><!--- Input Bulletin Heading here ------------------------------->
                <h3></h3><!--- Input Bulletin Med. Text here ------------>
            </div>

            <div class="col-xs-4">
                <h3>SE Region Council Meeting</h3><!--- Input Bulletin Heading here ------------------------------->
                <h3>Sunday January, 08 After the Service</h3><!--- Input Bulletin Med. Text here ------------>
                <!--- Input Bulletin Heading here ------------------------------->
                <!--- Input Bulletin Med. Text here ------------>
            </div>

        </div>
    </div>
<!---------End Bulletin Space on Home page----------------------------------------------------------------------------->



<!---------List of all churches on Home page--------------------------------------------------------------------------->

<!-----------Beginning of outer grey container box/ 4 lines of code---------->
<div id="bg">
    <div id="search-container">
        <div id="search-bg"></div>
        <div id="search">



            <div id="bg"><!-----Beginning of inner grey container box/ 4 lines of code around churches---------->
                <div id="search-container">
                    <div id="search-bg"></div>
                    <div id="search">


                        <div class="row">
                            <div class="col-xs-4">
                                <a href="southEast.php" target="_blank">
                                <h3>South East Region</h3>
                                </a>
                                <h6 span class="state">Arizona Churches</h6></span>
                                <a href="http://www.goodshepmission.org/" target="_blank">
                                <h6>Good Shepherd Mission Episcopal Church</h6>
                               </a>
                                <h6>St. Joseph's Episcopal Church</h6>
                                <h6 span class="state">New Mexico Churches</h6></span>
                                <h6>St. Mark's Episcopal Church</h6>
                            </div>
                            <div class="col-xs-4">
                                <a href="sanJuanRegion.php" target="_blank">
                                <h3>San Juan Region</h3>
                                </a>
                                <h6 span class="state">New Mexico Churches</h6></span>
                                <h6>All Saints Episcopal Church</h6>
                                <h6>St. Michael's Episcopal Church</h6>
                                <h6>St. Luke's In the Desert Episcopal Church</h6>
                            </div>
                            <div class="col-xs-4">
                                <a href="utahRegion.php" target="_blank">
                                <h3>Utah Region</h3>
                                </a>
                                <h6>St. Christopher's Episcopal Church</h6>
                                <h6>St. Mary's of the Moonlight Episcopal Church</h6>
                                <h6>St. John the Baptizer Episcopal Church</h6>
                                <h6>St. David's House Episcopal Church</h6>
                            </div>
                        </div>


                    </div>
                </div>
            </div><!-----------End of inner grey container box/ 4 lines of code around churches---------->

<!---------End list of all churches on Home page----------------------------------------------------------------------->

<!---------Begin Media Release section on Home page-------------------------------------------------------------------->
                <div id="search-container"><!-----------Beginning of grey container box/ 4 lines of code---------->
                    <div id="search-bg"></div>
                    <div id="search">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="thumbnail">
                                    <img src="/lib/img/ECN%20Mtg%20LaCinda.jpg">
                                </div>
                                <p>The need for recognizing transitions into various projects throughout Episcopal Church in Navajoland (ECN) was recognized.</p>
                                <p>Photo by Fred Eaton</p>
                                <div class="thumbnail">
                                    <img src="/lib/img/ECN%20Mtg%20Maggie%20Paula%20speaking.jpg">
                                </div>
                                <p>Episcopal Church in Navajoland Meeting</p>
                                <p>Photo by Fred Eaton</p>



                            </div>
                            <div class="col-lg-8" id="text">
                                <h3>The Episcopal Church in Navajoland Visioning toward the Future</h3>
                                A gathering of the lay and clergy representatives of The Episcopal Church in

                                Navajoland (ECN) was held on Saturday, January 21, 2017. The purpose of the

                                meeting was to hear from members of the council what they think is needed in order to

                                do the work of transitioning from an Area Mission to a Diocese. The Rev. Cornelia

                                Eaton, Rev. Canon Cathlena Plummer and Rev. Deacon Leon Sampson led the

                                discussion.
                                <br><br>
                                Much of the meeting was spent listening to the people and hearing of the visions and

                                needs of each of the congregations. The goals for ECN were reviewed, and a brief

                                review of the progress we have made towards those goals was shared. It was

                                recognized that in order to move forward with the transition, more training is needed in

                                the 3 regions to understand the structure of a diocese.
                                <br><br>
                                The question “How do we continue to look at our sustainability?” was the focus of the

                                conversation. A model was developed during a brainstorming session, but there is the

                                need to continue to flesh out that model.
                                <br><br>
                                The three big goals for that the members believe are important to the future of ECN are

                                1) Language, 2) Youth, 3) Outreach. The group acknowledged that leadership is

                                important and support discerning and preparing more Navajo clergy. The Rev. Deacon

                                Leon Sampson commented about the meeting, “It is all part of that “grassroots”

                                learning… “.
                                <br><br>
                                <h3>New Goals for the two Farms:</h3>
                                The Homer Dale Farm at St. Christopher’s Mission in Bluff, UT and the Community

                                Farm at Good Shepherd in Fort Defiance are part of a grant received from the United

                                Thank Offering of the Episcopal Church. Production and packaging would take place at

                                Good Shepherd Mission. St. Christopher’s is growing blue corn. The goal is to provide

                                training in the other regions in honey production, growing blue corn, and making soap.

                                The hope is this will give people training and new skills that they can use to support

                                themselves and help support the church. This way the responsibility for production can

                                be shared among all the regions and not rest just on the Southeast Region.
                                <br><br>

                            </div>
                        </div>
                    </div>
                </div><!-----------End of outer grey container box/ 4 lines of code around Media Release--------------->
        <br>
        <br>
            <!---------Begin Fire Section-------------------------------------------------------------------->
            <div id="search-container"><!-----------Beginning of grey container box/ 4 lines of code---------->
                <div id="search-bg"></div>
                <div id="search">
                    <div>
                        <h3>2017 Fire in the Old Hospital Structure</h3>

                        On January 05th, 2017 at approximately 2:30 pm the Farmington, NM Fire Department was called to the grounds of All Saints Episcopal Church for a reported fire in the lower floor of the Old Church Building.
                        Earlier in the day construction workers were in the building tending to pipes and once all workers were off site, heat from pipe cutting ignited the ceiling of the first room of the Old Church. The red embers created smoke that was visible but was masked as dust gusts since the weather that day was excessively windy. It was clear to Cheii’s Dev shop Employees next door that something was amiss when they smelled smoke and took it upon themselves to investigate all buildings on grounds until the fire was discovered. One Cheii worker got help from the church maintenance and another Cheii worker called emergency dispatch. The maintenance worker and Cheii worker tried without success to put the fire out with fire extinguishers.
                        <br><br>
                        It took about 15 minutes for Farmington Fire Department workers to show up and extinguish the fire. There was minimal damage to the ceiling in two rooms of the Old Church. Electricity was shut off to the building for precaution. No persons were harmed, and the building is still standing.
                        The Episcopal Church in Navajoland has many plans for this historic building. Plans that will aid the community and the people.
                        We thank the Farmington Fire Department for their work and are very thankful that no one was injured.
                    </div>
                            <br>
                    <div class="col-sm-">

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img src="/lib/img/IMG_0684.JPG">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img src="/lib/img/smoke1.jpg">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img src="/lib/img/IMG_0690.JPG">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <br>
        <br>
            <!-----------End of outer grey container box/ 4 lines of code around Fire Section -------------->

            <div id="search-container"><!-----------Beginning of grey container box/ 4 lines of code---------->
                <div id="search-bg"></div>
                <div id="search">
                    <div class="row">
<!---------Hogan section on Home page---------------------------------------------------------------------------------->
        <div class="col-lg-4">
            <div class="thumbnail">
                <img src="/lib/img/slide3.jpg">
            </div>
            <div class="thumbnail">
                <img src="/lib/img/gsmhoganproject.jpg">
            </div>
            <div id="button-blue">
                <a class="btn btn-info btn-lg" href="https://www.razoo.com/story/Build-A-Hogan?referral_code=share" role="button" target="_blank">Help Build a Hogan Here!</a>
            </div>
        </div>

                <div class="col-lg-8" id="text">
                    <h3>The Hogan Project</h3>
                    Rebuilding the spiritual and physical homes.
                    A Spiritual Place: Navajo spirituality recognizes a sacred web of life which encompasses all living
                    things. Navajo ceremonies are designed to restore this harmony with all of creation to those who
                    are ill or hurting in any way. These ceremonies take place in hogans. <br>
                    <br>
                    A Place Home: The hogan is also the traditional Navajo home. Its shape reflects the universe.
                    The one door opens to the East, to greet the dawn. All inside activities move in a clockwise fashion,
                    following the sun’s path. The domed roof is the sky, the floor is the earth, and the smoke hole is a
                    window to the North Star. Literally translated, hogan means “place home”, and the Navajo take their
                    identity from it. <br>
                    <br>
                    The Project: Through harsh weather, neglect, and decaying materials, many of the hogans on the
                    Reservation have fallen into ruin. The Episcopal Church in Navajoland has begun a campaign to
                    build new hogans, for ceremonial, educational, and spiritual purposes. There will be two hogans
                    in each state the Reservation touches: Arizona, New Mexico, and Utah. <br>
                    <br>
                    A hogan is built of wood, usually cedar or ponderosa or pinion pine. Today, there is often a steel
                    infrastructure, providing resistance to the strenuous winds which sweep through the Reservation.
                    Today’s hogans are often built on a concrete slab for durability. <br>
                    <br>
                    The Financials’: The cost of a hogan varies greatly depending on its location. Proximity to
                    electricity and water, availability of materials and labor, and accessibility for the delivery
                    of them are some of the factors which contribute to variable cost. Thus, we estimate that each 800
                    square foot hogan will cost approximately $40,000 to construct. <br>
                    <br>
                    The Follow-up: As the hogans are funded, watch the building progress on our website,
                    www.ecnavajoland.com. We’ll have pictures and updates that show you how your generosity empowers as
                    it preserves the beauty of Navajo culture. <br>
                </div>
                    </div>
            </div>
        </div>
<!---------End Hogan section on Home page------------------------------------------------------------------------------>

<!---------logo links on Home page------------------------------------------------------------------------------------->
    <div class="row">
            <div class="col-xs-4">
                <div id="shimaLink" class="thumbnail">
                    <a href="https://shima-of-navajoland.myshopify.com/" target="_blank">
                        <img src="/lib/img/shima.jpg">
                    </a>
                </div>
            </div>
            <div class="col-xs-4">
                <div id="episcopalLink" class="thumbnail">
                    <a href="http://www.episcopalchurch.org/" target="_blank">
                        <img src="/lib/img/episcopalShieldIcon2.png">
                    </a>
                </div>
            </div>
            <div class="col-xs-4">
                <div id="cheiiLink" class="thumbnail">
                    <a href="http://www.cheiiswebdev.com/" target="_blank">
                        <img src="/lib/img/cheiidevshoplogo.png">
                    </a>
                </div>
            </div>
    </div>
<!---------End logo links on Home page--------------------------------------------------------------------------------->
        </div>
    </div>
</div>

<!-----------End of outer grey container box/ 4 lines of code around churches---------->

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="FER9BAE5Q2XNE">
    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<!---------Footer/sticky links----------------------------------------------------------------------------------------->
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
