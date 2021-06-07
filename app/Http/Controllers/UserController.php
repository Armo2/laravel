<?php

namespace App\Http\Controllers;

use App\Models\users_data;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function show(){
        return view('welcome');
        
    }
    public function  add(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:5',
            'email' => 'required',
            'password' => 'required|max:5',],
            [
            'name.required' => 'REQUIRED.',
            
        ]);
        
       $data = array();
       $data['name'] = $request->name;
       $data['email'] = $request->email;
       $data['password'] = $request->password;
       DB::table('users_datas')->insert($data);
       return redirect()->back()->with('success'); 

    
    }
    public function getData(){
        $query=DB::table('users_datas')->paginate(2);
        //$query->appends(['user' => 'name']);
        //$query = DB::table('users_datas')->select('name');
        //$users = $query->addSelect('email')->get();
        return view('welcome', compact('query'));
        
    }

    public function editData($id){
        $findEditData = users_data::find($id);
        return view ('edit', compact('findEditData'));
    }

    public function updateData(Request $request, $id){
        $update = users_data::find($id)->update([
            
            'name'=>$request->name,
            'email'=>$request->email,
            
        ]);
        
        return redirect()->back()->with('success'); 
        

    }
}

