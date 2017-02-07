<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SGModel extends Model {

    public $timestamps       = false;
    public $incrementing     = false;
    protected $isActiveField = "is_active";

    public function scopeActive($query) {
        return $query->where("is_active", 1);
    }

    public function manyThroughMany($related, $through, $firstKey, $secondKey, $pivotKey) {
        $model        = new $related;
        $table        = $model->getTable();
        $throughModel = new $through;
        $pivot        = $throughModel->getTable();

        return $model
                        ->join($pivot, $pivot . '.' . $pivotKey, '=', $table . '.' . $secondKey)
                        ->select($table . '.*')
                        ->where($pivot . '.' . $firstKey, '=', $this->id);
    }

}
