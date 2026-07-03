<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $col) {
            $col->foreignId('branch_id')->after('password')->nullable()->constrained('branches')->nullOnDelete();
            $col->boolean('is_active')->after('branch_id')->default(true);
            $col->timestamp('last_login_at')->after('is_active')->nullable();
            $col->string('phone')->after('email')->nullable();
            $col->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $col) {
            $col->dropConstrainedForeignId('branch_id');
            $col->dropColumn(['is_active', 'last_login_at', 'phone', 'deleted_at']);
        });
    }
};
