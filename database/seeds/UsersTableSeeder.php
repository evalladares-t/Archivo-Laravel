<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        'name' => 'Edward',
        'dni'=>'76466285',
        'name_user'=>'master',
        'password' => bcrypt('master'),
        'profile_id'=>1,
        'imgURL'=>'yo.jpg',
        'estado'=>true
        ]);

    User::create([
        'name' => 'Joseph',
        'dni'=>'15852310',
        'name_user'=>'archi',
        'password' => bcrypt('archi'),
        'imgURL'=>'yo.jpg',
        'profile_id'=>2,
        'estado'=>true
        ]);

    User::create([
        'name' => 'Josooph',
        'dni'=>'1234363678',
        'name_user'=>'admiayn',
        'password' => bcrypt('admin'),
        'profile_id'=>2,
        'estado'=>true
        ]);
    User::create([
        'name' => 'Joseph',
        'dni'=>'897520052',
        'name_user'=>'arc9hi',
        'password' => bcrypt('archi'),
        'profile_id'=>2,
        'estado'=>true
        ]);
    User::create([
        'name' => 'Joseph',
        'dni'=>'158577710',
        'name_user'=>'arcdhi',
        'password' => bcrypt('archi'),
        'profile_id'=>2,
        'estado'=>true
        ]);
    User::create([
        'name' => 'ddd',
        'dni'=>'158529910',
        'name_user'=>'archa',
        'password' => bcrypt('archi'),
        'profile_id'=>2,
        'estado'=>true
        ]);
    User::create([
        'name' => 'Josedph',
        'dni'=>'tttt',
        'name_user'=>'aaaaaaaa',
        'password' => bcrypt('archi'),
        'profile_id'=>2,
        'estado'=>true
        ]);
    User::create([
        'name' => '211212222',
        'dni'=>'12121233',
        'name_user'=>'1archi',
        'password' => bcrypt('1212'),
        'profile_id'=>2,
        'estado'=>true
        ]);
    User::create([
        'name' => 'Josaaaaaeph',
        'dni'=>'212121',
        'name_user'=>'asa',
        'password' => bcrypt('21212'),
        'profile_id'=>2,
        'estado'=>true
        ]);
    User::create([
        'name' => 'Jos121212eph',
        'dni'=>'121212882',
        'name_user'=>'ar121chi',
        'password' => bcrypt('2111'),
        'profile_id'=>2,
        'estado'=>true
        ]);
    User::create([
        'name' => 'Joseph',
        'dni'=>'8969698',
        'name_user'=>'adadasdad',
        'password' => bcrypt('archi'),
        'profile_id'=>2,
        'estado'=>true
        ]);

    }
}
