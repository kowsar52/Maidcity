<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(TableEnum::FDW_BIO_DATA, function (Blueprint $table) {
            $table->id();
            $table->json('bio_data_type');
            $table->date('date_of_last_medical')->nullable();
            $table->string('name');
            $table->date('date_of_birth')->nullable();
            $table->string('age')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->integer('nationality')->nullable();
            $table->string('residential_address_in_home_country')->nullable();
            $table->string('name_of_airport')->nullable();
            $table->string('religion')->nullable();
            $table->string('education_level')->nullable();
            $table->integer('number_of_siblings')->nullable();
            $table->string('no_of_children')->nullable();
            $table->string('age_of_children')->nullable();
            $table->integer('marital_status')->nullable();
            $table->string('passport_available')->nullable();
            $table->integer('birth_order_in_family')->nullable();
            $table->string('others')->nullable();
            $table->string('husband_name')->nullable();
            $table->string('husband_age')->nullable();
            $table->string('husband_occupation')->nullable();
            $table->string('contact_no_in_home_country')->nullable();
            $table->string('contact_no_in_singapore_country')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('ym_skype')->nullable();
            $table->string('email')->nullable();
            $table->string('other_contact')->nullable();
            $table->json('interview_by_singapore_via')->nullable();
            $table->string('name_of_foreign_training_centre')->nullable();
            $table->string('name_of_third_party_training_centre')->nullable();
            $table->json('interview_by_overseas_training_centre_via')->nullable();
            $table->string('method_of_evaluation_of_skills')->nullable();
            $table->string('other_skill')->nullable();
            $table->string('photo')->nullable();
            $table->json('certificates')->nullable();
            $table->json('passport')->nullable();
            $table->string('status')->default('pending');
            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableEnum::FDW_BIO_DATA);
    }
};
