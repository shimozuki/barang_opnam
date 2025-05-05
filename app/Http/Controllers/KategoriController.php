<?php

namespace App\Http\Controllers;

use App\Exports\KategoriExport;
use App\Imports\KategoriImport;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\excel;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::orderBy('id', 'desc')->get();
        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'name' => 'required',
            'keterangan' => 'required',

        ]);

        Kategori::create($request->post());

        return redirect()->route('kategori.index')->with('success','Company has been created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        return view('kategori.show',compact('kategori'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit',compact('kategori'));
    }
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'name' => 'required',
            'keterangan' => 'required',

        ]);

        $kategori->fill($request->post())->save();

        return redirect()->route('kategori.index')->with('success','Company Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success','Company has been deleted successfully');
    }
    //import
    public function import()
    {
        Excel::import(new KategoriImport, request()->file('file'));
        return back();
    }
    //export
    public function export()
    {

        return Excel::download(new KategoriExport, 'kategori.xlsx' );
    }

}
