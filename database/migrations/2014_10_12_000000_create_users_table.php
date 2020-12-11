<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country_code', 4);
            $table->string('phone_number', 15)->unique();
            $table->enum('gender', ['male', 'female']);
            $table->timestamp('birthdate')->nullable();
            // TODO Ask if Email will nullable or not
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();

            // TODO Ask if Password will nullable or not
            $table->string('password')->nullable();
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->rememberToken();
            $table->timestamps();
        });
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
}
