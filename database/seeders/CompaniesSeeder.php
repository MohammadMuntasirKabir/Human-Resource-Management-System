<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Company;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'name' => 'Tech Innovators Inc.',
                'email' => 'tech.innovators@gmail.com',
                'website' => 'www.techinnovators.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Creative Solutions Ltd.',
                'email' => 'creative.solutions@gmail.com',
                'website' => 'www.creativesolutions.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Global Enterprises',
                'email' => 'global.enterprise@gmail.com',
                'website' => 'www.globalenterprises.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'NextGen Tech',
                'email' => 'nextgen.tech@gmail.com',
                'website' => 'www.nextgentech.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        foreach (Company::all() as $key => $company){
            $company->users()->attach(1);
        }
    }
}
