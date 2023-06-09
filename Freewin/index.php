<?php 
    include "layout.php"; 
    require "php/php_index.php";
?>

<html>

<head>
    <title>Freewin -- La victoire entre vos mains!</title>
    <link rel="stylesheet" href="css/index.css" type="text/css" />
    <link rel="stylesheet" href="css/css.css" type="text/css" />
    <script type="text/javascript" src="librairy\Winwheel.js"></script>
    <script src="javascript/ajax/ajax.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>

<body>
   
    <div class="wrapper">

        <div class="head one">
            <h1 class="title">Freewin</h1>
            <p class="description">La victoire entre vos mains !</p>
        </div>

        <div class="game two">
            <table>
                <tr>
        <!---------------------------- Wheel n°1 ---------------------------->
                    <td> 
                        <table class="table1">
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
                        <table class="table2 three">
                            <tbody>
                                <tr>
                                    <td>
                                        <img id="fleche" src="images/fleche.png" width="50" height="50"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="canvas">
                                            <canvas id="canvas2" width="434" height="434" data-responsiveMinWidth="180" data-responsiveScaleHeight="true" data-responsiveMargin="50">
                                                <p style="color: white"> Sorry, your browser doesn't support canvas. Please try another.</p>
                                            </canvas>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class = center>
                                            <button id="btn_spin_2" hidden class="btn button play" onClick="playPub('btn_spin_2');"> Tournez la roue ! </button>
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
                        <table class="table3">
                            <tbody>
                                <tr>
                                    <td>
                                        <img id="fleche" src="images/fleche.png" width="50" height="50"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="canvas">
                                            <canvas id="canvas3" width="434" height="434" data-responsiveMinWidth="180" data-responsiveScaleHeight="true" data-responsiveMargin="50">
                                                <p style="color: white"> Sorry, your browser doesn't support canvas. Please try another.</p>
                                            </canvas>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class = center>
                                            <button id="btn_spin_3" hidden class="btn button play" onClick="playPub('btn_spin_3');"> Tournez la roue ! </button>
                                            <span id="timer_3" class="text-time"></span>
                                            <!--<input type="button" id="button_play" hidden value="Jouer">
                                            <img id="spin_button"  src="images\spin.png" width="50" height="50" alt="Spin" onClick="resetWheel(3); return false;" /> -->
                                        </div> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    
        
    </div>

    <div id="popup">
        <div id="videoContainer">
            <video id="videoPlayer" autoplay="true" controls>
                <source id="src_video" src="" type="video/mp4">
            </video>
        </div>
    </div>

    <div id="alerte" class="alerte-victoire">
        <div id="alerte-contenu" class="alerte-contenu">
            <p id="alerte-paragraphe" class="alerte-paragraphe"></p>
            <button class="btn button play" onclick="fermerAlerteVictoire()">Fermer</button>
        </div>
    </div>
    
</body>
    <script>changeHour()</script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script type="text/javascript" src="librairy/index.js"></script>
</html>