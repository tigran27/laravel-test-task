<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image', 'journal_creation_date'
    ];

    public function authors()
    {
        return $this->belongsToMany('App\Author', 'journals_authors','journal_id','author_id');
    }
}
