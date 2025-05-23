<?php

use App\Enum\Project\ProjectDocumentTypeEnum;
use App\Models\Project;
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
        Schema::create('project_documents', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(Project::class)
                ->constrained('projects')
                ->cascadeOnDelete();
            $table->string("file_name");
            $table->string("file_ext");
            $table->string("size");
            $table->string("path");
            $table->enum("type", ProjectDocumentTypeEnum::values())->default(ProjectDocumentTypeEnum::IMAGE->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_documents');
    }
};
