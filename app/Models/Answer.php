<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['application_is', 'body'];
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
