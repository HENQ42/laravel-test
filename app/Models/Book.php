<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $fillable = [
        'name',
        'author',
        'registration_number',
        'status',
        'library_id'
    ];
    
    public function library(): BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}