<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Company;


class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        for ($i=0; $i < 20; $i++) { 
            Company::create([
                'name' => 'Itoma' . $i,
                'email' => 'itoma'.$i.'@gmail.com', 
                'website' => 'https://us.search.yahoo.com/search?fr=yhs-invalid&p=companies',
                'image' => '',
                'created_at' => $now,
            ]);
        }
    }
}
