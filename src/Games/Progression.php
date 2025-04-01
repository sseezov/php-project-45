<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What number is missing in the progression?';

function run(): void
{
    $gameData = [];
    $length = 10;
    for ($counter = 0; $counter < ROUNDS_COUNT; $counter += 1) {
        $start = rand(1, 70);
        $step = rand(2, 10);
        $hiddenElementPosition = rand(0, $length - 1);
        $progression = [];
        for ($i = 0; $i < $length; $i += 1) {
            if ($i == $hiddenElementPosition) {
                $progression[$i] = '..';
            } else {
                $progression[$i] = $start + $step * $i;
            }
        }
        $question = implode(' ', $progression);
        $correctAnswer = (string) ($start + $step * $hiddenElementPosition);
        $gameData[] = [$question, $correctAnswer];
    };
    runGame(DESCRIPTION, $gameData);
}
