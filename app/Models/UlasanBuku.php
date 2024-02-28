<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UlasanBuku extends Model
{
    use HasFactory;

    protected $table = 'ulasanbuku';

    protected $guarded = ['id']; // Use an array instead of a string
    protected $primaryKey = 'id';

    public function buku(): BelongsTo
    {
        return $this->belongsTo(buku::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }
}
