<?php

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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(User::class, "created_by_user_id");
            $table->string("sub_title")->nullable();
            $table->string("title")->nullable();
            $table->string("description")->nullable();
            $table->string("image");
            $table->string("button_link_one")->nullable();
            $table->string("button_one_text")->nullable();
            $table->string("button_link_two")->nullable();
            $table->string("button_two_text")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
