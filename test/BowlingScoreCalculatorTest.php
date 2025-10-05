<?php

namespace test\test;
require __DIR__ . "/../src/BowlingScoreCalculator.php";
use BowlingScoreCalculator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class BowlingScoreCalculatorTest extends TestCase
{
    public static function providerData(): array
    {
        return [
            [[0],     0],
            [[],     0],
            [[1],     1],
            [[2],     2],
            [[3],     3],
            [[4],     4],
            [[5],     5]
        ];
    }


    #[DataProvider('providerData')]
    public function testWhenCalculateWithEmptyArray_thenBowlingScoreCalculatorReturn0(array $score, int $expectedResult){
        $bowlingCalculator = new BowlingScoreCalculator();

        $result = $bowlingCalculator->getBowlingScore($score);
        $this->assertEquals($expectedResult, $result);
    }

    public function testWith1Score_thenReturnScore(){
        $bowlingCalculator = new BowlingScoreCalculator();
        $result = $bowlingCalculator->getBowlingScore([10]);
        $this->assertEquals(10, $result);
    }

    /*public function testWhenCalculateWithAllStrikes_thenReturnScoreOf300(){
        $bowlingCalculator = new BowlingScoreCalculator();

        $result = $bowlingCalculator->getBowlingScore([10,10,10,10,10,10,10,10,10,10,10,10]);
        $this->assertEquals(300, $result);

    }*/
}
