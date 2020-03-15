<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'categoria', 'prioridad','mensaje', 'user'
    ];
    

        public function user()
        {
            return $this->belongsTo('App\User', 'id', 'user');
        }
    
}
