<?php

namespace App\models;

use Core\BaseModel;

class usuario_model extends BaseModel
{
    public $table = "user";

    public $timestamps = false;

    protected $fillable = ['id', 'nome', 'sobrenome'];
    

    public function rules()
    {
        return [
            'nome' => 'min:5|max:255',
            'sobrenome' => 'min:10'
        ];
    }
    
//
//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
//
//    public function category()
//    {
//        return $this->belongsToMany(Category::class);
//    }
}
