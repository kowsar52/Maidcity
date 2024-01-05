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
        Schema::create(TableEnum::FDW_CARE_OF_PETS, function (Blueprint $table) {
            $table->id();
            $table->foreignId('fdw_bio_data_id')->nullable()->constrained(TableEnum::FDW_BIO_DATA)->on(TableEnum::FDW_BIO_DATA)->cascadeOnDelete();
            $table->integer('pet_title')->nullable();
            $table->boolean('willingness')->nullable();
            $table->boolean('experience')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableEnum::FDW_CARE_OF_PETS);
    }
};
