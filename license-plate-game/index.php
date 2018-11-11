<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style>
        .bingo_tile {
            height: 200px;
        }

        #red {
            background-color: #f00;
        }

        #blue {
            background-color: #296aff;
        }

        #green {
            background-color: #41ff6d;
        }

        #purple {
            background-color: #f56eff;
        }

        #orange {
            background-color: #ff9f26;
        }
    </style>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    <script>
        var selected_color;
        var player_name;
        var frame_color;
        var score   = [];
        var players = ['red', 'blue', 'green', 'purple', 'orange'];

        $(document).ready(function () {
            init();
        });

        function setScore(player_name)
        {
            if (score[player_name]) {
                $('#score_' + player_name).text(score[player_name]);
            } else {
                $('#score_' + player_name).text('');
            }
        }

        function resetAllScores()
        {
            score = [];
            players.forEach(function(val){
                setScore(val);
            });
        }

        function init() {
            var states = ['Alabama', 'Alaska', 'American Samoa', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut',
                'Delaware', 'District of Columbia', 'Federated States of Micronesia', 'Florida', 'Georgia', 'Guam', 'Hawaii',
                'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Marshall Islands', 'Maryland',
                'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
                'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Northern Mariana Islands', 'Ohio', 'Oklahoma',
                'Oregon', 'Palau', 'Pennsylvania', 'Puerto Rico', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas',
                'Utah', 'Vermont', 'Virgin Island', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];

            states.forEach(function (elm, index) {
                var $div   = $("<div>", {id: "state_" + index, "class": "col col-xs-2 mr-2 mb-2"});
                var $state = $("<p>", {"class": "state_text btn border border-dark rounded", "data-player":""});
                $state.text(states[index]);
                $div.append($state);
                $state.click(function (e) {
                    if (player_name !== $(e.target).data('player')) {
                        var current_player_name = $(e.target).data('player');
                        if (score[current_player_name]) {
                            score[current_player_name] = score[current_player_name] - 1;
                            setScore(current_player_name, score);
                        }
                        $(e.target).css('background-color', frame_color);
                        $(e.target).data('player', player_name);
                        //update player score
                        if (score[player_name]) {
                            score[player_name] = score[player_name] + 1;
                        } else {
                            score[player_name] = 1;
                        }
                        setScore(player_name, score);
                    }
                });

                $("#states").append($div);
            });

            $('.color_select').click(function (e) {
                selected_color = e.currentTarget.id;
                switch (selected_color) {
                    case 'red':
                        player_name = 'red';
                        frame_color = '#f00';
                        break;
                    case 'blue':
                        player_name = 'blue';
                        frame_color = '#00f';
                        break;
                    case 'green':
                        player_name = 'green';
                        frame_color = '#0f0';
                        break;
                    case 'purple':
                        player_name = 'purple';
                        frame_color = '#ff2bf2';
                        break;
                    case 'orange':
                        player_name = 'orange';
                        frame_color = '#ff9f26';
                        break;
                    default:
                        player_name = '';
                        frame_color = '#fff';
                        break;
                }
            });

            $('.reset').click(function () {
                $('.state_text').css('background-color', '#fff');
                resetAllScores();
            });
        }
    </script>
</head>
<body>
<div class=columns">
    <div class="column" id="type_selection_menu">
        <p>Tesla Car Games</p>
    </div>
</div>
<div class="container">

<div class="row">
    <div class="col col-xs-1">
        <div class="color_select btn" id="red">Red Player
            <span class="badge badge-light" id="score_red"></span>
        </div>
    </div>
    <div class="col col-xs-1">
        <div class="color_select btn" id="blue">Blue Player
            <span class="badge badge-light" id="score_blue"></span>
        </div>
    </div>
    <div class="col col-xs-1">
        <div class="color_select btn" id="green">Green Player
            <span class="badge badge-light" id="score_green"></span>
        </div>
    </div>
    <div class="col col-xs-1">
        <div class="color_select btn" id="purple">Purple Player
            <span class="badge badge-light" id="score_purple"></span>
        </div>
    </div>
    <div class="col col-xs-1">
        <div class="color_select btn" id="orange">Orange Player
            <span class="badge badge-light" id="score_orange"></span>
        </div>
    </div>
    <div class="col col-xs-1">
        <div class="color_select btn btn-outline-dark" id="single">Reset Single Tile</div>
    </div>
    <div class="col col-xs-1">
        <div class="reset btn btn-outline-success" id="all">Reset All Tiles</div>
    </div>
</div>
    <hr />
    <div class="row">&nbsp;</div>
<div class="row">
    <div class="row" id="states">

    </div>
</div>
</div>
</body>
</html>