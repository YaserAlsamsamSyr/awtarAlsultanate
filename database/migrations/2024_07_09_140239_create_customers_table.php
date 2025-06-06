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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable(false);
            $table->string('firstName')->nullable(false);
            $table->string('lastName')->nullable(false);;
            $table->string('phone')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('invoId')->nullable();
            $table->boolean('check')->default(false);
            $table->string('city')->nullable(false);
            $table->string('vat')->nullable(false);
            $table->string('delivery')->nullable(false);
            $table->string('notics')->nullable(true);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
