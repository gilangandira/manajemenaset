<?php

namespace App\Http\Controllers;

use view;
use App\Models\Type;
use App\Models\Assets;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;




class CRUDAssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response(
            view(
                'CRUD.asset_table',
                [
                    "title" => "List Assets",
                    "assets" => Assets::all()
                ]
            )
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return response(view('CRUD.create_asset', [
            'title' => 'Tambah Asset',
            // 'active' => 'create_asset'
            'assets' => Assets::all(),
            'categories' => Category::all(),
            'statuses' => Status::all(),

        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_aset' => 'required',
                'category_id' => 'required',
                'image' => 'image|file',
                'status_id' => 'required',
                'type' => 'required',
                'description' => 'required',
                'location' => 'required',
                'serial_number' => 'required',
                'price' => 'required',
                'date_buyed' => 'required',
            ]
        );

        $data = [
            'nama_aset' => $request->input('nama_aset'),
            'category_id' => $request->input('category_id'),
            'image' => $request->input('image'),
            'status_id' => $request->input('status_id'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'serial_number' => $request->input('serial_number'),
            'price' => $request->input('price'),
            'date_buyed' => $request->input('date_buyed'),
        ];

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('assets-images');
        }

        $data['user_id'] = auth()->user()->id;

        Assets::create($data);
        return redirect('/assets')->with('success', 'Data Berhasil Disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Assets::where('serial_number', $id)->first();
        return response(view('CRUD.detail_assets', [
            "title" => "detail",
            "asset" => $data
        ]));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Assets::where('serial_number', $id)->first();
        return response(view('CRUD.edit_asset', [
            'title' => 'Tambah Asset',
            'asset' => $data,
            'categories' => Category::all(),
            'statuses' => Status::all(),
        ]));
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
        $request->validate(
            [
                'nama_aset' => 'required',
                'category_id' => 'required',
                'image' => 'image|file',
                'status_id' => 'required',
                'type' => 'required',
                'description' => 'required',
                'location' => 'required',
                'serial_number' => 'required',
                'price' => 'required',
                'date_buyed' => 'required',
            ]
        );

        $data = [
            'nama_aset' => $request->input('nama_aset'),
            'category_id' => $request->input('category_id'),
            'image' => $request->input('image'),
            'status_id' => $request->input('status_id'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'serial_number' => $request->input('serial_number'),
            'price' => $request->input('price'),
            'date_buyed' => $request->input('date_buyed'),
        ];
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')->store('assets-images');
        } else {
            $data['image'] = $request->oldImage;
        }

        $data['user_id'] = auth()->user()->id;
        Assets::where('serial_number', $id)->update($data);
        return redirect('/assets')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Assets::where('serial_number', $id)->delete();
        return redirect('/assets')->with('success');
    }
}