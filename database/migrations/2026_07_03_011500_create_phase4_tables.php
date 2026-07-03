<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->string('label');
            $table->text('address');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->timestamps();
        });

        Schema::create('mobile_service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('equipment_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('service_location_id')->nullable()->constrained()->nullOnDelete();
            $table->text('problem_description');
            $table->date('preferred_date');
            $table->enum('status', ['pending', 'assigned', 'in_progress', 'completed', 'cancelled'])->default('pending');
            $table->foreignId('assigned_mechanic_id')->nullable()->constrained('mechanics')->nullOnDelete();
            $table->foreignId('converted_workshop_job_id')->nullable()->constrained('workshop_jobs')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('field_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobile_service_request_id')->constrained()->onDelete('cascade');
            $table->foreignId('mechanic_id')->constrained()->onDelete('cascade');
            $table->date('visit_date');
            $table->time('arrival_time')->nullable();
            $table->time('departure_time')->nullable();
            $table->text('outcome_notes')->nullable();
            $table->timestamps();
        });

        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->string('model')->default('Nissan UD 80');
            $table->decimal('capacity_tonnes', 6, 2);
            $table->enum('status', ['available', 'booked', 'maintenance'])->default('available');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('truck_hire_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('truck_id')->nullable()->constrained()->nullOnDelete();
            $table->date('requested_start_date');
            $table->date('requested_end_date');
            $table->string('destination');
            $table->text('job_description');
            $table->enum('status', ['pending', 'approved', 'declined', 'converted'])->default('pending');
            $table->timestamps();
        });

        Schema::create('truck_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('truck_hire_request_id')->constrained()->onDelete('cascade');
            $table->foreignId('truck_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('rate', 12, 2);
            $table->enum('rate_type', ['daily', 'per_job', 'contract']);
            $table->decimal('total_amount', 12, 2);
            $table->foreignId('invoice_id')->nullable()->constrained();
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('truck_contracts');
        Schema::dropIfExists('truck_hire_requests');
        Schema::dropIfExists('trucks');
        Schema::dropIfExists('field_visits');
        Schema::dropIfExists('mobile_service_requests');
        Schema::dropIfExists('service_locations');
    }
};
