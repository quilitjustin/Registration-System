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
        Schema::create('student_record', function (Blueprint $table) {
            $table->id();
            //22-001
            $table->string('student_id')->unique();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('m_name');
            $table->string('contact_no');
            $table->string('gender');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->string('guardian');
            $table->string('relationship_to_guardian');
            $table->string('guardian_contact');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();

            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        DB::statement("ALTER TABLE student_record 
                MODIFY gender 
                ENUM('Male', 'Female') 
                NOT NULL");

        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('block');
            $table->integer('house_no');
            $table->string('street');
            $table->string('barangay');
            $table->string('municipality');
            $table->string('province');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();

            $table->foreign('student_id')
                ->references('id')
                ->on('student_record')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student__records');
    }
};
