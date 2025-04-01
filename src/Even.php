<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function runEven(): void
{
  line('Welcome to the Brain Games!');
  $name = prompt("May I have your name?\n", '', '');
  line("Hello, $name!");
  line('Answer "yes" if the number is even, otherwise answer "no".');

  function isEven(int $n): bool
  {
    return $n % 2 === 0 ? true : false;
  }

  for ($i = 0; $i < 3; $i++) {
    $value = rand(0, 100);
    $correctAnswer = isEven($value) ? 'yes' : 'no';

    line("Question: $value");
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
