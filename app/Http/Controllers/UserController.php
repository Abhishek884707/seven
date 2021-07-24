<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class UserController extends Controller
{
    function getData(){
        // Row Sql Query By using Facades
        // DB::update('update users set name = ? where id = 2', ['Peter']);
        DB::delete('delete from users where id = ?',[3]);
        return DB::select('select * from users');
    }

    function getElequent(){
        $user = new User();
        // dd($user);
        $user->name = "Abhishek";
        $user->email = "abhishek@gmail.com";
        $user->password = bcrypt(12345);
        $user->save();

        // User::where('id',4)->update(['name'=>"Abhishek Kumar"]);
        // User::where('id',4)->delete();
        return User::all();
    }

    function upload(Request $request){
        if($request->hasFile('image')){
            $fileName = $request->image->getClientOriginalName();
            // dd($fileName);
            $this->deleteOldImage();
            $request->image->storeAs('images',$fileName,'public');
            User::where('id',1)->update(['avatar' => $fileName]);
            // $request->session()->flash('message','Uploaded Successfully');
            return redirect()->back()->with('message','Uploaded Successfully');
            }
        else{
            // $request->session()->flash('error','file upload unsuccessfully');
           return redirect()->back()->with('error','file upload unsuccessfully');
        }
    }

    protected function deleteOldImage(){
        if(auth()->user()->avatar){
            Storage::delete('/public/images'.auth()->user()->avatar);
        }
    }
}
