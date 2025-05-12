<?php

use App\Enum\Service\ServiceDocumentTypeEnum;
use App\Models\Service;
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
        Schema::create('service_documents', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string("file_name");
            $table->string("file_ext");
            $table->string("size");
            $table->string("path");
            $table->foreignIdFor(Service::class)
                ->constrained('services')
                ->cascadeOnDelete();

            $table->enum("type", ServiceDocumentTypeEnum::values())->default(ServiceDocumentTypeEnum::IMAGE->value);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_documents');
    }
};
