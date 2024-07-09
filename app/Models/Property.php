<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Database\Eloquent\Builder;

class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'address',
        'postal_code',
        'sold',
        'image'
    ];

    protected $casts = [
        'sold' => 'bool'
    ];

    public function imageUrl(): string 
    {
        return Storage::disk('public')->url($this->image);
    }

    public function options(): BelongsToMany {
        return $this->belongsToMany(Option::class);
    }
    

    public function getSlug() {
        return Str::slug($this->title);
    }

    public function scopeAvailable(Builder $builder, bool $available = true) {
        return $builder->where('sold', false);
    }


    public function scopeRecent(Builder $builder): Builder
    {
        return $builder->orderBy('created_at', 'desc');
    }
}
