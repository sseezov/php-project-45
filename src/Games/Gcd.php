<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run(): void
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $a = rand(2, 50);
        $b = rand(10, 100);
        $question = "$a $b";
        $correctAnswer = (string) (getGcd($a, $b));
        $gameData[] = [$question, $correctAnswer];
    }
    runGame(DESCRIPTION, $gameData);
}
function getGcd(int $a, int $b): int
{
    if ($b !== 0) {
        return getGcd($b, $a % $b);
    }
    return $a;
}
