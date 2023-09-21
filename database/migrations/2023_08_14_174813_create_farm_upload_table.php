<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_upload', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id'); // Assuming each upload belongs to a user
            $table->string('type'); // activity, image, video, etc.
            $table->text('description')->nullable();
            $table->string('file_path'); // Store the path to the uploaded file
            // Add foreign key constraints if necessary
            $table->foreign('activity_id')->references('id')->on('farm_registers')->onDelete('cascade');
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
        Schema::dropIfExists('farm_upload');
    }
};
