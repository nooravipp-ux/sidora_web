<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        $roles = DB::table('m_role')->get();
        return view('role.index', compact('roles'));
    }

    public function store(Request $request){

        DB::table('m_role')->insert([
            'role' => $request->role,
        ]);

        return redirect()->back();
    }

    public function edit($id) {

        $roles = DB::table('m_role')->where('id', $id)->first();
        return view('role.edit', compact('roles'));
    }

    public function update(Request $request){

        DB::table('m_role')->where('id', $request->id)->update([
            'role' => $request->role,
        ]);

        return redirect()->back();
    }

    public function delete($id){
        DB::table('m_role')->where('id', $id)->delete();
        return redirect()->back();
    }
}
