<html>
<head>
    <title>Freewin -- La victoire entre vos mains!</title>
    <link rel="stylesheet" href="css/index.css" type="text/css" />
    <link rel="stylesheet" href="css/css.css" type="text/css" />
    <script type="text/javascript" src="librairy\Winwheel.js"></script>
    
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
                                    <canvas id="canvas1" width="434" height="434">
                                        <p style="color: white"> Sorry, your browser doesn't support canvas. Please try another.</p>
                                    </canvas>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class = center>
                                    <button id="btn_spin" class="btn button" onClick="startSpin(1);"> Tourner la roue! </button>
                                    <img id="spin_button"  src="images\spin.png" width="50" height="50" alt="Spin" onClick="resetWheel(1); return false;" />
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
                                    <button id="btn_spin" class="btn button" onClick="startSpin(2);"> Tourner la roue! </button>
                                    <img id="spin_button"  src="images\spin.png" width="50" height="50" alt="Spin" onClick="resetWheel(2); return false;" />
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
                                    <button id="btn_spin" class="btn button" onClick="startSpin(3);"> Tourner la roue! </button>
                                    <img id="spin_button"  src="images\spin.png" width="50" height="50" alt="Spin" onClick="resetWheel(3); return false;" />
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
    
<script type="text/javascript" src="librairy/index.js"></script>
</body>

</html>