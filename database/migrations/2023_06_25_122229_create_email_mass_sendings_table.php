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
        Schema::create('email_sendings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('email_template_id');
            $table->unsignedBigInteger('group_id');
            $table->dateTime('send_to')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('email_template_id')->references('id')->on('email_templates');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_mass_sendings');
    }
};
