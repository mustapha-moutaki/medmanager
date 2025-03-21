<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $receptionRole = Role::firstOrCreate(['name' => 'reception']);
        $doctorRole = Role::firstOrCreate(['name' => 'doctor']);
        $patientRole = Role::firstOrCreate(['name' => 'patient']);

        // Create permissions
        $permissions = [
            'add-user', 'block-user', 'create-appointment', 'edit-appointment', 'delete-appointment',
            'manage-users', 'manage-doctors', 'manage-receptions', 'manage-patients',
            'edit-own-appointment', 'view-own-appointments', 'manage-medical-records',
            'register', 'view-appointments', 'view-medical-records'
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Assign Permissions to Roles Manually
        $adminRole->permissions()->sync(
            Permission::whereIn('name', [
                'add-user', 'block-user', 'create-appointment', 'edit-appointment', 'delete-appointment',
                'manage-users', 'manage-doctors', 'manage-receptions'
            ])->pluck('id')->toArray()
        );

        $doctorRole->permissions()->sync(
            Permission::whereIn('name', [
                'manage-patients', 'edit-own-appointment', 'view-own-appointments', 'manage-medical-records'
            ])->pluck('id')->toArray()
        );

        $receptionRole->permissions()->sync(
            Permission::whereIn('name', [
                'create-appointment', 'edit-appointment', 'delete-appointment', 'manage-patients'
            ])->pluck('id')->toArray()
        );

        $patientRole->permissions()->sync(
            Permission::whereIn('name', [
                'register', 'view-appointments', 'view-medical-records'
            ])->pluck('id')->toArray()
        );

        // Assign Role to a User
        $adminUser = User::find(2);
        if ($adminUser) {
            $adminUser->roles()->sync([$adminRole->id]);
        }
    }
    
}
