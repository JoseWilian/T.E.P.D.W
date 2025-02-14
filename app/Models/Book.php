<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

    /**
     * Relacionamento com Copy
     */
    public function copies()
    {
        return $this->hasMany(Copy::class, "book_id");
    }
    public function publishers()
    {
        return $this->belongsToMany(Publisher::class);
    }
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
