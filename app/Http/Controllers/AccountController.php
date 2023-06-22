<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return
            response()->view(
                'Account.table_account',
                [
                    "title" => "List Assets",
                    "users" => User::all()
                ]
            )
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('Account.create_account', [
            'title' => 'Tambah Asset',
            // 'active' => 'create_asset'
            'users' => User::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'is_admin' => 'required|',
            ]
        );

        $data = [
            'is_admin' => $request->input('is_admin'),
        ];

        User::where('id', $id)->update($data);
        return redirect('/account')->with('success', 'Role Sudah Di Ganti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('/account')->with('success', 'Data Berhasil Dihapus');
    }
}