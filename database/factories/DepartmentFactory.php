<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Unset',
            'description' => "",
            'status' => 1,
        ];

        // return [
        //     'name' => 'HR Department',
        //     'description' => "The Human Resource Department (HRD) is responsible for managing the employees and the employment process of an organization. It plays a critical role in ensuring that the organization has the right people with the right skills and knowledge to achieve its goals.

        //     The main functions of the HRD typically include:

        //     1. Recruitment and Selection: This involves identifying the job requirements, advertising the position, receiving and screening resumes, conducting interviews, and selecting the best candidates for the job.

        //     2. Training and Development: This involves identifying the training needs of employees, designing and delivering training programs, and ensuring that employees have the necessary skills and knowledge to perform their jobs effectively.

        //     3. Performance Management: This involves setting performance goals, conducting regular performance evaluations, providing feedback and coaching, and managing employee promotions, transfers, and terminations.

        //     4. Compensation and Benefits: This involves determining salaries and wages, administering employee benefits programs, and ensuring that the organization's compensation and benefits package is competitive in the industry.

        //     5. Employee Relations: This involves managing employee grievances, handling workplace conflicts, promoting employee engagement, and fostering a positive and inclusive work culture.

        //     Overall, the HRD is responsible for ensuring that the organization's workforce is well-trained, motivated, and engaged, and that the organization complies with all relevant employment laws and regulations.",
        //     'status' => 1,
        // ];
    }
}
