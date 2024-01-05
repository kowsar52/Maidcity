<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(TableEnum::FDW_BIO_DATA_DETAILS, function (Blueprint $table) {
            $table->id();
            $table->foreignId('fdw_bio_data_id')->constrained(TableEnum::FDW_BIO_DATA)->on(TableEnum::FDW_BIO_DATA)->cascadeOnDelete();
            $table->string('basic_salary')->nullable();
            $table->integer('preference_for_rest_day')->nullable();
            $table->string('special_mention')->nullable();
            $table->longText('any_other_remarks')->nullable();
            $table->json('recommended_helper')->nullable();
            $table->boolean('previous_working_experience_in_singapore')->nullable();
            $table->longText('prev_employer_one_feedback')->nullable();
            $table->longText('prev_employer_two_feedback')->nullable();
            $table->json('availability_of_fdw_for_interview')->nullable();
            $table->longText('fdw_other_details')->nullable();
            $table->string('fdw_name_signature')->nullable();
            $table->date('fdw_date')->nullable();
            $table->string('personnel_name_reg_no')->nullable();
            $table->date('ea_personnel_date')->nullable();
            $table->string('employer_nric_no')->nullable();
            $table->date('employer_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableEnum::FDW_BIO_DATA_DETAILS);
    }
};
