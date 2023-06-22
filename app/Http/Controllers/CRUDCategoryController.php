<?php

namespace App\Http\Controllers;

use view;
use App\Models\Assets;
use App\Models\Category;
use Illuminate\Http\Request;

class CRUDCategoryController extends Controller
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
                'Category.index_category',
                [
                    "title" => "List Category",
                    "asset" => Assets::all(),
                    "categories" => Category::all()
                ]
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('CRUD.create_asset', [
            'title' => 'Tambah Asset',
            // 'active' => 'create_asset'
            'categories' => Category::all(),
        ]);
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
                'name' => 'required',
            ]
        );

        $data = [
            'name' => $request->input('name'),
        ];

        Category::create($data);
        if ($data) {
            // Jika data berhasil disimpan
            echo '<script>alert("Data berhasil disimpan");</script>';
        } else {
            // Jika terjadi kesalahan saat menyimpan data
            echo '<script>alert("Terjadi kesalahan saat menyimpan data");</script>';
        }
        return redirect('/categories')->with('Succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return response()->redirect('/categories');

    }
}