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
        Schema::create('batdongsan', function (Blueprint $table) {
            $table->integer('idbds', true);
            $table->integer('idKv')->index('idKv');
            $table->string('tenBds');
            $table->decimal('gia', 15);
            $table->text('moTa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batdongsan');
    }
};
