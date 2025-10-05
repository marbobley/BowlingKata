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
        for($i = 0; $i < count($array); $i++){
            if(array_key_exists($i+1, $array))
            {
                if($array[$i] + $array[$i+1] == 10){
                    if(array_key_exists($i+2, $array))
                    {
                        $scoreTotal += $array[$i] + $array[$i+1] + $array[$i+2];
                    }else
                    {
                        $scoreTotal += $array[$i] + $array[$i+1];
                    }
                    $i++;
                }
                else{
                    $scoreTotal += $array[$i];
                }
            }
            else{
                $scoreTotal += $array[$i];
            }
        }

        return $scoreTotal;
    }
}