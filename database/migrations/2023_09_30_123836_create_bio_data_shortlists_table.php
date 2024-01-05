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
        Schema::create(TableEnum::BIO_DATA_SHORTLISTS, function (Blueprint $table) {
            $table->id();
            $table->foreignId('fwd_bio_data_id')->nullable()->constrained(TableEnum::FDW_BIO_DATA)->cascadeOnDelete();
            $table->foreignId('employer_id')->nullable()->constrained(TableEnum::USERS);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableEnum::BIO_DATA_SHORTLISTS);
    }
};
