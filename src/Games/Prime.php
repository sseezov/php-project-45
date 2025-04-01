<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run(): void
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $number = rand(2, 47);

        $question = $number;
        $correctAnswer = isPrime($number) ? 'yes' : 'no';

        $gameData[] = [$question, $correctAnswer];
    };

    runGame(DESCRIPTION, $gameData);
}

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }
    if ($num == 2 || $num == 3) {
        return true;
    }

    for ($i = 2; $i <= sqrt($num); $i += 1) {
        if ($num % $i == 0) {
            return false;
        }
    }

    return true;
}
