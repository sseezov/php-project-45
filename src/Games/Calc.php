<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What is the result of the expression?';

function calculate(string $operator, int $number1, int $number2): int
{
    switch ($operator) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
        default:
            throw new \Exception("Unknown operator: {$operator}");
    }
}

function run(): void
{
    $operations = ['+', '-', '*'];
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $operator = $operations[array_rand($operations)];

        $a = rand(1, 10);
        $b = rand(1, 10);

        $question = "$a $operator $b";
        $correctAnswer = (string) (calculate($operator, $a, $b));

        $gameData[] = [$question, $correctAnswer];
    }
    ;

    runGame(DESCRIPTION, $gameData);
}
