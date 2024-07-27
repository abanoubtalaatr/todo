<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return ToDo::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
        ]);

        $todo = ToDo::create($request->all());
        return response()->json($todo, 201);
    }

    public function show(ToDo $todo)
    {
        return $todo;
    }

    public function update(Request $request, ToDo $todo)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'age' => 'sometimes|required|integer',
        ]);

        $todo->update($request->all());
        return response()->json($todo, 200);
    }

    public function destroy(ToDo $todo)
    {
        $todo->delete();
        return response()->json(null, 204);
    }
}
