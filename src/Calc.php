<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;

function runCalc(): void
{
  line('Welcome to the Brain Games!');
  $name = prompt("May I have your name?\n", '', '');
  line("Hello, $name!");
  line('What is the result of the expression?');
  $operation = ['-', '+', '*'];
  function calcAnswer($n1, $n2, $operator)
  {
    if ($operator === '+') {
      return strval($n1 + $n2);
    }
    if ($operator === '-') {
      return strval($n1 - $n2);
    }
    return strval($n1 * $n2);
  }

  for ($i = 0; $i < 3; $i++) {
    $num1 = rand(0, 50);
    $num2 = rand(0, 50);
    $currOperation = $operation[rand(0, 2)];
    $correctAnswer = calcAnswer($num1, $num2, $currOperation);

    line("Question: $num1 $currOperation $num2");
    $answer = prompt("Your answer\n", '', '');
    if ($answer !== $correctAnswer) {
      line("\"$answer\" is wrong answer ;(. Correct answer was \"$correctAnswer\".");
      line("Let's try again, $name!");
      return;
    }
    line("Correct!");
  }
  line("Congratulations, $name!");
}
