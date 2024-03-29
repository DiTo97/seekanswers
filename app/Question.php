<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Support\Str;

class Question extends Model
{
    protected $fillable = [
        'title', 'body'
    ];

    public function getUser(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute(string $value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug']  = Str::slug($value);
    }
}
