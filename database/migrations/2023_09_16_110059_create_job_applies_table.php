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
        Schema::create(TableEnum::JOB_APPLIES, function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('alternative_contact_number')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook_messenger_url')->nullable();
            $table->foreignId('job_id')->nullable()->constrained(TableEnum::JOBS)->cascadeOnDelete();
            $table->foreignId('created_by')->nullable()->constrained(TableEnum::USERS);
            $table->foreignId('updated_by')->nullable()->constrained(TableEnum::USERS);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableEnum::JOB_APPLIES);
    }
};
