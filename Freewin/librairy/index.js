
// Create new wheel object specifying the parameters at creation time.
let wheel1 = new Winwheel({
    'canvasId': 'canvas1',
    'numSegments': 2,     // Specify number of segments.
    'outerRadius': 212,   // Set outer radius so wheel fits inside the background.
    'textFontSize': 28,    // Set font size as desired.
    'segments':        // Define segments including colour and text.
        [
            { 'fillStyle': '#FFFFFF', 'text': 'Perdu..' },
            { 'fillStyle': '#FFa500', 'text': 'GAGNE !', 'size': 30}
        ],
    'animation':           // Specify the animation to use.
    {
        'type': 'spinToStop',
        'duration': 5,     // Duration in seconds.
        'spins': 8,     // Number of complete spins.
            'callbackFinished': alertPrize
        },  
});

let wheel2 = new Winwheel({
    'canvasId': 'canvas2',
    'numSegments': 2,     // Specify number of segments.
    'outerRadius': 212,   // Set outer radius so wheel fits inside the background.
    'textFontSize': 28,    // Set font size as desired.
    'segments':        // Define segments including colour and text.
    [
        { 'fillStyle': '#FFFFFF', 'text': 'Perdu..' },
        { 'fillStyle': '#FFa500', 'text': 'GAGNE !', 'size': 15}
    ],
    'animation':           // Specify the animation to use.
    {
        'type': 'spinToStop',
        'duration': 5,     // Duration in seconds.
        'spins': 8,     // Number of complete spins.
            'callbackFinished': alertPrize
        }
});

let wheel3 = new Winwheel({
    'canvasId': 'canvas3',
    'numSegments': 2,     // Specify number of segments.
    'outerRadius': 212,   // Set outer radius so wheel fits inside the background.
    'textFontSize': 28,    // Set font size as desired.
    'segments':        // Define segments including colour and text.
    [
        { 'fillStyle': '#FFFFFF', 'text': 'Perdu..' },
        { 'fillStyle': '#FFa500', 'text': 'GAGNE !', 'size': 5}
    ],
    'animation':           // Specify the animation to use.
    {
        'type': 'spinToStop',
        'duration': 5,     // Duration in seconds.
        'spins': 8,     // Number of complete spins.
            'callbackFinished': alertPrize
        }
});


// Vars used by the code in this page to do power controls.
let wheelPower = 0;
let wheelSpinning = false;

// -------------------------------------------------------
// Function to handle the onClick on the power buttons.
// -------------------------------------------------------

/*
function powerSelected(wheelNumber, powerLevel) {
    let wheel;
    if (wheelNumber === 1) {
        wheel = wheel1;
    } else if (wheelNumber === 2) {
        wheel = wheel2;
    } else if (wheelNumber === 3) {
        wheel = wheel3;
    }
    // Ensure that power can't be changed while wheel is spinning.
    if (wheelSpinning == false) {
        // Reset all to grey incase this is not the first time the user has selected the power.
        document.getElementById('pw1').className = "";
        document.getElementById('pw2').className = "";
        document.getElementById('pw3').className = "";

        // Now light up all cells below-and-including the one selected by changing the class.
        if (powerLevel >= 1) {
            document.getElementById('pw1').className = "pw1";
        }

        if (powerLevel >= 2) {
            document.getElementById('pw2').className = "pw2";
        }

        if (powerLevel >= 3) {
            document.getElementById('pw3').className = "pw3";
        }

        // Set wheelPower var used when spin button is clicked.
        wheelPower = powerLevel;

        // Light up the spin button by changing it's source image and adding a clickable class to it.
        document.getElementById('spin_button').src = "images/spin.png";
        document.getElementById('spin_button').className = "clickable";
    }
}
*/

// -------------------------------------------------------
// Click handler for spin button.
// -------------------------------------------------------
function startSpin(wheelNumber) {
    let wheel;
    if (wheelNumber === 1) {
        wheel = wheel1;
    } else if (wheelNumber === 2) {
        wheel = wheel2;
    } else if (wheelNumber === 3) {
        wheel = wheel3;
    }
    // Ensure that spinning can't be clicked again while already running.
    if (wheelSpinning == false) {
        // Based on the power level selected adjust the number of spins for the wheel, the more times is has
        // to rotate with the duration of the animation the quicker the wheel spins.
        if (wheelPower == 1) {
            wheel.animation.spins = 3;
        } else if (wheelPower == 2) {
            wheel.animation.spins = 8;
        } else if (wheelPower == 3) {
            wheel.animation.spins = 15;
        }
        
        // Disable the spin button so can't click again while wheel is spinning.
        document.getElementById('spin_button').src = "images/spin.png";
        document.getElementById('spin_button').className = "";

        // Begin the spin animation by calling startAnimation on the wheel object.
        wheel.startAnimation();

        // Set to true so that power can't be changed and spin button re-enabled during
        // the current animation. The user will have to reset before spinning again.
        wheelSpinning = true;
    }
}

// -------------------------------------------------------
// Function for reset button.
// -------------------------------------------------------
function resetWheel(wheelNumber) {
    let wheel;
    
    // Identifier quelle roulette doit être réinitialisée en fonction du paramètre wheelNumber
    if (wheelNumber === 1) {
        wheel = wheel1;
    } else if (wheelNumber === 2) {
        wheel = wheel2;
    } else if (wheelNumber === 3) {
        wheel = wheel3;
    }
    wheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
    wheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
    wheel.draw();                // Call draw to render changes to the wheel.

    wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
}

// -------------------------------------------------------
// Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters
// note the indicated segment is passed in as a parmeter as 99% of the time you will want to know this to inform the user of their prize.
// -------------------------------------------------------
function alertPrize(indicatedSegment) {
    // Do basic alert of the segment text. You would probably want to do something more interesting with this information.
    alert("You have won " + indicatedSegment.text);
}