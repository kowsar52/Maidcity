<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(TableEnum::JOBS, function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->longText('job_description')->nullable();
            $table->json('type_of_mdw')->nullable();
            $table->json('nationality_preferred')->nullable();
            $table->string('salary_range')->nullable();
            $table->integer('rest_day')->nullable();
            $table->date('expected_start_date')->nullable();
            $table->json('employer_requirement')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableEnum::JOBS);
    }
};
