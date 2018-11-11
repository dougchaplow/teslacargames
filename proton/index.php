<!DOCTYPE HTML>
<html>
<head>
    <title>proton.js-emitter-Emitter</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <style type="text/css">
        body {
            font-family: Monospace;
            background-color: #f0f0f0;
            margin: 0px;
            overflow: hidden;
        }
        #testCanvas {
            background: #000000;
        }
    </style>
</head>
<body>
<canvas id="protonCanvas"></canvas>
<script src="../js/Proton/build/proton.js"></script>
<script>
    var canvas;
    var context;
    var proton;
    var renderer;
    var emitter;
    var stats;

    Main();
    function Main() {
        canvas = document.getElementById("protonCanvas");
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        context = canvas.getContext('2d');
        //addStats();

        createProton();
        tick();
        window.onresize = function(e) {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            emitter.p.x = canvas.width / 2;
            emitter.p.y = canvas.height / 2;
        }
    }

    function addStats() {
        stats = new Stats();
        stats.setMode(2);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.body.appendChild(stats.domElement);
    }

    function createProton() {
        proton = new Proton();
        emitter = new Proton.Emitter();
        emitter.rate = new Proton.Rate(new Proton.Span(10, 20), new Proton.Span(.1, .25));
        emitter.addInitialize(new Proton.Mass(1));
        emitter.addInitialize(new Proton.Radius(1, 12));
        emitter.addInitialize(new Proton.Life(2, 4));
        emitter.addInitialize(new Proton.Velocity(new Proton.Span(2, 4), new Proton.Span(-30, 30), 'polar'));
        emitter.addBehaviour(new Proton.RandomDrift(30, 30, .05));
        emitter.addBehaviour(new Proton.Color('ff0000', 'random', Infinity, Proton.easeOutQuart));
        emitter.addBehaviour(new Proton.Scale(1, 0.7));
        emitter.p.x = canvas.width / 2;
        emitter.p.y = canvas.height / 2;
        emitter.emit();

        proton.addEmitter(emitter);

        renderer = new Proton.CanvasRenderer(canvas);
        renderer.onProtonUpdate = function() {
            context.fillStyle = "rgba(0, 0, 0, 0.1)";
            context.fillRect(0, 0, canvas.width, canvas.height);
        };

        proton.addRenderer(renderer);
    }

    function tick() {
        requestAnimationFrame(tick);

        //stats.begin();
        emitter.rotation += 1.5;
        proton.update();
        //stats.end();
    }
</script>
</body>
</html>