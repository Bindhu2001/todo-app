<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); 
        return view('tasks.index', compact('tasks')); 
    }

    public function store(Request $request)
    {
        Task::create([
            'content' => $request->content,
            'status' => 'to_start'
        ]);

        return redirect()->route('dashboard'); 
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update(['status' => $request->status]);

        return redirect()->route('dashboard');
    }
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('dashboard')->with('success', 'Task deleted successfully');
    }    
}
