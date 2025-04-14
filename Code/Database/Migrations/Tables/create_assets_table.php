<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained('categories');
            $table->string('description')->nullable();
            $table->string('status');
            $table->foreignId('room_id')->constrained('rooms');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->date('purchase_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
