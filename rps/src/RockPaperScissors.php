<?php

    class RockPaperScissors
    {

        function shoot($input1, $input2)
        {
            if ((($input1 == "rock") && ($input2 == "scissors")) ||
                    (($input1 == "paper") && ($input2 == "rock")) ||
                    (($input1 == "scissors") && ($input2 == "paper"))) {
                array_push($_SESSION['winner'], 'player1');
                $_SESSION['p1count']++;
                return "Player 1";
            }
            elseif ((($input1 == "paper") && ($input2 == "scissors")) ||
                    (($input1 == "scissors") && ($input2 == "rock")) ||
                    (($input1 == "rock") && ($input2 == "paper"))) {
                array_push($_SESSION['winner'], 'player2');
                $_SESSION['p2count']++;
                return "Player 2";
            }
            else {
                $_SESSION['winner'] = array();
                return "No one";
            };

        }

        /* This function is only called on the results page, and is only necessary for
                the score counter to work. */
        function save()
        {
            array_push($_SESSION['winner'], $this);
        }

        /* This resets the counter to 0 when the start page is loaded. */
        static function deleteAll()
        {
            $_SESSION['winner'] = array();
            $p1wins = 0;
            $p2wins = 0;
        }
    }

?>
