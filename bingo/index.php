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

    <script>
         var words             = [];
         words['urban']        = ['Taxi', 'Traffic Light', 'Skyscraper', 'Museum', 'Tattoo Parlor', 'Coffee Shop', 'Street Vendor', 'Mailbox', 'Airport'];
         words['rural']        = ['Solar Panels', 'Barn', 'Fence', 'Creek', 'Farm', 'Tractor', 'Corn Field', 'Fruit Stand', 'Winery', 'Stop Sign', 'Windmill'];
         words['mixed']        = ['School', 'Continence Store', 'Office Park', 'Hotel', 'Gas Station', 'Mall', 'Police car', 'Fire Truck', 'Bridge', 'Overpass'];
         words['interstate']   = ['Power Plant', 'Lake', 'River', 'Exit Sign', 'Police Car', 'Tractor Trailer', 'Disabled Car', 'Bridge', 'Rest Stop', 'Mile Marker', 'Welcome To Sign'];
         words['tesla']        = ['Roadster', 'Starman', 'Elon Himself', 'Model 3', 'Model S', 'Model X', 'Supercharger', 'Tesla Semi', 'P100', 'P85', 'P100D'];

        $('document').ready(function(){
            $(".is-child").click(function(e){
                $(e.currentTarget).toggleClass('has-background-link has-background-warning');

                var state = $(e.currentTarget).data('state');
                switch(state) {
                    case 'on':
                        $(e.currentTarget).data('state', 'off');
                        break;
                    case 'off':
                        $(e.currentTarget).data('state', 'on');
                        break;
                    default:
                        $(e.currentTarget).data('state', 'on');
                }

                checkComplete();
            });

            $('#menu').click(function(){
                resetBoard();
            });

            $('#restart').click(function(){
                resetBoard();
            });

            $('#type_selection_menu .button').click(function(e){
                   var category = e.currentTarget.id;
                   loadData(category);
            });

            loadData('tesla');
        });

        /**
         * Check the board for all tiles selected
         */
        function checkComplete()
        {
            var complete_value = true;
            var tiles        = $('.bingo_tile');
            tiles.each(function(index, obj){
                var selected = $(obj).data('state');
                if ('off' === selected) {
                    complete_value = false;
                }
            });

            if (complete_value) {
                heroScreen();
            }
        }

        /**
         * Plays congrats message and lets user reset board
         */
        function heroScreen()
        {
            $('#hero_overlay').show();
        }

        /**
         * Removes hero screen and resets colors on tiles
         */
        function resetBoard() {
            $('.is-child').removeClass('has-background-warning').addClass('has-background-link');
            $('#hero_overlay').hide();
            var tiles = $('.bingo_tile');
            tiles.each(function (index, obj) {
                $(obj).data('state', 'off');
            });

        }

        /**
         * Loads the selected words into the tiles. Resets tiles.
         */
        function loadData(category) {
            resetBoard();
            var tiles = $('.bingo_text');
            var array = words[category];
            shuffleArray(array);
            tiles.each(function(t, word){
                $(word).text(array[t]);
            });
        }

         /**
          * Fisher-Yates
          * @param array
          */
         function shuffleArray(array) {
             for (let i = array.length - 1; i > 0; i--) {
                 const j = Math.floor(Math.random() * (i + 1));
                 [array[i], array[j]] = [array[j], array[i]];
             }
         }

    </script>
</head>
<body>
<div class=columns">
    <div class="column" id="type_selection_menu">
        <a class="content button" href="/" id="menu">Menu</a>
        <div class="content button" id="urban">Urban</div>
        <div class="content button" id="rural">Rural</div>
        <div class="content button" id="mixed">Mixed</div>
        <div class="content button" id="interstate">Interstate</div>
        <div class="content button" id="tesla">Tesla</div>
    </div>
    <div class="column" style="position: relative;">
        <div class="container">
            <div class="tile is-ancestor">
        <div class="tile is-parent">
            <div class="tile is-child box has-background-link bingo_tile" id="box_1" data-state="off">
                <p class="title bingo_text">Tile 1</p>
            </div>
        </div>
        <div class="tile is-parent">
            <div class="tile is-child box has-background-link bingo_tile" id="box_2" data-state="off">
                <p class="title bingo_text">Tile 2</p>
            </div>
        </div>
        <div class="tile is-parent">
            <div class="tile is-child box has-background-link level bingo_tile" id="box_3" data-state="off">
                <p class="title bingo_text">Tile 3</p>
            </div>
        </div>
    </div>
            <div class="tile is-ancestor">
        <div class="tile is-parent">
            <div class="tile is-child box has-background-link bingo_tile" id="box_4" data-state="off">
                <p class="title bingo_text">Tile 4</p>
            </div>
        </div>
        <div class="tile is-parent">
            <div class="tile is-child box has-background-link bingo_tile" id="box_5" data-state="off">
                <p class="title bingo_text">Tile 5</p>
            </div>
        </div>
        <div class="tile is-parent">
            <div class="tile is-child box has-background-link bingo_tile" id="box_6" data-state="off">
                <p class="title bingo_text">Tile 6</p>
            </div>
        </div>
    </div>
            <div class="tile is-ancestor">
        <div class="tile is-parent">
            <div class="tile is-child box has-background-link bingo_tile" id="box_7" data-state="off">
                <p class="title bingo_text">Tile 7</p>
            </div>
        </div>
        <div class="tile is-parent">
            <div class="tile is-child box has-background-link bingo_tile" id="box_8" data-state="off">
                <p class="title bingo_text">Tile 8</p>
            </div>
        </div>
        <div class="tile is-parent">
            <div class="tile is-child box has-background-link bingo_tile" id="box_9" data-state="off">
                <p class="title bingo_text">Tile 9</p>
            </div>
        </div>
    </div>
        </div>
        <div id="hero_overlay" class="level" style="display:none; position: absolute; top:0; left:0; width: 100%; height: 100%; background-color: #000; opacity: 0.65;">
            <div class="level-item">
                <p>Congratulations. You found all the items.</p>
                <button class="button" id="restart">Restart Game</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>