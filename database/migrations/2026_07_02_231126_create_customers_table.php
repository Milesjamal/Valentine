<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $col) {
            $col->id();
            $col->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $col->string('company_name')->nullable();
            $col->string('contact_name');
            $col->string('phone');
            $col->string('email');
            $col->text('billing_address')->nullable();
            $col->text('physical_address')->nullable();
            $col->string('tax_number')->nullable();
            $col->text('notes')->nullable();
            $col->boolean('is_active')->default(true);
            $col->timestamps();
            $col->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
