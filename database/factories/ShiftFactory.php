<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shift>
 */
class ShiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Individual',
            'description' => 'Individual Employee',
            'start_time' => '00:00',
            'end_time' => '00:00',
            'status' => 1,
        ];

        // return [
        //     'name' => 'General - Officers',
        //     'description' => 'General shift for Officers',
        //     'start_time' => '09:30',
        //     'end_time' => '16:30',
        //     'status' => 1,
        // ];
    }
}
