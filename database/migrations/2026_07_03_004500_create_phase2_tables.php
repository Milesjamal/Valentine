<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->string('equipment_name');
            $table->string('category');
            $table->string('manufacturer');
            $table->string('model');
            $table->string('serial_number')->nullable();
            $table->string('registration_number')->nullable();
            $table->integer('operating_hours')->default(0);
            $table->date('purchase_date')->nullable();
            $table->enum('status', ['active', 'retired'])->default('active');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('mechanics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('branch_id')->nullable()->constrained()->nullOnDelete();
            $table->string('employee_code')->unique();
            $table->string('specialty')->nullable();
            $table->text('certification_notes')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });

        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('equipment_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained()->nullOnDelete();
            $table->text('description');
            $table->date('preferred_date')->nullable();
            $table->enum('status', ['new', 'reviewed', 'converted', 'declined'])->default('new');
            $table->unsignedBigInteger('converted_workshop_job_id')->nullable();
            $table->timestamps();
        });

        Schema::create('workshop_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_number')->unique();
            $table->foreignId('service_request_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('equipment_id')->constrained()->onDelete('cascade');
            $table->foreignId('branch_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('assigned_mechanic_id')->nullable()->constrained('mechanics')->nullOnDelete();
            $table->text('issue_description');
            $table->enum('status', ['new', 'inspection', 'diagnosis_complete', 'awaiting_approval', 'repair_in_progress', 'testing', 'completed', 'closed'])->default('new');
            $table->text('diagnosis_notes')->nullable();
            $table->text('completion_report')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('workshop_job_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workshop_job_id')->constrained()->onDelete('cascade');
            $table->foreignId('author_id')->constrained('users');
            $table->text('note');
            $table->boolean('is_customer_visible')->default(false);
            $table->timestamps();
        });

        Schema::create('workshop_job_status_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workshop_job_id')->constrained()->onDelete('cascade');
            $table->string('from_status');
            $table->string('to_status');
            $table->foreignId('changed_by')->constrained('users');
            $table->timestamp('changed_at')->useCurrent();
        });

        Schema::create('maintenance_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_id')->constrained()->onDelete('cascade');
            $table->foreignId('workshop_job_id')->nullable()->constrained()->nullOnDelete();
            $table->string('summary');
            $table->json('parts_replaced')->nullable();
            $table->text('technician_notes')->nullable();
            $table->date('performed_at');
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });

        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->morphs('mediable');
            $table->string('collection')->nullable();
            $table->enum('type', ['image', 'document']);
            $table->string('disk')->default('local');
            $table->string('path');
            $table->string('original_filename');
            $table->string('mime_type');
            $table->integer('size');
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
        Schema::dropIfExists('maintenance_history');
        Schema::dropIfExists('workshop_job_status_history');
        Schema::dropIfExists('workshop_job_notes');
        Schema::dropIfExists('workshop_jobs');
        Schema::dropIfExists('service_requests');
        Schema::dropIfExists('mechanics');
        Schema::dropIfExists('services');
        Schema::dropIfExists('service_categories');
        Schema::dropIfExists('equipment');
    }
};
