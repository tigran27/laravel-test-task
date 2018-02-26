<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class JournalsAuthors extends Pivot
{
    /**
     * table name
     * @var string
     */
    protected $table = 'journals_authors';

    protected $fillable = [
        'author_id', 'journal_id'
    ];
}
