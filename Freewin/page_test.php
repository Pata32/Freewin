<!DOCTYPE html>
<html>
<head>
    <title>Exemple de roulette avec Winwheel.js</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Winwheel/1.5.0/Winwheel.min.js"></script>
</head>
<body>
    <canvas id="canvas" width="500" height="500"></canvas>
    <button id="spin">Tourner la roulette</button>

    <script>
        var segments = [
            {fillStyle: '#eae56f', text: 'Segment 1'},
            {fillStyle: '#89f26e', text: 'Segment 2'},
            {fillStyle: '#7de6ef', text: 'Segment 3'},
            {fillStyle: '#e7706f', text: 'Segment 4'},
            {fillStyle: '#eae56f', text: 'Segment 5'},
            {fillStyle: '#89f26e', text: 'Segment 6'},
            {fillStyle: '#7de6ef', text: 'Segment 7'},
            {fillStyle: '#e7706f', text: 'Segment 8'}
        ];

        var canvas = document.getElementById('canvas');
        var wheel = new Winwheel({
            canvasId: 'canvas',
            numSegments: segments.length,
            segments: segments,
            textFontSize: 20,
            outerRadius: 200,
            innerRadius: 50,
            textAlignment: 'center',
            textMargin: 30,
            animation: {
                type: 'spinToStop',
                duration: 5,
                spins: 8,
                callbackFinished: function() {
                    alert('La roulette s\'est arrêtée sur le segment ' + (wheel.getIndicatedSegment().text));
                }
            }
        });

        document.getElementById('spin').addEventListener('click', function() {
            wheel.startAnimation();
        });
    </script>
</body>
</html>
