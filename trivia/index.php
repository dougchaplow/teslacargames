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
        var questions = {
            "questions": [{
                "question": "what is the speed of an fully laden swallow?",
                "answer": "African or European?",
                "distractors": [{
                    "distractor": "Distract 1"
                },
                    {
                        "distractor": "Distract 2"
                    },
                    {
                        "distractor": "Distract 3"
                    }
                ]
            },
                {
                    "question": "What do you call a newspaper in the fireplace?",
                    "answer": "A log.",
                    "distractors": [{
                            "distractor": "Distract 1"
                        },
                        {
                            "distractor": "Distract 2"
                        },
                        {
                            "distractor": "Distract 3"
                        }
                    ]
                }
            ]
        };

        $(document).ready(function(){
            init();

            $('#answer_container .btn').on('click', function(e){
                if (false === $(e.currentTarget).data('distractor')) {
                    $("#message_box").text('Good Job');
                } else {
                    tryAgain();
                }
            });
        });

        function init()
        {
            loadQuestions();
            executeQuestions();

        }

        function executeQuestions()
        {
            //put the question into the page
            var current_question = questions.questions[0];
            $('#question').text(current_question.question);
            var button = $("<button>", {"class": "btn btn-info", "data-distractor":"false"});
            button.text(current_question.answer);
            $("#answer_container").append(button);
            questions.questions[0].distractors.forEach(function(obj){
                button = $("<button>", {"class": "btn btn-info", "data-distractor":"true"});
                button.text(obj.distractor);
                $("#answer_container").append(button);
            });

        }

        function tryAgain() {
            $('#message_box').text('Try Again');
            $('#message_box').animate({
                    opacity: "toggle"
                }, 100, "linear", function() {
                    $(this).after($(this).animate({opacity:"toggle"}, 100, "linear"));
            });
        }

        function loadQuestions()
        {
            //load external questions here
        }
    </script>
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

<div class="container">
    <div class="row">Tesla Trivia</div>
    <div class="col-xs-12">
        <div class="col" id="question"><p>Question Here</div>
    </div>
    <div class="col-xs-12" id="answer_container">

    </div>

    <div class="col-xs-12" id="message_box" style="display:none;">
        <p id="message_text"></p>
    </div>
</div>
</body>
</html>