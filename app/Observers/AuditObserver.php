<?php

namespace App\Observers;

use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

class AuditObserver
{
    public function created($model)
    {
        $this->logChange($model, 'created');
    }

    public function updated($model)
    {
        $this->logChange($model, 'updated');
    }

    public function deleted($model)
    {
        $this->logChange($model, 'deleted');
    }

    private function logChange($model, $event)
    {
        Audit::create([
            'user_id' => Auth::id() ?? 'Sistema',
            'model' => get_class($model),
            'model_id' => $model->id,
            'event' => $event,
            'old_values' => $event !== 'created' ? $model->getOriginal() : null,
            'new_values' => $event !== 'deleted' ? $model->getAttributes() : null,
        ]);
    }
}
