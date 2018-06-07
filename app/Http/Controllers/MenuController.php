<?php

namespace App\Http\Controllers;

use Carbon;
use App\Models\ViewMenu;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
       public function index()
    {
        return view('database.menu');
    }

    public function get_datatable()
    {
        $model = ViewMenu::select([
            'nama_menu',
            'harga',
            'gambar',   
            'category',
            'deskripsi',         
        ]);

        $dt = DataTables::of($model);
        return $dt->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.menu.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	

    	if ( $request->file("gambar") ){
            $time = Carbon::now();
            $extension = $request->file("gambar")->getClientOriginalExtension();
            $directory = 'images/barang/';
            $filename = str_slug($request->input('menu')).'-'.date_format($time,'d').rand(1,999).date_format($time,'h').".".$extension;
            $upload_success = $request->file("gambar")->storeAs($directory, $filename, 'public');
        } else {
            $filename = '';
        }

        $object = [
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'id_category' => $request->id_category,
            'gambar' => $filename,
            'deskripsi' => $request->deskripsi,
        ];

        Validator::make($object, [
            'nama_menu' => 'required',
            'harga' => 'required',
            'id_category' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'deskripsi'
        ]);

        if (Menu::create($object)){
            return redirect('database/menu');
        };
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
        $data = [
            'menu' => Menu::find($id)
        ];

        return view('database.menu.edit', $data);
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
    	$object = [
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'id_category' => $request->id_category,
            //'gambar' => $filename
            'deskripsi' => $request->deskripsi,
            ];

        Validator::make($object, [
            'nama_menu' => 'required',
            'harga' => 'required',
            'id_category' => 'required',
            //'gambar' => 'required'           
            'deskripsi' => 'required',
        ]);

        if (Menu::find($id)->update($object)){
            return redirect('database/menu');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Menu::destroy($id)){
            return redirect('database/menu');
        }
    }
