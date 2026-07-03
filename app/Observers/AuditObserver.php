<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

class AuditObserver
{
    public function created(Model $model): void
    {
        $this->logAction($model, 'created', null, $model->getAttributes());
    }

    public function updating(Model $model): void
    {
        // Capture changes before they are saved
        $oldValues = array_intersect_key($model->getOriginal(), $model->getDirty());
        $newValues = $model->getDirty();

        if (!empty($newValues)) {
            $this->logAction($model, 'updated', $oldValues, $newValues);
        }
    }

    public function deleted(Model $model): void
    {
        $this->logAction($model, 'deleted', $model->getOriginal(), null);
    }

    protected function logAction(Model $model, string $action, ?array $old, ?array $new): void
    {
        // Avoid infinite loop if auditing the audit log itself
        if ($model instanceof \App\Models\AuditLog) {
            return;
        }

        \App\Models\AuditLog::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'auditable_type' => get_class($model),
            'auditable_id' => $model->getKey(),
            'old_values' => $old,
            'new_values' => $new,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
