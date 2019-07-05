<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'logo', 'website'];

    public function index()
    {
        return $this->hasMany('App\Employee');
    }

    public function delete()
    {
        $this->index()->delete();
        return parent::delete();
    }
}
