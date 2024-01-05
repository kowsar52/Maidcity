<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(TableEnum::SUPPLIERS, function (Blueprint $table) {
            $table->id();
            $table->string('prefix')->unique();
            $table->foreignId('user_id')->nullable()->constrained(TableEnum::USERS);
            $table->string('photo')->nullable();
            $table->string('company_name');
            $table->string('person_1')->nullable();
            $table->string('email_1')->nullable();
            $table->string('phone_number_1')->nullable();
            $table->string('person_2')->nullable();
            $table->string('email_2')->nullable();
            $table->string('phone_number_2')->nullable();
            $table->text('other_information')->nullable();
            $table->longText('full_address')->nullable();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableEnum::SUPPLIERS);
    }
};
