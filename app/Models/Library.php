<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Library extends Model
{
    protected $fillable = [
        'name',
        'email',
        'registration_number'
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}