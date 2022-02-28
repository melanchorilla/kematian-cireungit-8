<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stock.index');
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
            'nama_barang' => $request['nama_barang'],
            'jumlah_barang' => $request['jumlah_barang'],
            'keterangan' => $request['keterangan'],
            'user_id' => auth()->user()->id,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        // dd($data);

        return Stock::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);
        return $stock;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stock = Stock::find($id);
        $stock->nama_barang = $request['nama_barang'];
        $stock->jumlah_barang = $request['jumlah_barang'];
        $stock->keterangan = $request['keterangan'];
        $stock->user_id = auth()->user()->id;
        $stock->updated_at = date("Y-m-d H:i:s");

        $stock->update();

        return $stock;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stock::destroy($id);
    }

    public function apiStock()
    {
        $stock = Stock::with('users')->get();
        return Datatables::of($stock)
            ->addIndexColumn()
            ->addColumn('name', function ($stock) {
                return $stock->users->name;
            })
            ->addColumn('action', function ($stock) {
                return '<a onclick="editForm(' . $stock->id . ')" class="btn btn-info btn-xs"><i class ="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData(' . $stock->id . ')" class="btn btn-danger btn-xs"><i class ="glyphicon glyphicon-trash"></i> Delete</a> ';
            })
            ->rawColumns(['action'])->make(true);
    }
}
