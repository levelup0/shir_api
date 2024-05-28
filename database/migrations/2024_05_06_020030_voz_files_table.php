<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voz_files', function (Blueprint $table) {
            $table->id();
         
            $table->biginteger('voz_id')->unsigned()->index();
            $table->foreign('voz_id')->references('id')->on('voz')->onUpdate('cascade')->onDelete('cascade');
            $table->string('format');
            $table->string('src');
            $table->string('size');
            $table->string('name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voz_files');
    }
};