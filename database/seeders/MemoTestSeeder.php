<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MemoTest;

class MemoTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(MemoTest::count() == 0){
            MemoTest::insert([
                [
                    'name' => 'Animals',
                    'image_urls' => '[
                        "http://localhost/images/animals/cheetah.jpg",
                        "http://localhost/images/animals/pig.jpg",
                        "http://localhost/images/animals/rabbit.jpg",
                        "http://localhost/images/animals/tiger.jpg"
                    ]'
                ],
                [
                    'name' => 'Instruments',
                    'image_urls' => '[
                        "http://localhost/images/instruments/bagpipe.jpg",
                        "http://localhost/images/instruments/flute.jpg",
                        "http://localhost/images/instruments/saxophone.jpg",
                        "http://localhost/images/instruments/trumpet.jpg"
                    ]'
                ]
            ]);
            
        }
    }
}
