<?php

namespace Ecomm;

use Illuminate\Database\Eloquent\Model;

class Em_project_sites extends Model
{
    //
    protected $table = 'em_project_sites';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    public function profile() {
        return $this->belongsTo('em_projects');
    }
}
