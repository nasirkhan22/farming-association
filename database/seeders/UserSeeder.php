<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->fk_role_id=1;
        $user->name = "Farmer";
        $user->email = "farmer@gmail.com";
        $user->address = "Abbottabad,Pakistan";
        $user->phone = "03100667656";
        $user->password = Hash::make('12345678');
        $user->save();


    }
}
