<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('dob')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('status')->comment('0= In-acitive, 1= Active')->nullable();
            $table->string('email_verified_at')->nullable();
            $table->string('is_email_verified')->comment('0= Unverified, 1= Verified')->nullable();
            $table->string("added_from")->nullable();
            $table->string("role")->nullable();
            $table->string("emailToken")->nullable();
            $table->string("reset_token")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
