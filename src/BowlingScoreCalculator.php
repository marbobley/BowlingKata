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

        for($i = 0; $i < count($array); $i = $i + 2){
            $currentScoreLancer1 = $array[$i];
            if($this->isItStrike($currentScoreLancer1) && array_key_exists($i+2, $array))
            {
                if($this->isItStrike($array[$i + 2]) && array_key_exists($i+4, $array))
                {
                    $scoreTotal += $currentScoreLancer1 + $array[$i+2] + $array[$i+4];
                }
                else
                {
                    if(array_key_exists($i+3, $array))
                        $scoreTotal += $currentScoreLancer1 + $array[$i+2] + $array[$i+3];
                    else
                        $scoreTotal += $currentScoreLancer1 + $array[$i+2];
                }
            }
            else if(array_key_exists($i+1, $array) && $this->isItSpare($currentScoreLancer1, $array[$i+1]))
            {
                if(array_key_exists($i+2, $array))
                {
                    $scoreTotal += $this->SommeFrame($currentScoreLancer1, $array[$i+1]) + $array[$i+2];
                }else
                {
                    $scoreTotal += $this->SommeFrame($currentScoreLancer1, $array[$i+1]);
                }
            }
            else
            {
                if(array_key_exists($i+1, $array))
                    $scoreTotal += $this->SommeFrame($currentScoreLancer1, $array[$i+1]);
                else
                    $scoreTotal += $currentScoreLancer1;
            }
        }

        return $scoreTotal;
    }

    /**
     * @param $array
     * @return bool
     */
    public function isItStrike($score): bool
    {
        return $score == 10;
    }

    /**
     * @param array $array
     * @param mixed $i
     * @return bool
     */
    public function isItSpare(int $scoreLancer1, int $scoreLancer2): bool
    {
        return ($scoreLancer1 + $scoreLancer2 == 10);
    }

    /**
     * @param array $array
     * @param mixed $i
     * @return mixed
     */
    public function SommeFrame(int $scoreLancer1, int $scoreLancer2): mixed
    {
        return $scoreLancer1 + $scoreLancer2;
    }
}