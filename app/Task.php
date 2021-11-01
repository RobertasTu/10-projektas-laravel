<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Type;
use App\Owner;

class Task extends Model
{
    use Sortable;
    protected $table = 'tasks';
    protected $fillable = ['title', 'description', 'type_id'];
    public $sortable = ['id', 'title', 'description', 'type_id'];

    public function taskType() {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function taskOwner() {
        return $this->belongsTo(Owner::class, 'owner_id', 'id');

    }
}
