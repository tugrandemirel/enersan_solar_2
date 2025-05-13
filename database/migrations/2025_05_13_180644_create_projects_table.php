<?php

use App\Models\ProjectStatus;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(ProjectStatus::class)
                ->constrained('project_statuses')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('slug');
            $table->longText("description");
            $table->foreignIdFor(User::class, "created_by_user_id");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
