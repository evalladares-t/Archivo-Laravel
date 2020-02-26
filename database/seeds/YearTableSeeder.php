<?php

use Illuminate\Database\Seeder;
use App\Year;

class YearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($i=1967;$i<=2050;$i++){
        Year::create([
            'name'=>''.$i,
            ]);
        }
    }
}
