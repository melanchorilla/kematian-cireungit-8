<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Datatables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'penerimaan' => $request['penerimaan'],
            'pengeluaran' => $request['pengeluaran'],
            'keterangan' => $request['keterangan'],
            'user_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];


        return Transaction::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        return $transaction;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->penerimaan = $request['penerimaan'];
        $transaction->pengeluaran = $request['pengeluaran'];
        $transaction->keterangan = $request['keterangan'];
        $transaction->updated_at = date("Y-m-d H:i:s");
        $transaction->update();

        return $transaction;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::destroy($id);
    }

    public function apiTransaction()
    {
        // $transaction = Transaction::all();
        $transaction = Transaction::with('users')->get();
        return Datatables::of($transaction)
            ->addIndexColumn()
            ->editColumn('created_at', function ($transaction) {
                return date('d-m-Y', strtotime($transaction->created_at));
            })
            ->addColumn('name', function ($transaction) {
                return $transaction->users->name;
            })
            ->addColumn('action', function ($transaction) {
                return '<a onclick="editForm(' . $transaction->id . ')" class="btn btn-info btn-xs"><i class ="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData(' . $transaction->id . ')" class="btn btn-danger btn-xs"><i class ="glyphicon glyphicon-trash"></i> Delete</a> ';
            })
            ->rawColumns(['action'])->make(true);
    }
}
