<?php

namespace Tests\Unit;

use App\GraphQL\Mutations\GameSessionMutator;
use App\Models\Session;
use App\Models\GameSession;
use App\Models\MemoTest;
use Tests\TestCase;

class GameSessionMutatorTest extends TestCase
{
    public function testStartMethodCreatesNewGameSession(): void
    {
        // Create a mock Session
        $session = Session::factory()->create([]);

        // Create a mock MemoTest
        $memoTest = MemoTest::factory()->create([
            'name' => 'Test Memo Test',
        ]);

        // Mock the input arguments
        $args = [
            'sessionId' => $session->id,
            'memoTestId' => $memoTest->id,
            'numberOfPairs' => 10,
        ];

        // Create an instance of the GameSessionMutator
        $mutator = new GameSessionMutator();
        $gameSession = $mutator->start(null, $args);

        $this->assertInstanceOf(GameSession::class, $gameSession);
        $this->assertEquals('Started', $gameSession->state);
        $this->assertEquals($memoTest->id, $gameSession->memo_test_id);
        $this->assertEquals(10, $gameSession->number_of_pairs);
    }

    public function testEndMethodUpdatesGameSessionScoreAndState(): void
    {
        // Create a mock Session
        $session = Session::factory()->create([]);

        // Create a mock MemoTest
        $memoTest = MemoTest::factory()->create([
            'name' => 'Test Memo Test',
        ]);

        // Create a mock GameSession
        $gameSession = GameSession::factory()->create([
            'session_id' => $session->id,
            'number_of_pairs' => 20,
            'retries' => 5,
            'memo_test_id' => $memoTest->id
        ]);

        $args = [
            'gameSessionId' => $gameSession->id,
        ];

        // Create an instance of the GameSessionMutator
        $mutator = new GameSessionMutator();
        $mutator->end(null, $args);

        $updatedGameSession = GameSession::find($gameSession->id);
        $this->assertEquals(400, $updatedGameSession->score);
        $this->assertEquals('Completed', $updatedGameSession->state);
    }

    public function testAddTryMethodIncrementsRetriesForGameSession(): void
    {
        // Create a mock Session
        $session = Session::factory()->create([]);

        // Create a mock MemoTest
        $memoTest = MemoTest::factory()->create([
            'name' => 'Test Memo Test'
        ]);

        // Create a mock GameSession
        $gameSession = GameSession::factory()->create([
            'session_id' => $session->id,
            'number_of_pairs' => 20,
            'retries' => 3,
            'memo_test_id' => $memoTest->id
        ]);

        $args = [
            'gameSessionId' => $gameSession->id,
        ];

        // Create an instance of the GameSessionMutator
        $mutator = new GameSessionMutator();
        $mutator->addTry(null, $args);

        $updatedGameSession = GameSession::find($gameSession->id);
        $this->assertEquals(4, $updatedGameSession->retries);
    }
}
