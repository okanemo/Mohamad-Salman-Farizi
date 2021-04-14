<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Invesments;
use Illuminate\Http\Request;

class InvesmentsController extends Controller
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
        $data = Invesments::all();
        return response($data);
    }

    public function store(Request $request)
    {
        $data = new Invesments();
        $data->nab_amount = $request->input('nab_amount');
        $data->current_balance = $request->input('current_balance');
        $data->current_unit = $request->input('current_unit');
        $data->save();

        return response('Berhasil Tambah Data');
    }
}
