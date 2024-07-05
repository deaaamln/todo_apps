<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;
    protected $table = 'todo_lists';
    protected $fillable = ['todo_id', 'user_id', 'status', 'date_time'];

    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
