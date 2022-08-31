<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    public static function store($request)
    {
        $data = $request->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        if (empty($data['description']))
        {
            $todo->description = '';
        }
        else
        {
            $todo->description = $data['description'];
        }
        $todo->completed = false;
        $todo->save();
    }
}
