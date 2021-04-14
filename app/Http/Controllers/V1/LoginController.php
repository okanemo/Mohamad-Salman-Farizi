<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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


    public function action(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
    //     if(app['auth']->viaRequest('api', function ($request){
    //         $currentUser = auth()->user()
    //         return response('Berhasil Login');
    //     });
    // );

        return response('Gagal login');
    }
}
