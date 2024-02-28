<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KoleksiPribadi extends Model
{
    use HasFactory;

    protected $table = 'koleksipribadi';

    protected $guarded = ['id']; // Use an array instead of a string
    protected $primaryKey = 'id';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function buku(): BelongsTo
    {
        return $this->BelongsTo(Buku::class);
    }
}
