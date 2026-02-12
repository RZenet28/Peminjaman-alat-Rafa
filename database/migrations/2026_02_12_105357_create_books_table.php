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
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('nama_buku');
        $table->text('deskripsi')->nullable();
        $table->integer('stock')->default(0);
        $table->string('gambar')->nullable();
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->decimal('denda_hilang', 10, 2)->default(0);
        $table->decimal('denda_rusak', 10, 2)->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
