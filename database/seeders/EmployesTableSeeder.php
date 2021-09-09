<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Employe;

class EmployesTableSeeder extends Seeder
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
            Employe::create([
                'name' => 'Arturas',
                'email' => 'arturas' . $i . '@gmail.com',
                'telephone' => 3706542662 . $i,
                'company_id' => rand(1,10),
                'created_at' => $now,
            ]);
        }
    }
}
