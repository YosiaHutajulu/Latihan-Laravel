<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('todos', function (Blueprint $table) {
    $table->id();
    $table->string('judul');
    $table->text('keterangan')->nullable();
    $table->boolean('selesai')->default(false);
    $table->timestamp('tanggal_selesai')->nullable();
    $table->timestamps();
});

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
