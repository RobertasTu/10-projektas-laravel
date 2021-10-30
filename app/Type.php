<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Type extends Model
{
    use Sortable;
    protected $table = 'types';
    protected $fillable = ['title'];
    public $sortable = ['id', 'title'];

    public function typeTasks() {
        return $this->hasMany(Task::class, 'type_id', 'id');
    }
}
