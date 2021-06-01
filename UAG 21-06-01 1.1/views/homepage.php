<?php
session_start();
    date_default_timezone_set('Europe/Stockholm');
    include '../home.inc.php';
    include '../setAndGetActivity.inc.php';
    include '../api/homepageupdate.php';
    include '../api/getTopParty.php';
    include '../api/getTopRomance.php';
    include '../api/getTopAdventure.php';

    if (isset($_SESSION['uid'])===true){
    $username = getUsername($_SESSION['uid']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | UAG</title>
    <link rel="stylesheet" href="../css/newstyle.css">
    <script  src="../js/barscript.js"></script>
</head>
<body onload="hideall()">

    <div id="BG">
        
        <?php
        if (isset($_SESSION['uid'])===true){
        include '../headers/loggedin.php';
        } else{
            include '../headers/notloggedin.php';
        }
       
        ?>
        
        

        
     
        <div class="activityspace" >

            <div class="text" id="posleftcorner" onclick="hideall()" >
                <h1 class="boxhead">Sun at last!</h1>
                <p class="boxtext"> What do you feel like doing today? </p>
                <p class="boxtext"> Here is the top pick to help you out! </p>
            </div>
            
        
            
            <div class="activitybar spacearound">
                <ul class="ac">
                    <li class="paddingspace" id="party" onclick=" hiderom(),hidead(),hidechill(), displayparty()">
                        <a  class="catchoice"  >Party</a></li>
                    <li class="paddingspace" id="chill" onclick="hideparty(), hiderom(),hidead(),displaychill()">
                        <a  class="catchoice" >Chill Down</a></li>
                    <li class="paddingspace" id="romance" onclick="hideparty(),hidechill(), hidead(),displayrom()">
                            <a  class="catchoice" >Romance</a></li>
                    <li class="paddingspacelst" id="adventure" onclick="hideparty(),hidechill(),hiderom(),displayad()">
                            <a  class="catchoice" >Adventure</a></li>
                </ul>
            </div>
        </div>

        <form method="POST"> 
        <input type="hidden" id='showbox' name="showbox" value="none">
        
        </form>
        <div class="pickscon">
            <div class="pacon" id="pacon">
               <div class="pabox1">
                    <?php
                   
                    getSingleThread1(getTopParty());
                   
              //  getSingleThread(getTopParty());
                    ?>
               </div>
            </div>
            <div class="chicon" id="chicon"  >
               <div class="chibox1">
               <?php
               getSingleThread2(getTopChill());
                ?>
               </div>
            </div>

            <div class="romcon" id="romcon"  >
               <div class="rombox1">
               <?php
               
                getSingleThread3(getTopRomance());
               
                
                ?>
               </div>
            </div>

            <div class="adcon" id="adcon" >
                <div class="advbox1">
                <?php
                getSingleThread4(getTopAdventure());
                ?>

                </div>
            </div>

        </div>

        <div class="weatherbox">
            <div class="webohead">
            <h4>Uppsala, Sweden</h4> 
            <h4>
                <?php
                echo "" . date("y/m/d") ."";
                ?>
            </h4>
            <!-- <img src="/images/sun-3-128.png" alt="sol" id="vicon"> -->
            </div>
            <div>
                <?php
                include '../api/weatherapi.php'
                ?>
            </div>
            
        </div>

       

    </div>

    
</body>
</html>