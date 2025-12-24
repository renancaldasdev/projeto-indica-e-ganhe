<?php

namespace Database\Seeders;

use App\Role\Models\Role;
use Illuminate\Database\Seeder;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'description' => 'Administrador Geral do Sistema (SaaS)',
                'slug' => 'super-admin',
            ],
            [
                'name' => 'Admin Provedor',
                'description' => 'Administrador da Empresa/Provedor',
                'slug' => 'admin-customer',
            ],
            [
                'name' => 'Cliente / Indicador',
                'description' => 'Cliente final que realiza indicações',
                'slug' => 'cliente-customer',
            ]
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['slug' => $role['slug']],
                [
                    'name' => $role['name'],
                    'description' => $role['description']
                ]
            );
        }
    }
}
