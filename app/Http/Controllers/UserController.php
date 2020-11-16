<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function index(){
    //we create a object $user according to User Model or class
     $data = [
       'name' => 'Shishir',
       'email' => 's1@gmail.com',
       'password' => 'password'
     ];
     //User::create($data);

     //Fetching all users table data
     $user = User::all();
     return $user;
    }




    public function uploadAvatar(Request $request){
      if($request->hasFile('image')){
/*         $name=$request->image->getClientOriginalName();
        $this->deleteOldimage();
        $request->image->storeAs('images',$name, 'public');
        auth()->user()->update(['avatar'=> $name]); */
        User::uploadAvatar($request->image);
        $request->session()->flash('message', 'Image Uploaded Successfully');
        return redirect()->back(); // Success Message
      }
      return redirect()->back()->with('error', 'Un Successfull'); // error message
    }





}
