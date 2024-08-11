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
      
        Schema::table('farms', function (Blueprint $table) {
            $table->string('farm_no', 10)->unique()->after('is_mine');
            $table->decimal('balance', 15, 2)->default(0.00)->after('farm_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('farms', function (Blueprint $table) {
            $table->dropColumn('farm_no');
            $table->dropColumn('balance');
        });
    }
};