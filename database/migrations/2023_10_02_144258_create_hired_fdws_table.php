<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(TableEnum::HIRED_FDWS, function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id');
            $table->foreignId('bio_data_id');
            $table->string('status')->default('selected');
            $table->date('date')->nullable();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableEnum::HIRED_FDWS);
    }
};
