<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Assets;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


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

    public function edit($id)
    {
        $data = User::where('id', $id)->first();
        return response(view('Account.edit_account', [
            'title' => 'Edit Account',
            'user' => $data,
        ]));
    }


    public function update(Request $request, $id)
    {

        DB::beginTransaction();

        try {
            // Mengupdate data pada tabel User
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if ($request->filled('password')) {
                // Input baru untuk password diberikan
                $user->password = bcrypt($request->input('password'));
            }
            $user->is_admin = $request->input('is_admin');
            $user->save();

            // Mengupdate data pada tabel Profile yang berelasi dengan User
            $profile = $user->profile;
            $profile->kelamin = $request->input('image');
            $profile->kelamin = $request->input('kelamin');
            $profile->agama = $request->input('agama');
            $profile->jabatan = $request->input('jabatan');
            $profile->alamat = $request->input('alamat');

            if ($request->file('image')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $profile['image'] = $request->file('image')->store('users-images');
            }

            $profile->save();
            DB::commit();

            return redirect('/account')->with('success', 'Data berhasil diperbarui.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect('/account')->with('error', 'Terjadi kesalahan saat mengupdate data.');
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ID pengguna yang dilindungi
        $protectedUserIds = [8]; // Gantilah dengan ID-ID yang sesuai

        $user = User::find($id);

        if ($user) {
            // Periksa apakah ID pengguna berada dalam daftar yang dilindungi
            if (in_array($user->id, $protectedUserIds)) {
                return redirect('/account')->with('error', 'Akun ini tidak dapat dihapus.');
            } else {
                // Dapatkan semua aset yang terkait dengan pengguna
                $assets = Assets::where('user_id', $user->id)->get();

                // Ubah nilai user_id pada semua aset yang terkait menjadi null
                foreach ($assets as $asset) {
                    $asset->user_id = 8; // Atau ganti dengan nilai default yang sesuai jika ada
                    $asset->save();
                }

                // Hapus pengguna
                $user->delete();

                return redirect('/account')->with('success', 'Data berhasil dihapus.');
            }
        } else {
            return redirect('/account')->with('error', 'Pengguna tidak ditemukan.');
        }
    }





}