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
        Schema::create('color_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('color_code', 255);
            $table->tinyInteger('status')->comment('1 = Active, 0 = Inactive')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_masters');
    }
};
