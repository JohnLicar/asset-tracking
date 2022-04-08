<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requisition_id')->constrained('requisition') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('inventory_id')->constrained('inventory');
            $table->integer('quantity');
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
        Schema::dropIfExists('requisition_item');
    }
}
