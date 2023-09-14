<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobTitle>
 */
class JobTitleFactory extends Factory
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
        //     'name' => 'Talent Management',
        //     'description' => "Talent Management is a job title or a department within an organization that focuses on attracting, developing, and retaining talented employees. The primary goal of talent management is to ensure that an organization has the right people in the right positions to achieve its business objectives.

        //     Talent Management involves several key functions, including:

        //     1. Talent Acquisition: This involves identifying and attracting top talent to the organization through various recruitment strategies, such as job postings, social media, and employee referrals.

        //     2. Performance Management: This involves setting clear performance expectations and goals, providing regular feedback, coaching, and development opportunities, and measuring employee performance against established benchmarks.

        //     3. Succession Planning: This involves identifying key positions within the organization and developing a plan for replacing key employees who may leave or retire. Succession planning involves identifying potential successors and developing their skills and abilities to prepare them for future leadership roles.

        //     4. Learning and Development: This involves creating and implementing training programs and development plans to enhance employee skills and knowledge, and prepare them for future career opportunities.

        //     5. Talent Analytics: This involves analyzing workforce data to identify trends and patterns related to employee performance, turnover, engagement, and other factors. Talent analytics is used to make data-driven decisions related to talent management strategies.

        //     Overall, Talent Management is a critical function within an organization, as it helps to ensure that the organization has the right talent in place to achieve its strategic goals and objectives. The Talent Management department works closely with other departments such as HR, Operations, and Finance to ensure that the organization's talent strategy is aligned with its overall business strategy.",
        //     'status' => 1,
        // ];
    }
}
