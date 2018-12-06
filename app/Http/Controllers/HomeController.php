<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Task::get();
        return view('tasks.index', ['users' => $users]);
    }
    public function create()
    {
        //
        return view('tasks.create');
    }
    public function store(TaskRequest $request)
    {
        $result = $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/home');

    }
    public function edit($id)
    {
        //
        $user = Task::find($id);
        return view('tasks.edit', ['user' => $user]);
    }
    public function update(Request $request, $id)
    {
        //
        $user = Task::find($id);
        $user->name = $request->name;
        $user->save();
        return redirect()->route('tasks.index');
    }
    public function destroy($id)
    {
        //
        $user = Task::find($id);
        $user->delete();
        return redirect()->route('tasks.index');
    }

}
