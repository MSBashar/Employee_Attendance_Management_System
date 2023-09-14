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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('department_id')->constrained();
            $table->foreignId('job_title_id')->constrained();
            $table->foreignId('shift_id')->constrained();
            $table->string('photo')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender');
            $table->string('nid_number')->unique()->nullable();
            $table->string('blood_group')->nullable();
            $table->date('hire_date');
            $table->date('leave_date')->nullable();
            $table->longText('note')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
