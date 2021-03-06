<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Nabs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NabController extends Controller
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
        $data = DB::table('nabs')->select('nab_amount', 'updated_at')->latest()->get();
        return response($data);
    }

    public function store(Request $request)
    {
        $data = new Nabs();
        $data->current_balance = $request->input('current_balance');
        $data->current_unit = $request->input('current_unit');
        $nab = $request->input('current_balance') /  $request->input('current_unit');
        $data->nab_amount = $nab;
        $data->save();

        return response('Berhasil Tambah Data');
    }

}
