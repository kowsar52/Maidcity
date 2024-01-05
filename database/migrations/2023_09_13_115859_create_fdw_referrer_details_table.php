<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(TableEnum::FDW_REFERRER_DETAILS, function (Blueprint $table) {
            $table->id();
            $table->foreignId('fdw_bio_data_id')->constrained(TableEnum::FDW_BIO_DATA)->on(TableEnum::FDW_BIO_DATA)->cascadeOnDelete();
            $table->string('full_name')->nullable();
            $table->string('nick_name')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('nric_no')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();
            $table->string('contact_1')->nullable();
            $table->string('contact_2')->nullable();
            $table->string('facebook_url',2048)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fdw_referrer_details');
    }
};
