<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $col) {
            $col->id();
            $col->string('name');
            $col->string('code')->unique();
            $col->string('address')->nullable();
            $col->string('city')->nullable();
            $col->string('phone')->nullable();
            $col->string('email')->nullable();
            $col->boolean('is_active')->default(true);
            $col->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
