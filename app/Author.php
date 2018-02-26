<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'middle_name',
    ];

    public function journals()
    {
        return $this->belongsToMany('App\Journal', 'journals_authors','author_id','journal_id');
    }

}
