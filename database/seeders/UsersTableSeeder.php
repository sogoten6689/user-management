<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Group;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Mr Admin',
            'email' => 'admin@demo.com',
            'password' => Hash::make(12345678),
//            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user2 = User::create([
            'name' => 'Lam Nguyen',
            'email' => 'sogoten6689@gmail.com',
            'password' => Hash::make(12345678),
//            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user3 = User::create([
            'name' => 'Kiều Trí Hòa',
            'email' => 'kieutrihoa2004@gmail.com',
            'password' => Hash::make(12345678),
//            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        $role = Role::create(['name' => 'Quản trị viên']);
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
        $user2->assignRole([$role->id]);
        $user3->assignRole([$role->id]);

        Role::create(['name' => 'Thành Viên']);

        $group = Group::create([
            'name' => 'Ca Đoàn Dominique Savio',
            'description' => 'Ca đoàn',
            'address' => 'Nhà nguyện Regina Mundi (Dòng Đức Bà - CND). 228 Nam Kỳ Khởi Nghĩa, quận 3, TPHCM',
            'created_by' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
