<?php

Route::get('/', function () {
    return redirect('journal');
});

//Journal resource controller
Route::resource('journal', 'JournalController');

//Author resource controller
Route::resource('author', 'AuthorController');

