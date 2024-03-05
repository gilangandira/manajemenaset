<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('Account.table_account', [
            'title' => 'Account',
            'profiles' => User::all()
        ]);
    }

    public function profile($id)
    {
        $user = User::where('name', $id)->first();
        if (!$user) {
            // Menghandle jika pengguna dengan ID yang diberikan tidak ditemukan
            abort(404);
        }
        return view('Account.profile', [
            "title" => "detail",
            "user" => $user
        ]);
    }

    public function edit()
    {
        $data = Auth::user();

        return view('Account.edit', [
            'title' => 'Tambah Asset',
            'user' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            // Mengupdate data pada tabel User
            // $user = User::find($id);
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if ($request->filled('password')) {
                // Input baru untuk password diberikan
                $user->password = bcrypt($request->input('password'));
            }
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

            return redirect()->back()->with('success', 'Data berhasil diperbarui.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate data.');
        }
    }



}