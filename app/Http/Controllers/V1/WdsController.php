<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Balances;
use App\Models\Nabs;
use App\Models\Wds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;


class WdsController extends Controller
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

    public function store(Request $request)
    {
        
        $wd = new Wds();
        $blc = new Balances();
        $amount = DB::table('nabs')->pluck('nab_amount')->last();
        $saldoUnit = DB::table('balances')->groupBy('user_id')->pluck('saldo_unit_total')->last();
        $saldoRupiah = DB::table('balances')->groupBy('user_id')->pluck('saldo_rupiah_total')->last();

        $wd->user_id = $request->input('user_id');
        $blc->user_id = $request->input('user_id');
        $wd->amount_rupiah_wd = $request->input('amount_rupiah_wd');
        $nab = $request->input('amount_rupiah_wd') /  $amount;
        $wd->nilai_unit_hasil_topup = $nab;
        
        $blc->saldo_unit_total = $nab - $saldoUnit;
        $blc->saldo_rupiah_total = $request->input('amount_rupiah_wd') - $saldoRupiah;
        $wd->save();
        $blc->save();

        $data = DB::table('topups')->join('balances', 'topups.user_id', '=', 'balances.user_id')->select('topups.*', 'balances.saldo_unit_total', 'balances.saldo_rupiah_total')->latest()->get();
        return response($data);
    }

}
