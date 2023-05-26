<?php

namespace App\GraphQL\Mutations;

use App\Models\GameSession;
use App\Models\MemoTest;

class GameSessionMutator
{
    /**
     * Start a new game session.
     *
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function start($_, array $args)
    {
        $memotest = MemoTest::findOrFail($args['memoTestId']);

        $gameSession = new GameSession([
            'state' => 'Started',
            'memo_test_id' => $memotest->id,
            'number_of_pairs' => $args['numberOfPairs'],
        ]);
        $gameSession->save();

        return $gameSession->fresh();
    }

    /**
     * End a game session.
     *
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function end($_, array $args)
    {
        $gameSession = GameSession::findOrFail($args['gameSessionId']);

        $gameSession->score = ceil(($gameSession->number_of_pairs / $gameSession->retries) * 100);
        $gameSession->state = 'Completed';
        $gameSession->save();
    
        return $gameSession;
    }

    /**
     * Add one to the retries_num for a GameSession.
     *
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function addTry($_, array $args)
    {
        $gameSession = GameSession::findOrFail($args['gameSessionId']);
        $gameSession->increment('retries');
        
        return $gameSession->fresh();
    }
}
