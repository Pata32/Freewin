<?php 
require_once "php/connect_db.php";
session_start();
if(!isset($_SESSION["id_user"])){
    header('Location: http://localhost/Freewin/login.php');
}

?>
<html>
<head>
    <title>Freewin -- La victoire entre vos mains!</title>
    <link rel="stylesheet" href="css/index.css" type="text/css" />
    <link rel="stylesheet" href="css/css.css" type="text/css" />
    <script type="text/javascript" src="librairy\Winwheel.js"></script>
    <script src="javascript/ajax/ajax.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
</head>

<body>
    <div class="head">
        <h1>Freewin</h1>
        <p>
            Ici un slogan où l'on gagne des gens, coucou!
        </p>
    </div>
   
<div class="game">
    <table align="center">
        <tr>
<!---------------------------- Wheel n°1 ----------------------------> 
            <td>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <img id="fleche" src="images/fleche.png" width="50" height="50"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="canvas">
                                    <canvas id="canvas1" width="434" height="434" data-responsiveMinWidth="180" data-responsiveScaleHeight="true" data-responsiveMargin="50">
                                        <p style="color: white"> Sorry, your browser doesn't support canvas. Please try another.</p>
                                    </canvas>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class = center>
                                    <button id="btn_spin_1" hidden class="btn button play" onClick="playPub('btn_spin_1')"> Tournez la roue ! </button>
                                    <span id="timer_1" class="text-time"></span>
                                    <!-- <input type="button" id="button_play" hidden value="Jouer"> -->
                                    <!-- <img id="spin_button"  src="images\spin.png" width="50" height="50" alt="Spin" onClick="resetWheel(1); return false;" /> -->
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            
<!---------------------------- Wheel n°2 ----------------------------> 
<td>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <img id="fleche" src="images/fleche.png" width="50" height="50"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="canvas">
                                    <canvas id="canvas2" width="434" height="434">
                                        <p style="color: white"> Sorry, your browser doesn't support canvas. Please try another.</p>
                                    </canvas>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class = center>
                                    <button id="btn_spin_2" hidden class="btn button play" onClick="playPub('btn_spin_2');"> Tourner la roue! </button>
                                    <span id="timer_2" class="text-time"></span>
                                    <!-- <img id="spin_button"  src="images\spin.png" width="50" height="50" alt="Spin" onClick="resetWheel(2); return false;" /> -->
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
<!---------------------------- Wheel n°3 ----------------------------> 
            <td>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <img id="fleche" src="images/fleche.png" width="50" height="50"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="canvas">
                                    <canvas id="canvas3" width="434" height="434">
                                        <p style="color: white"> Sorry, your browser doesn't support canvas. Please try another.</p>
                                    </canvas>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class = center>
                                    <button id="btn_spin_3" hidden class="btn button play" onClick="playPub('btn_spin_2');"> Tourner la roue! </button>
                                    <span id="timer_3" class="text-time"></span>
                                    <!--<input type="button" id="button_play" hidden value="Jouer">
                                    <img id="spin_button"  src="images\spin.png" width="50" height="50" alt="Spin" onClick="resetWheel(3); return false;" /> -->
                                </div> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>   
<div id="popup">
    <div id="videoContainer">
      <video id="videoPlayer" autoplay="true" controls>
        <source src="" type="video/mp4">
      </video>
    </div>
  </div>
<script type="text/javascript" src="librairy/index.js"></script>
</body>
<script>changeHour()</script>
</html>