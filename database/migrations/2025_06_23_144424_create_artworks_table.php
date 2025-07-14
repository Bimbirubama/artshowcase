<?php
// 2025_07_02_000002_create_bimbi_artworks_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bimbi_artworks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Tambahkan kolom image
            $table->foreignId('creator_id')
                  ->constrained('bimbi_creators')
                  ->onDelete('cascade'); // Tambahkan relasi ke creators
            $table->foreignId('category_id')
                  ->constrained('bimbi_categories')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bimbi_artworks');
    }
};
