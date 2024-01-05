<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(TableEnum::FDW_MEDICAL_HISTORIES, function (Blueprint $table) {
            $table->id();
            $table->foreignId('fdw_bio_data_id')->constrained(TableEnum::FDW_BIO_DATA)->on(TableEnum::FDW_BIO_DATA)->cascadeOnDelete();
            $table->boolean('allergies')->default(false);
            $table->string('allergies_detail')->nullable();
            $table->json('past_existing_illness')->nullable();
            $table->string('other_illness_detail')->nullable();
            $table->boolean('physical_disabilities')->default(false);
            $table->string('physical_disabilities_detail')->nullable();
            $table->boolean('dietary_restrictions')->default(false);
            $table->string('dietary_restrictions_detail')->nullable();
            $table->json('food_handling_preferences')->nullable();
            $table->string('other_food_handling_preferences')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableEnum::FDW_MEDICAL_HISTORIES);
    }
};
