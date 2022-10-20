<?php

namespace Database\Seeders;
use App\Models\roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = new roles();
        $roles->name = "farmer";
        $roles->save();

        $roles = new roles();
        $roles->name = "retailor";
        $roles->save();

        $roles = new roles();
        $roles->name = "supplier";
        $roles->save();

        $roles = new roles();
        $roles->name = "customer";
        $roles->save();
    }
}
