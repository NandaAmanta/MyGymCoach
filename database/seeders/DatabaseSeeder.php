<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    private array $questions = [
        [
            'question' => 'Apa Goal gym mu hari ini ?',
            'order' => 1,
            'options' => [
                'Muscle Gain',
                'Meningkatkan Endurance',                
                'Meningkatkan daya ledak',
            ]
            ],
            [
            'question' => 'Berapa banyak waktu gym hari ini ?',
            'order' => 2,
            'options' => [
                '30 menit',
                '60 menit',
                '+120 menit',
            ]
            ],
            [
            'question' => 'Apa jadwal gym hari ini ?',
            'order' => 3,
            'options' => [
                'Otot Dada & Triceps',
                'Otot Punggung & Biceps',
                'Otot Bahu & Traps',
                'Otot kaki & Core/Abs',
            ]
            ],
            [
            'question' => 'Apakah kamu memiliki penyakit/riwayat penyakit Hernia ?',
            'order' => 4,
            'options' => [
                "Ya",
                "Tidak",
            ]
            ],
            
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->questions as $question) {
            $q = \App\Models\Question::create($question);
            foreach ($question['options'] as $option) {
                \App\Models\Option::create([
                    'question_id' => $q->id,
                    'label' => $option
                ]);
            }
        }
    }
}
