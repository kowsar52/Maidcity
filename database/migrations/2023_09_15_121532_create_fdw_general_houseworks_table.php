<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(TableEnum::FDW_GENERAL_HOUSEWORKS, function (Blueprint $table) {
            $table->id();
            $table->foreignId('fdw_bio_data_id')->constrained(TableEnum::FDW_BIO_DATA)->on(TableEnum::FDW_BIO_DATA)->cascadeOnDelete();
            $table->integer('work_title')->nullable();
            $table->boolean('willingness')->nullable();
            $table->boolean('experience')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableEnum::FDW_GENERAL_HOUSEWORKS);
    }
};
