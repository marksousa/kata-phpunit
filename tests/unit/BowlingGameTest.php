<?php

use PHPUnit\Framework\TestCase;
use App\BowlingGame;

/**
 * BowlingGameTest
 * @group group
 */
class BowlingGameTest extends TestCase
{
    /** @test */
    public function score_se_derrubar_0_pino_em_todos_os_lancamentos_disponiveis()
    {
        $game = new BowlingGame();

        foreach (range(1,20) as $roll) { 
            $game->roll(0);
        }

        $this->assertSame(0, $game->score());
    }

    /** @test */
    public function score_se_derrubar_1_pino_em_todos_os_lancamentos_disponiveis()
    {
        $game = new BowlingGame();

        foreach (range(1,20) as $lancamento) { 
            $game->roll(1);
        }

        $this->assertSame(20, $game->score());
    }

    /** @test */
    public function score_bonus_para_spare()
    {
        $game = new BowlingGame();
        
        $game->roll(5);
        $game->roll(5); // Spare
        
        $game->roll(8); // Roll 1 Bonus

        foreach(range(1,17) as $lancamento){
            $game->roll(0);
        }

        $this->assertSame(26, $game->score());
    }

    /** @test */
    public function score_bonus_para_strike()
    {
        $game = new BowlingGame();
        
        $game->roll(10); //strike
        
        $game->roll(5); // Roll 1 Bonus
        $game->roll(2);  // Roll 2 Bonus
        
        foreach(range(1,16) as $lancamento){
            $game->roll(0);
        }

        $this->assertSame(24, $game->score());
    }
    
    
    /** @test */
    public function score_bonus_para_spare_no_decimo_turno()
    {
        $game = new BowlingGame();

        foreach (range(1,18) as $key => $roll) {
            $game->roll(0);
        }

        $game->roll(5);
        $game->roll(5); // Spare

        $game->roll(5); // ExtraBall

        $this->assertSame(15, $game->score());
    }

    /** @test */
    public function score_bonus_para_strike_no_decimo_turno()
    {
        $game = new BowlingGame();

        foreach (range(1,18) as $key => $roll) {
            $game->roll(0);
        }

        $game->roll(10); // Strike
        
        $game->roll(10);
        $game->roll(10);

        $this->assertSame(30, $game->score());
    }

    /** @test */
    public function score_para_jogo_perfeito()
    {
        $game = new BowlingGame();

        foreach(range(1,12) as $roll){
            $game->roll(10);
        }

        $this->assertSame(300, $game->score());
    }
    

}