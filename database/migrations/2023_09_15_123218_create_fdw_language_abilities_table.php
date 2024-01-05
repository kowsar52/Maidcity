<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(TableEnum::FDW_LANGUAGE_ABILITIES, function (Blueprint $table) {
            $table->id();
            $table->foreignId('fdw_bio_data_id')->constrained(TableEnum::FDW_BIO_DATA)->on(TableEnum::FDW_BIO_DATA)->cascadeOnDelete();
            $table->integer('language_id')->nullable();
            $table->string('other')->nullable();
            $table->integer('rating')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableEnum::FDW_LANGUAGE_ABILITIES);
    }
};
