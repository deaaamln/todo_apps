<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoCategory extends Model
{
    use HasFactory;
    protected $table = 'todo_categories';
    protected $fillable = ['name', 'user_id'];

    public function todo()
    {
        return $this->hasMany(Todo::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
