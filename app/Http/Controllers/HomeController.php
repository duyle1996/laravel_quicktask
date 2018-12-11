<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Session;

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
        try {
            $result = $request->user()->tasks()->create([
                'name' => $request->name
            ]);
            $request->session()->flash('sucess', trans('messages.sucess'));
        } catch (Exception $e) {
            $request->session()->flash('errors', $e->getMessage());
        }
        return redirect('/home');
    }

    public function edit($id)
    {
        $user = Task::find($id);
        if ($user === null) {
            session::flash('errors', trans('messages.errors'));
            return redirect('/home');
        } else {
            return view('tasks.edit', ['user' => $user]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = Task::find($id);
            $user->name = $request->name;
            $user->save();
            $request->session()->flash('sucess', trans('messages.sucess'));
        } catch (Exception $e) {
            $request->session()->flash('errors', $e->getMessage());
        }
        return redirect()->route('tasks.index');
    }

    public function destroy(Request $request, $id)
    {
        try {
            $user = Task::find($id);
            $user->delete();
            $request->session()->flash('sucess', trans('messages.sucess'));
        } catch (Exception $e) {
            $request->session()->flash('errors', $e->getMessage());
        }
        return redirect()->route('tasks.index');
    }
}
