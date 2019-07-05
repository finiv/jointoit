<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone'
    ];

    public function index()
    {
        return $this->belongsTo('App\Company');
    }


}
