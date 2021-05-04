<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Students;
class StudentsController extends Controller
{
    public function index(){
     $data=Students::all();
        return view('index',compact('data'));
    }

    public function back(){
     return redirect ('/');
    }
    
    public function create(){
     return view('create');
    }

    public function insert(Request $request){
     $data=new Students();
        $data->nim=$request->get('nim');
        $data->nama_lengkap=$request->get('nama_lengkap');
        $data->jurusan=$request->get('jurusan');
        $data->save();
     return redirect ('/');
    }

    public function delete($id){
     $data=Students::find($id);
        $data->delete();
        return back();
    }

    public function edit($id){
     $data=Students::find($id);
     return view('edit',compact('data'));
    }

    public function update(Request $request, $id){     
     $data = Students::findOrFail($id);
        $data->nim=$request->get('nim');
        $data->nama_lengkap=$request->get('nama_lengkap');
        $data->jurusan=$request->get('jurusan');
        $data->save();
     return redirect ('/')->with('alert-success','Data berhasil Diubah.');
    }

    public function read($id){
     $data=Students::find($id);
     return view('read',compact('data'));
    }
}