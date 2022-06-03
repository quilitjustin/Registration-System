<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('m_name');
            $table->string('l_name');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('contact_no');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('staff');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE users 
                MODIFY role 
                ENUM('admin', 'staff') 
                NOT NULL DEFAULT 'staff'");
        DB::statement("ALTER TABLE users 
                MODIFY gender 
                ENUM('Male', 'Female') 
                NOT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
