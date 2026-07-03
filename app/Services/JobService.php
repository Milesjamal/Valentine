<?php

namespace App\Services;

use App\Models\WorkshopJob;
use App\Models\WorkshopJobStatusHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobService
{
    public function createJob(array $data)
    {
        return DB::transaction(function () use ($data) {
            $data['job_number'] = $this->generateJobNumber();
            $data['created_by'] = Auth::id();

            $job = WorkshopJob::create($data);

            $this->logStatusChange($job, 'none', 'new');

            return $job;
        });
    }

    public function updateStatus(WorkshopJob $job, string $newStatus)
    {
        return DB::transaction(function () use ($job, $newStatus) {
            $oldStatus = $job->status;
            $job->update(['status' => $newStatus]);

            $this->logStatusChange($job, $oldStatus, $newStatus);

            return $job;
        });
    }

    protected function logStatusChange(WorkshopJob $job, string $from, string $to)
    {
        WorkshopJobStatusHistory::create([
            'workshop_job_id' => $job->id,
            'from_status' => $from,
            'to_status' => $to,
            'changed_by' => Auth::id(),
            'changed_at' => now(),
        ]);
    }

    protected function generateJobNumber()
    {
        $year = date('Y');
        $count = WorkshopJob::whereYear('created_at', $year)->count() + 1;
        return 'GT-' . $year . '-' . str_pad($count, 5, '0', STR_PAD_LEFT);
    }
}
