<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
class Tag extends Model
{
    protected $fillable = ['name'];


    public function problems()
    {
        return $this->belongsToMany('App\Models\Problem', 'problem_tag');
    }

    public function save(array $options = [])
    {
        $v = Validator::make($this->attributes, config('rules.tag.store_validation_rules'));
        $v->validate();
        return parent::save($options); // TODO: Change the autogenerated stub
    }
}
