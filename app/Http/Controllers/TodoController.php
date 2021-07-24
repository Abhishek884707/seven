<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use Illuminate\Http\Request;
use App\Models\todo;
// use Dotenv\Validator;
// use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    function __construct(){
        // $this->middleware('auth')->except('index');
        $this->middleware('auth');
    }


    function index(){
        // $todos = todo::orderby('completed')->get();
        $todos = auth()->user()->todos()->orderBy('completed')->get();
        // return $todos;
        // return view('todos.index',['todos'=>$todos]);
        // return view('todos.index')->with(['todos'=>$todos]);
        return view('todos.index',compact('todos'));
    }

    function edit($id){
        $todo = todo::find($id);
        return view('todos.edit',compact('todo'));
        // dd($id);
    }

    function create(){
        return view('todos.create');
    }

    function inCompleted(todo $incomplete){
        // dd($incomplete);
        $incomplete->update(['completed'=>false]);
        return redirect()->back()->with('message',"Task Marked as Incompleted!!");
        // return 'Success-Fully in InCompleted method';
    }

    function completed(todo $complete){
        $complete->update(['completed'=>true]);
        return redirect(route('todo.index'))->with('message','Task Marked as Completed!');
        // dd($complete);
    }

    function update(TodoCreateRequest $request , todo $id){
        // return todo::find($id);
        // return $id;
        $id->update(['title'=>$request->title,'description'=>$request->description]);
        // return redirect()->back()->with("message","Updated Successfully");
        return redirect(route('todo.index'))->with("message","Updated Successfully");
    }

    function delete(todo $delete){
        $delete->delete();
        return redirect()->back()->with('message','Task Deleted Successfully.');
    }

    function show(todo $todo){
        // $todo = $id;
        return view('todos.show',['todo'=>$todo]);
    }

   

    function store(TodoCreateRequest $request){
        // if(!$request->title){
        //     return redirect()->back()->with('error',"Please give title");
        // }
        // $request->validate([
        //     'title' => 'required'
        // ]);

        // $rules = [
        //     'title' => 'required|max:250'
        // ];

        // $messages = [
        //     'title.max' => 'Todo title not be more then 250 chars.'
        // ];

        // $validator = Validator::make($request->all(),$rules,$messages);
        // if($validator->fails()){
        //     return redirect()->back()
        //             ->withErrors($validator)
        //             ->withInput();
        // }

        // dd(auth()->user()->todos);
        // $user_id = auth()->user()->id;
        // $request['user_id'] = $user_id;

        auth()->user()->todos()->create($request->all());

        // todo::create($request->all());
        return redirect('/todos')->with('message',"Todo created Successfully.");
    }
}
