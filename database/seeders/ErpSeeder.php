<?php

namespace Database\Seeders;

use App\Erp\Models\Erp;
use Illuminate\Database\Seeder;

class ErpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $erps = [
            [
                'name' => 'IXC Soft',
                'slug' => 'ixc_soft',
                'active' => true,
            ],
            [
                'name' => 'MK Auth',
                'slug' => 'mk_auth',
                'active' => true,
            ],
            [
                'name' => 'HubSoft',
                'slug' => 'hubsoft',
                'active' => true,
            ],
            [
                'name' => 'SGP',
                'slug' => 'sgp',
                'active' => true,
            ],
            [
                'name' => 'Voalle',
                'slug' => 'voalle',
                'active' => true,
            ],
        ];

        foreach ($erps as $erp) {
            Erp::firstOrCreate(
                ['slug' => $erp['slug']],
                ['name' => $erp['name'], 'active' => $erp['active']]
            );
        }
    }
}
