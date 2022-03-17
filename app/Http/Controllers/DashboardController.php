<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $laporan = [
            'queryBulanan' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_bulanan, COALESCE(SUM(pengeluaran), 0) as pengeluaran_bulanan FROM transactions WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
            // 'queryTahunan' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_tahunan, COALESCE(SUM(pengeluaran), 0) as pengeluaran_tahunan FROM transactions WHERE YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
            'querySaldo' => DB::select('SELECT SUM(penerimaan - pengeluaran) as saldo FROM transactions')[0],
            'queryJanuari' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_januari, COALESCE(SUM(pengeluaran), 0) as pengeluaran_januari FROM transactions WHERE MONTH(created_at) = MONTH("2020-01-01 00:00:00") AND YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
            'queryFebruari' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_februari, COALESCE(SUM(pengeluaran), 0) as pengeluaran_februari FROM transactions WHERE MONTH(created_at) = MONTH("2020-02-01 00:00:00") AND YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
            'queryMaret' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_maret, COALESCE(SUM(pengeluaran), 0) as pengeluaran_maret FROM transactions WHERE MONTH(created_at) = MONTH("2020-03-01 00:00:00") AND YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
            'queryApril' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_april, COALESCE(SUM(pengeluaran), 0) as pengeluaran_april FROM transactions WHERE MONTH(created_at) = MONTH("2020-04-01 00:00:00") AND YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
            'queryMei' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_mei, COALESCE(SUM(pengeluaran), 0) as pengeluaran_mei FROM transactions WHERE MONTH(created_at) = MONTH("2020-05-01 00:00:00") AND YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
            'queryJuni' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_juni, COALESCE(SUM(pengeluaran), 0) as pengeluaran_juni FROM transactions WHERE MONTH(created_at) = MONTH("2020-06-01 00:00:00") AND YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
            'queryJuli' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_juli, COALESCE(SUM(pengeluaran), 0) as pengeluaran_juli FROM transactions WHERE MONTH(created_at) = MONTH("2020-07-01 00:00:00") AND YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
            'queryAgustus' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_agustus, COALESCE(SUM(pengeluaran), 0) as pengeluaran_agustus FROM transactions WHERE MONTH(created_at) = MONTH("2020-08-01 00:00:00") AND YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
            'querySeptember' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_september, COALESCE(SUM(pengeluaran), 0) as pengeluaran_september FROM transactions WHERE MONTH(created_at) = MONTH("2020-09-01 00:00:00") AND YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
            'queryOktober' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_oktober, COALESCE(SUM(pengeluaran), 0) as pengeluaran_oktober FROM transactions WHERE MONTH(created_at) = MONTH("2020-10-01 00:00:00") AND YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
            'queryNovember' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_november, COALESCE(SUM(pengeluaran), 0) as pengeluaran_november FROM transactions WHERE MONTH(created_at) = MONTH("2020-11-01 00:00:00") AND YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
            'queryDesember' => DB::select('SELECT COALESCE(SUM(penerimaan), 0) as penerimaan_desember, COALESCE(SUM(pengeluaran), 0) as pengeluaran_desember FROM transactions WHERE MONTH(created_at) = MONTH("2020-12-01 00:00:00") AND YEAR(created_at) = YEAR(CURRENT_DATE())')[0],
        ];

        return view('dashboard.index', ['laporan' => $laporan]);
    }
}
