<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json($users);
    }

    public function show($id){
        $users = User::find($id);
        return response()->json($users);
    }

    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        return response()->json([
            "status" => true,
            "message" => 'Data Berhasil di simpan',
            "data" => $user
        ]);
    }
}
