<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(TableEnum::FDW_WORK_EXPERIENCE_WITH_EMPLOYERS, function (Blueprint $table) {
            $table->id();
            $table->foreignId('fdw_bio_data_id')->constrained(TableEnum::FDW_BIO_DATA)->on(TableEnum::FDW_BIO_DATA)->cascadeOnDelete();
            $table->boolean('present')->default(false);
            $table->string('name_of_employer')->nullable();
            $table->dateTime('from_date')->nullable();
            $table->dateTime('to_date')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('other')->nullable();
            $table->string('nationality')->nullable();
            $table->string('language')->nullable();
            $table->string('type_of_house')->nullable();
            $table->string('members_in_family')->nullable();
            $table->string('salary')->nullable();
            $table->string('age_of_children')->nullable();
            $table->string('off_days_given')->nullable();
            $table->longText('duties_detail')->nullable();
            $table->longText('reason_for_leaving')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableEnum::FDW_WORK_EXPERIENCE_WITH_EMPLOYERS);
    }
};
