<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToRequisitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisition', function (Blueprint $table) {
            $table->timestamp('approved_date')->nullable();
            $table->timestamp('issued_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requisition', function (Blueprint $table) {
            $table->dropColumn('approved_date');
            $table->dropColumn('issued_date');
        });
    }
}
