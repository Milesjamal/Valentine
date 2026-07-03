<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $col) {
            $col->id();
            $col->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $col->string('action');
            $col->string('auditable_type');
            $col->unsignedBigInteger('auditable_id');
            $col->json('old_values')->nullable();
            $col->json('new_values')->nullable();
            $col->string('ip_address')->nullable();
            $col->string('user_agent')->nullable();
            $col->timestamp('created_at')->useCurrent();

            $col->index(['auditable_type', 'auditable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
