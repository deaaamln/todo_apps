<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $table = 'todos';
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'todo_category_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function todo_category()
    {
        return $this->belongsTo(TodoCategory::class);
    }
    public function todo_list()
    {
        return $this->hasMany(TodoList::class);
    }
}
