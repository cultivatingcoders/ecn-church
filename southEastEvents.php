<!DOCTYPE html>
<html>
<head>
    <?php require_once("lib/head-utils.php"); ?>
    <?php require_once("indexNavBar.php");?>


    <title></title>
    <!-- Custom styles for this template -->

    <link href="lib/css/styleNavbar.css" rel="stylesheet">
    <link href="lib/css/styleCService.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quattrocento' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
</head>

<body>

<style>



    #photo {
        border: solid;
        width: 200px;
        height: 125px;
        background-color: #666666;
        border-color: #666666;
        color: #666666;
    }
    body {
        text-align: center;
    }

    .thumbnail li {
        text-align: center;
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
        filter: url('/media/blur.svg#blur');
        filter: blur(10px);
    }

    #search {
        /* Put this on top of the blurred layer */
        position: relative;
        z-index: 100;
        padding: 20px;
        background: rgba(35, 35, 35, 0.50); /* for IE */
        background: rgba(43, 43, 43, 0.50);
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

    #top {
        padding-top: 100px;
    }
</style>



<div class="container-fluid" id="top">
    <div class="jumbotron">
        <h1>Event Description</h1>
    </div>
</div>

<div id="bg">
    <div id="search-container">
        <div id="search-bg"></div>
        <div id="search">

            <div class="row">
                <div class="col-lg-3">
                    <div>
                        <img id="photo" src="/lib/img/gsmcross.jpg">
                    </div>
                    <p>
                        Good Shepherd Mission<br>
                        Phone:(928) 729-2322<br>
                        Fort Defiance, AZ 86504 
                    </p>
                </div>
                <div class="col-lg-9" id="text">
                    <h2>Morning Prayer</h2>
                    Every Tuesday morning from 9:00 to 10:00 am Good Shepherd Mission has a time of prayer.  All are invited to join for prayer in the sanctuary led by the Vicar, Deacon or staff.
                </div>
            </div>
        </div>
    </div>
</div>


