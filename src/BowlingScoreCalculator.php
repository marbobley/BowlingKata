<?php


class BowlingScoreCalculator
{
    public function getBowlingScore(array $array): int
    {
        $scoreTotal = 0;
        if(count($array) == 0)
        {
            return 0;
        }
        if(count($array) == 1)
        {
            return $array[0];
        }

        $currentIndex = 0;
        for($i = 0; $i < count($array); $i = $i + 2){
            if($array[$i]== 10 && array_key_exists($i+2, $array))
            {
                if($array[$i+2] == 10 && array_key_exists($i+4, $array))
                {
                    $scoreTotal += $array[$i] + $array[$i+2] + $array[$i+4];
                }
                else
                {
                    if(array_key_exists($i+3, $array))
                        $scoreTotal += $array[$i] + $array[$i+2] + $array[$i+3];
                    else
                        $scoreTotal += $array[$i] + $array[$i+2];
                }
            }
            else if(array_key_exists($i+1, $array) && ($array[$i] + $array[$i+1] == 10)  ){
                if(array_key_exists($i+2, $array))
                {
                    $scoreTotal += $array[$i] + $array[$i+1] + $array[$i+2];
                }else
                {
                    $scoreTotal += $array[$i] + $array[$i+1];
                }
            }
            else{
                if(array_key_exists($i+1, $array))
                    $scoreTotal += $array[$i] + $array[$i+1];
                else
                    $scoreTotal += $array[$i];
            }
        }

        return $scoreTotal;
    }
}