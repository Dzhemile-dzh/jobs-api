<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('station_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->text('description');
            $table->enum('status', ['pending','in_progress','completed'])
                  ->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('work_orders');
    }
}