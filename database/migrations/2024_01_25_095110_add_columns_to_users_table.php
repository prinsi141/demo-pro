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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('name');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('mobile',10)->nullable()->after('password');
            $table->string('postcode', 11)->nullable()->after('mobile');
            $table->string('city_id', 200)->nullable()->after('postcode');
            $table->text('image')->nullable()->after('city_id');
            $table->string('hobbies')->nullable()->after('image');
            $table->integer('gender')->comment('1=male, 2=female')->nullable()->after('hobbies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
