<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    //

    /**
     * Relacionamento com Book
     */
    public function book()
    {
        return $this->belongsTo(Book::class, "book_id");
    }

}
