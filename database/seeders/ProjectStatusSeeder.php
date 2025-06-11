<?php

namespace Database\Seeders;

use App\Models\ProjectStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectStatusSeeder extends Seeder
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
                "code" => "passive"
            ],
        ];

        foreach ($statuses as $status) {
            $project_status = new ProjectStatus();

            $project_status->name = $status["name"];
            $project_status->code = $status["code"];
            $project_status->save();
        }
    }
}
