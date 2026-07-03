<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_notes', function (Blueprint $col) {
            $col->id();
            $col->foreignId('customer_id')->constrained()->onDelete('cascade');
            $col->foreignId('author_id')->constrained('users');
            $col->enum('channel', ['call', 'email', 'whatsapp', 'in_person', 'system']);
            $col->text('note');
            $col->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_notes');
    }
};
