<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'img',
        'description',
        'software',
        'slug',
        'type_id'
    ];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    // Un progetto può avere una sola categoria, questa è la relazione "one-to-many"
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    //un singolo project è collegato a più tecnologie
    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }
}
