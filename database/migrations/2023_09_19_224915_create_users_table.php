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
            $table->string('uuid')->unique();
            $table->unsignedBigInteger('role_id');
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255)->nullable()->unique()
                    ->index("um_email_index");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile_number', 15)->unique()
                    ->index("um_mobile_index");
                $table->timestamp('mobile_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar', 255)->nullable()
                    ->comment('User\'s avatar image url.');
            $table->string('ip_address', 20)->nullable();
            $table->tinyInteger('status')->comment('1 = Active, 0 = Inactive')->default(0);
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')->references('id')->on('roles');
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
