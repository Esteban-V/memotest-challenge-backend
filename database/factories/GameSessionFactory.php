<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\GameSession;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameSession>
 */
class GameSessionFactory extends Factory
{
    protected $model = GameSession::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number_of_pairs' => rand(5, 20),
            'retries' => rand(5, 20)
        ];
    }
}
