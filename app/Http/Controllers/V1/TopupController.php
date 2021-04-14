<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Balances;
use App\Models\Nabs;
use App\Models\Topups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class TopupController extends Controller
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
        
        $top = new Topups();
        $blc = new Balances();
        $amount = DB::table('nabs')->pluck('nab_amount')->last();
        $saldoUnit = DB::table('balances')->orderBy('user_id')->pluck('saldo_unit_total')->last();
        $saldoRupiah = DB::table('balances')->orderBy('user_id')->pluck('saldo_rupiah_total')->last();

        $top->user_id = $request->input('user_id');
        $blc->user_id = $request->input('user_id');
        $top->amount_rupiah_tp = $request->input('amount_rupiah_tp');
        $nab = $request->input('amount_rupiah_tp') /  $amount;
        $top->nilai_unit_hasil_topup = $nab;
        
        $blc->saldo_unit_total = $nab + $saldoUnit;
        $blc->saldo_rupiah_total = $request->input('amount_rupiah_tp') + $saldoRupiah;
        $top->save();
        $blc->save();

        $data = DB::table('topups')->join('balances', 'topups.user_id', '=', 'balances.user_id')->select('topups.*', 'balances.saldo_unit_total', 'balances.saldo_rupiah_total')->latest()->get();
        return response($data);
    }

}
