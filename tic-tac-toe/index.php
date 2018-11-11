<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css"/>
    <style>
        .bingo_tile {
            height: 200px;
        }

        .mark {
            height: 200px;
            background-color: #fff;
            font-size: 190px;
            line-height: 1;
        }
        .square {
            position: relative;
        }

        .x {
            background-color: #ffe079;

        }

        .o {
            background-color: #94beff;

        }
        .blank {
            background-color: #fff;

        }
    </style>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">

    </script>

    <script>
        $(document).ready(function(){
            $('.mark').click(function(e){
                var state = $(e.currentTarget).data('state');
                switch (state) {
                    case 'blank':
                        $(e.currentTarget).data('state', 'x');
                        $(e.currentTarget).removeClass('blank');
                        $(e.currentTarget).removeClass('o');
                        $(e.currentTarget).addClass('x');
                        break;
                    case 'x':
                        $(e.currentTarget).data('state', 'o');
                        $(e.currentTarget).removeClass('blank');
                        $(e.currentTarget).removeClass('x');
                        $(e.currentTarget).addClass('o');
                        break;
                    case 'o':
                        $(e.currentTarget).data('state', 'blank');
                        $(e.currentTarget).removeClass('x');
                        $(e.currentTarget).removeClass('o');
                        $(e.currentTarget).addClass('blank');
                        break;
                    default:
                }
            });
        });
    </script>

</head>
<body>
<div class=columns">
    <div class="column" id="type_selection_menu">
        <p>Tesla Car Games</p>
    </div>
</div>
<div class="container has-background-white">
    <div class="column is-8 has-background-black">
        <div class="columns">
            <div class="column square">
                <div class="mark blank" data-state="blank"></div>
            </div>
            <div class="column square" style="position: relative;">
                <div class="mark blank" data-state="blank"></div>
            </div>
            <div class="column square">
                <div class="mark blank" data-state="blank"></div>
            </div>
        </div>
        <div class="columns">
            <div class="column square">
                <div class="mark blank" data-state="blank"></div>
            </div>
            <div class="column square" style="position: relative;">
                <div class="mark blank" data-state="blank"></div>
            </div>
            <div class="column square">
                <div class="mark blank" data-state="blank"></div>
            </div>
        </div>
        <div class="columns">
            <div class="column square">
                <div class="mark blank" data-state="blank"></div>
            </div>
            <div class="column square" style="position: relative;">
                <div class="mark blank" data-state="blank"></div>
            </div>
            <div class="column square">
                <div class="mark blank" data-state="blank"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>