<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PaginationSetting extends Model
{
    use Sortable;
    protected $table = 'pagination_settings';
    protected $fillable = ['title', 'value'];
    public $sortable = ['id', 'title', 'value'];

    // public function companyType() {
    //  return $this->belongsTo(Type::class, 'type_id', 'id');

}
