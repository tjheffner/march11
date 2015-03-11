<?php

    class RockPaperScissors
    {
        function shoot($input1, $input2)
        {
            if ((($input1 == "rock") && ($input2 == "scissors")) ||
                    (($input1 == "paper") && ($input2 == "rock")) ||
                    (($input1 == "scissors") && ($input2 == "paper"))) {
                return "Player 1";
            }
            elseif ((($input1 == "paper") && ($input2 == "scissors")) ||
                    (($input1 == "scissors") && ($input2 == "rock")) ||
                    (($input1 == "rock") && ($input2 == "paper"))) {
                return "Player 2";
            }
            else {
                return "No one";
            };

        }
        function save()
        {
            array_push($_SESSION['winner'], $this);
        }
        static function getAll()
        {
            return $_SESSION['winner'];
        }
        static function deleteAll()
        {
            $_SESSION['winner'] = array();
        }
    }

?>
