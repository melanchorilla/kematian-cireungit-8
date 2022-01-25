<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Yajra\DataTables\Datatables;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
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
        //
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
        $user = User::find($id);
        return $user;
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
        if ($id == 1) {
            return false;
        }

        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];

        if ($request['active'] == '1') {
            $user->active = 1;
        } else {
            $user->active = 0;
        }

        $user->update();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 1) {
            return false;
        }
        User::destroy($id);
    }

    public function apiUser()
    {
        $user = User::all();
        return Datatables::of($user)
            ->addIndexColumn()
            ->editColumn('created_at', function ($user) {
                return date('d-m-Y', strtotime($user->created_at));
            })
            ->editColumn('active', function ($user) {
                if ($user->active == 1) {
                    return "Aktif";
                } else if ($user->active == 0) {
                    return "Tidak Aktif";
                }
            })
            ->addColumn('action', function ($user) {
                return '<a onclick="editForm(' . $user->id . ')" class="btn btn-info btn-xs"><i class ="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData(' . $user->id . ')" class="btn btn-danger btn-xs"><i class ="glyphicon glyphicon-trash"></i> Delete</a> ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function editProfile($id)
    {
        $user = User::find($id);
        return view('user.profile', compact('user'));
    }


    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
            'name' => $request->name
        ]);
        return redirect()->route('profile')->withSuccess("Profile has been updated!");
    }
}
