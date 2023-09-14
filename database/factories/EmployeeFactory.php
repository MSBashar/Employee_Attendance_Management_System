<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 2,
            'department_id' => 1,
            'job_title_id' => 1,
            'shift_id' => 1,
            'start_time' => '9:30',
            'end_time' => '20:30',
            'nid_number' => '293767',
            'date_of_birth' => '1990-02-18',
            'gender' => 'male',
            'blood_group' => 'O+',
            'hire_date' => '2023-03-29',
            'note' => 'Test-Note',
            'status' => 1,
        ];
    }
}
