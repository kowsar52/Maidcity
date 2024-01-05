<?php

use App\Enum\TableEnum;
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
        Schema::create(TableEnum::EMPLOYER_MDW_REQUIREMENTS, function (Blueprint $table) {
            $table->id();
            $table->json('answer1')->nullable();
            $table->json('answer2')->nullable();
            $table->json('answer3')->nullable();
            $table->string('answer4')->nullable();
            $table->json('answer5')->nullable();
            $table->foreignId('user_id')->nullable()->constrained(TableEnum::USERS);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableEnum::EMPLOYER_MDW_REQUIREMENTS);
    }
};
