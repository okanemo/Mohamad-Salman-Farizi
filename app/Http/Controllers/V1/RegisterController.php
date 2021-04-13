<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
// use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $data = Users::all();
        return response($data);
    }
    public function show($id)
    {
        $data = Users::where('id', $id)->get();
        return response($data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
       Users::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password) 
        ]);
        
        return response('Berhasil Tambah Data');
    }

    public function destroy($id)
    {
        $data = Users::where('id', $id)->first();
        $data->delete();

        return response('Berhasil Menghapus Data');
    }
}
