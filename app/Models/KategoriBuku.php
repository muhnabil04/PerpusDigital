<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class KategoriBuku extends Model
{
    use HasFactory;

    protected $guarded = ['id']; // Use an array instead of a string
    protected $primaryKey = 'id';

    protected $table = 'kategoribuku';


    public function buku(): HasMany
    {
        return $this->hasMany(Buku::class);
    }
}
