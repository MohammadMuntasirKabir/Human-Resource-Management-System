<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class DepartmentsSeeder extends Seeder
{
    public function run(): void
    {
        $departmentsMap = [
            'Human Resources' => [
                'HR Manager', 'Recruiter', 'HR Coordinator', 
                'Training Specialist', 'Compensation Analyst'
            ],
            'Engineering' => [
                'Software Engineer', 'DevOps Engineer', 'QA Engineer',
                'Frontend Developer', 'Backend Developer'
            ],
            'Finance' => [
                'Financial Analyst', 'Accountant', 'Controller',
                'Treasurer', 'Auditor'
            ],
            'Marketing' => [
                'Marketing Manager', 'Content Strategist', 'SEO Specialist',
                'Social Media Manager', 'Brand Manager'
            ],
        ];

        foreach (Company::all() as $company) {
            foreach ($departmentsMap as $deptName => $designations) {
                $department = $company->departments()->create(['name' => $deptName]);
                
                foreach ($designations as $title) {
                    $department->designations()->create(['name' => $title]);
                }
            }
        }
    }
}