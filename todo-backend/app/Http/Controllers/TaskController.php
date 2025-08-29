<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Events\TaskCreated;
use Illuminate\Http\Request;



class TaskController extends Controller
{

    // Liste toutes les tâches de l'utilisateur connecté
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', $request->user()->id)->get();
        return response()->json($tasks);
    }

    // Affiche une tâche spécifique
    public function show(Request $request, $id)
    {
        $task = Task::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        return response()->json($task);
    }

    public function store(Request $request)
    {
        $task = Task::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        // Diffuser l'événement pour cet utilisateur
        broadcast(new TaskCreated($task))->toOthers();

        return response()->json($task, 201);
    }


    // Met à jour une tâche existante
    public function update(Request $request, $id)
    {
        $task = Task::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        $task->update($request->only('title', 'description', 'status'));

        return response()->json($task);
    }

    // Supprime une tâche
    public function destroy(Request $request, $id)
    {
        $task = Task::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        $task->delete();

        return response()->json(['message' => 'Tâche supprimée avec succès']);
    }
}
