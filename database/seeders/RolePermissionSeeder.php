<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role 'admin' dan 'user' jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $userRole = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        $permissionProduk = Permission::firstOrCreate(['name' => 'manage produk']);
        $permissionKategori = Permission::firstOrCreate(['name' => 'manage kategori']);
        $permissionProfile = Permission::firstOrCreate(['name' => 'access profile']);
        $permissionHobi = Permission::firstOrCreate(['name' => 'manage hobi']);
        $permissionPassword = Permission::firstOrCreate(['name' => 'manage password']);

        $adminRole->givePermissionTo(
            $permissionProduk,
            $permissionKategori,
            $permissionProfile,
            $permissionHobi,
            $permissionPassword
        );

        $userRole->givePermissionTo($permissionProfile, $permissionPassword);

        // Cek apakah user admin sudah ada, jika belum, buat
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'], 
            ['name' => 'admin', 'password' => Hash::make('admin1234')]
        );

        // Assign role admin ke user
        $user->assignRole('admin');
    }
}
