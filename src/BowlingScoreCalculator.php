<?php


class BowlingScoreCalculator
{
    public function getBowlingScore(array $array): int
    {
        $scoreTotal = 0;

        foreach ($array as $score){
           $scoreTotal += $score;
        }

        return $scoreTotal;
    }
}