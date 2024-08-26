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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->default('L&N Gas Supply');
            $table->string('company_address')->default('L&N Gas Supply Address');
            $table->string('company_phone')->default('09388823605');
            $table->string('company_email')->default('lng@gmail.com');
            $table->string('company_fax')->default('09388823605');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
