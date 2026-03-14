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
        Schema::create('datlichhen', function (Blueprint $table) {
            $table->integer('id_dat_lich_hen', true);
            $table->integer('iduser')->index('iduser');
            $table->integer('idbds')->index('idbds');
            $table->date('ngayDat');
            $table->decimal('tienCoc', 15)->nullable();
            $table->enum('trangThai', ['chờ xác nhận', 'đã xác nhận', 'huỷ'])->nullable()->default('chờ xác nhận');
            $table->enum('pttt', ['tiền mặt', 'chuyển khoản']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datlichhen');
    }
};
