<?php

require __DIR__ . "/../src/BowlingScoreCalculator.php";
$scoreBOw = new BowlingScoreCalculator();
$score = $scoreBOw->getBowlingScore([10,0,10,0,10,0,10,0,10,0,10,0,10,0,10,0,10,0,10,10,10]);
echo $score;