<?php

namespace App\GraphQL\Resolvers;

use App\Models\MemoTest;
use App\Models\GameSession;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class MemoTestResolver
{
    /**
     * Resolve high score field.
     *
     * @param  \App\Models\MemoTest  $memoTest
     * @param  array  $args
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context
     * @return int
     */
    public function highScore(MemoTest $memoTest, array $args, GraphQLContext $context): int
    {
        $highScore = GameSession::where('memo_test_id', $memoTest->id)
            ->max('score');

        return $highScore ? $highScore : 0;
    }
}