<div id="bg">
    <div id="search-container">
        <div id="search-bg"></div>
        <div id="search">

            <div class="row">
                <div class="col-lg-3">
                    <div>
                        <img id="photo" src="/lib/img/gsmParish.JPG">
                    </div>
                    <p>
                        Good Shepherd Mission<br>
                        Phone:(928) 729-2322<br>
                        Fort Defiance, AZ 86504
                    </p>
                </div>
                <div class="col-lg-9" id="text">
                    <h2>South East Region Council Meeting</h2>
                    Come and sit in on our monthly Council Meetings held on the second Sunday of every month after church. 
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ABOUT LINK -->
<style> .what:hover { cursor: pointer; opacity: .75; } .what {display: block;width: 28px;height: 28px;position: fixed;right: 20px;bottom: 20px;background-size: 100% 100%; 
                                                           background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyB3aWR0aD0iMjNweCIgaGVpZ2h0PSIyM3B4IiB2aWV3Qm94PSIwIDAgMjMgMjMiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+ICAgICAgICA8dGl0bGU+U2xpY2UgMTwvdGl0bGU+ICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPiAgICA8ZGVmcz48L2RlZnM+ICAgIDxnIGlkPSJQYWdlLTEiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPiAgICAgICAgPHBhdGggZD0iTTExLjUsMjIgQzE3LjI5ODk4OTksMjIgMjIsMTcuMjk4OTg5OSAyMiwxMS41IEMyMiw1LjcwMTAxMDEzIDE3LjI5ODk4OTksMSAxMS41LDEgQzUuNzAxMDEwMTMsMSAxLDUuNzAxMDEwMTMgMSwxMS41IEMxLDE3LjI5ODk4OTkgNS43MDEwMTAxMywyMiAxMS41LDIyIFoiIGlkPSJPdmFsIiBzdHJva2U9IiMzQTA1M0EiIGZpbGw9IiNGRkZGRkYiPjwvcGF0aD4gICAgICAgIDxwYXRoIGQ9Ik0xMi4yNzkyOTY5LDEzLjQ2Mjg5MDYgTDEwLjc4NTE1NjIsMTMuNDYyODkwNiBDMTAuNzgxMjUsMTMuMjQ4MDQ1OCAxMC43NzkyOTY5LDEzLjExNzE4NzcgMTAuNzc5Mjk2OSwxMy4wNzAzMTI1IEMxMC43NzkyOTY5LDEyLjU4NTkzNTEgMTAuODU5Mzc0MiwxMi4xODc1MDE2IDExLjAxOTUzMTIsMTEuODc1IEMxMS4xNzk2ODgzLDExLjU2MjQ5ODQgMTEuNDk5OTk3NiwxMS4yMTA5Mzk1IDExLjk4MDQ2ODgsMTAuODIwMzEyNSBDMTIuNDYwOTM5OSwxMC40Mjk2ODU1IDEyLjc0ODA0NjQsMTAuMTczODI4NyAxMi44NDE3OTY5LDEwLjA1MjczNDQgQzEyLjk4NjMyODgsOS44NjEzMjcxNyAxMy4wNTg1OTM4LDkuNjUwMzkxNzggMTMuMDU4NTkzOCw5LjQxOTkyMTg4IEMxMy4wNTg1OTM4LDkuMDk5NjA3NzcgMTIuOTMwNjY1Myw4LjgyNTE5NjQ2IDEyLjY3NDgwNDcsOC41OTY2Nzk2OSBDMTIuNDE4OTQ0LDguMzY4MTYyOTIgMTIuMDc0MjIwOSw4LjI1MzkwNjI1IDExLjY0MDYyNSw4LjI1MzkwNjI1IEMxMS4yMjI2NTQyLDguMjUzOTA2MjUgMTAuODczMDQ4Myw4LjM3MzA0NTY4IDEwLjU5MTc5NjksOC42MTEzMjgxMiBDMTAuMzEwNTQ1NSw4Ljg0OTYxMDU3IDEwLjExNzE4OCw5LjIxMjg4ODE4IDEwLjAxMTcxODgsOS43MDExNzE4OCBMOC41LDkuNTEzNjcxODggQzguNTQyOTY4OTYsOC44MTQ0NDk2MyA4Ljg0MDgxNzU1LDguMjIwNzA1NTcgOS4zOTM1NTQ2OSw3LjczMjQyMTg4IEM5Ljk0NjI5MTgzLDcuMjQ0MTM4MTggMTAuNjcxODcwNSw3IDExLjU3MDMxMjUsNyBDMTIuNTE1NjI5Nyw3IDEzLjI2NzU3NTMsNy4yNDcwNjc4NCAxMy44MjYxNzE5LDcuNzQxMjEwOTQgQzE0LjM4NDc2ODQsOC4yMzUzNTQwMyAxNC42NjQwNjI1LDguODEwNTQzNTkgMTQuNjY0MDYyNSw5LjQ2Njc5Njg4IEMxNC42NjQwNjI1LDkuODMwMDc5OTQgMTQuNTYxNTI0NSwxMC4xNzM4MjY1IDE0LjM1NjQ0NTMsMTAuNDk4MDQ2OSBDMTQuMTUxMzY2MiwxMC44MjIyNjcyIDEzLjcxMjg5NCwxMS4yNjM2NjkxIDEzLjA0MTAxNTYsMTEuODIyMjY1NiBDMTIuNjkzMzU3NiwxMi4xMTEzMjk2IDEyLjQ3NzUzOTUsMTIuMzQzNzQ5MSAxMi4zOTM1NTQ3LDEyLjUxOTUzMTIgQzEyLjMwOTU2OTksMTIuNjk1MzEzNCAxMi4yNzE0ODQzLDEzLjAwOTc2MzQgMTIuMjc5Mjk2OSwxMy40NjI4OTA2IEwxMi4yNzkyOTY5LDEzLjQ2Mjg5MDYgWiBNMTAuNzg1MTU2MiwxNS42Nzc3MzQ0IEwxMC43ODUxNTYyLDE0LjAzMTI1IEwxMi40MzE2NDA2LDE0LjAzMTI1IEwxMi40MzE2NDA2LDE1LjY3NzczNDQgTDEwLjc4NTE1NjIsMTUuNjc3NzM0NCBaIiBpZD0iPyIgZmlsbD0iIzNBMDUzQSI+PC9wYXRoPiAgICA8L2c+PC9zdmc+);}</style><a href="http://mojs.io/tutorials/burst/" class="what" title="tutorial" target="_blank"></a>
<!-- ABOUT LINK -->
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
