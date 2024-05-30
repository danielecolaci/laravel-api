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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->change();
            $table->string('url_code')->nullable()->change();
            $table->string('url_web')->nullable(false)->change();
            $table->date('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('subtitle', 255)->nullable()->change();
            $table->text('url_code')->nullable(false)->change();
            $table->string('url_web')->nullable()->change();
            $table->dropColumn('date');
            });
    }
};
