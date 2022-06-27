<?php

namespace App;

class BowlingGame 
{
    const TURNOS_POR_GAME = 10;

    protected array $rolls = [];

    public function roll(int $pinos)
    {
        $this->rolls[] = $pinos;
    }

    public function score()
    {
        $score = 0; 
        $roll = 0;

        foreach (range(1, self::TURNOS_POR_GAME) as $turno) {
            
            if($this->isStrike($roll)){
                $score += $this->rolls[$roll] + $this->addStrikeBonus($roll);
                $roll += 1;
                continue;
            }

            $score += $this->defaultTurnoScore($roll);
            
            if($this->isSpare($roll)){
                $score += $this->addSpareBonus($roll);
            }

            $roll += 2;
            
        }

        return $score;
    }
 
    public function isStrike($roll)
    {
        return $this->rolls[$roll] === 10;
    }

    public function isSpare($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll+1] === 10;
    }

    public function defaultTurnoScore($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    public function addSpareBonus($roll)
    {
        return $this->rolls[$roll + 2];
    }

    public function addStrikeBonus($roll)
    {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }
}