<?php

namespace Database\Seeders;

use App\Models\ServiceStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                "name" => "Aktif",
                "code" => "active"
            ],
            [
                "name" => "Pasif",
                "code" => "inactive"
            ],
        ];

        foreach ($statuses as $status) {
            $service_status = new ServiceStatus();

            $service_status->name = $status["name"];
            $service_status->code = $status["code"];
            $service_status->save();
        }
    }
}
