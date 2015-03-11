<?php

    require_once "src/RockPaperScissors.php";

    class RockPaperScissorsTest extends PHPUnit_Framework_TestCase
    {

        function test_shoot_rs()
        {
            //Arrange
            $test_RockPaperScissors = new RockPaperScissors;
            $input1 = "rock";
            $input2 = "scissors";

            //Act
            $result = $test_RockPaperScissors->shoot($input1, $input2);

            //Assert
            $this->assertEquals("Player 1", $result);
        }

    }
?>
