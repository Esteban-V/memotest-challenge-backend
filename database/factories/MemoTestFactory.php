<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MemoTest;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MemoTest>
 */
class MemoTestFactory extends Factory
{
    protected $model = MemoTest::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'image_urls' => '[]'
        ];
    }
}
