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
    $table->string('name');
    $table->foreignId('department_id')->constrained()->onDelete('cascade');
    $table->foreignId('position_id')->constrained()->onDelete('cascade');
    $table->date('birth_date');
    $table->string('gender');
    $table->softDeletes();
    $table->timestamps();
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
