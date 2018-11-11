<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
    <style>
        .bingo_tile {
            height: 200px;
        }
    </style>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/ion/dist/ion-min.js"></script>


</head>
<body>
<div class=columns">
    <div class="column" id="type_selection_menu">
        <p>Tesla Car Games</p>
    </div>
</div>
<div class="columns">
    <div class="column"><a class="button" href="/bingo">Telsa Bingo</a></div>
    <div class="column"><a class="button" href="/tic-tac-toe">Tesla Tic-Tac-Toe</a></div>
    <div class="column"><a class="button" href="/license-plate-game">Tesla License Plates Game</a></div>
    <div class="column"><a class="button" href="/coloring-book">Tesla Coloring Book</a></div>
    <div class="column"><a class="button" href="/adventure">Tesla Adventure</a></div>
</div>

<canvas id="ioncanvas"></canvas>
<script>
     new Ion('ioncanvas', [{
        size: 5,
        density: 60,
        spawnRate: 30
    },
        { size: 15,
            density: 30,
            spawnRate: 20
        },
        { size: 60,
            density: 15,
            spawnRate: 10
        }
]);
</script>
</body>
</html>