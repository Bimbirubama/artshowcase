<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bimbi_comments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('artwork_id')->constrained('bimbi_artworks')->onDelete('cascade');
        $table->string('name');
        $table->text('comment');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbi_comments');
    }
};
