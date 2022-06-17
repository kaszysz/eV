<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class DestroyService {

    function DestroyOrRestore(Model $model){
        if ($model->trashed()) {
            $model->restore();
        } else {
            $model->delete();
        }
    }
}
