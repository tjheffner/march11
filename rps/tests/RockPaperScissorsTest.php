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
        function test_shoot_rp()
        {
            //Arrange
            $test_RockPaperScissors = new RockPaperScissors;
            $input1 = "rock";
            $input2 = "paper";

            //Act
            $result = $test_RockPaperScissors->shoot($input1, $input2);

            //Assert
            $this->assertEquals("Player 2", $result);
        }
        function test_shoot_ps()
        {
            //Arrange
            $test_RockPaperScissors = new RockPaperScissors;
            $input1 = "paper";
            $input2 = "scissors";

            //Act
            $result = $test_RockPaperScissors->shoot($input1, $input2);

            //Assert
            $this->assertEquals("Player 2", $result);
        }
        function test_shoot_sr()
        {
            //Arrange
            $test_RockPaperScissors = new RockPaperScissors;
            $input1 = "scissors";
            $input2 = "rock";

            //Act
            $result = $test_RockPaperScissors->shoot($input1, $input2);

            //Assert
            $this->assertEquals("Player 2", $result);
        }
        function test_shoot_pr()
        {
            //Arrange
            $test_RockPaperScissors = new RockPaperScissors;
            $input1 = "paper";
            $input2 = "rock";

            //Act
            $result = $test_RockPaperScissors->shoot($input1, $input2);

            //Assert
            $this->assertEquals("Player 1", $result);
        }
        function test_shoot_sp()
        {
            //Arrange
            $test_RockPaperScissors = new RockPaperScissors;
            $input1 = "scissors";
            $input2 = "paper";

            //Act
            $result = $test_RockPaperScissors->shoot($input1, $input2);

            //Assert
            $this->assertEquals("Player 1", $result);
        }
        function test_shoot_draw()
        {
            //Arrange
            $test_RockPaperScissors = new RockPaperScissors;
            $input1 = "scissors";
            $input2 = "scissors";

            //Act
            $result = $test_RockPaperScissors->shoot($input1, $input2);

            //Assert
            $this->assertEquals("Draw", $result);
        }
        
    }
?>
