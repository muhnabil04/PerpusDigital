<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $guarded = ['id']; // Use an array instead of a string
    protected $primaryKey = 'id';

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriBuku::class);
    }

    public function peminjaman(): HasMany
    {
        return $this->hasMany(peminjaman::class);
    }

    public function ulasan(): HasMany
    {
        return $this->hasMany(UlasanBuku::class);
    }


    public function koleksi(): BelongsTo
    {
        return $this->belongsTo(KoleksiPribadi::class);
    }
}
