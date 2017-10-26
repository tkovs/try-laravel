<?php

namespace App\Http\Controllers;

use App\Task;

class TasksController extends Controller
{
	public function index() {
		$tasks = Task::incomplete();

	    return view('tasks.index', compact('tasks'));
	} 

	public function show(Task $task) {
		return view('tasks.show', compact('task'));
	}

	public function finish(Task $task) {
		$task->finish();

		return redirect()->route('list_tasks');
	}

	public function create($body) {
		Task::create($body);

		return redirect()->route('list_tasks');
	}

	public function all() {
		$tasks = Task::all();

		return view('tasks.index', compact('tasks'));
	}
}