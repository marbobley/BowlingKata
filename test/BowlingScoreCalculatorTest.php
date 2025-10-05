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
            [[5],     5],
            [[6],     6],
            [[7],     7],
            [[8],     8],
            [[9],     9],
            [[10],     10],
            [[1,1],     2],
            [[1,1,2,2,3,3],12],
            [[1,1,2,2,3,3,4,4],20],
            [[1,1,2,2,3,3,4,4,5,5,0,6],36],
            [[1,1,2,2,3,3,4,4,5,5,0,6,7,0],43],
            [[6,4,5,5,6,0] ,37],
            [[6,4,5,5,0] ,25],
            [[1,9,3,7,4,6,5] ,47],
            [[1,1,2,2,3,3,4,4,5,5],30],
            [[1,1,2,2,3,3,4,4,5,5,0,6,7,0,6,4],53],
            [[10,0,10,0,10,0,10,0,0,0],90],
            [[10,0,10,0,10,0,10,0,10,0,10,0,10,0,10,0,0,0],210],
            [[10,0,5,3,7,2,10,0,5,2,0,0,0],59],
            [[10,0,10,0,10,0,10,0,10,0,10,0,10,0,10,0,10,0,10,10,10],300]
        ];
    }


    #[DataProvider('providerData')]
    public function testWhenCalculateWithEmptyArray_thenBowlingScoreCalculatorReturn0(array $score, int $expectedResult){
        $bowlingCalculator = new BowlingScoreCalculator();

        $result = $bowlingCalculator->getBowlingScore($score);
        $this->assertEquals($expectedResult, $result);
    }
}
