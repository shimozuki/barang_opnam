<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuans = Satuan::orderBy('id','desc')->paginate(5);
    return view('satuan.index', compact('satuans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('satuan.create');
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

        Satuan::create($request->post())->save();

        return redirect()->route('satuan.index')->with('success','Company has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Satuan $satuan)
    {
        return view('satuan.show',compact('satuan'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Satuan $satuan)
    {
        $request->validate([
            'name' => 'required',
            'keterangan' => 'required',

        ]);

        $satuan->fill($request->post())->save();

        return redirect()->route('satuan.index')->with('success','Company Has Been updated successfully');
    }
    public function edit(Satuan $satuan)
    {
        return view('satuan.edit',compact('satuan'));
    }


    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->route('satuan.index')->with('success','Company has been deleted successfully');
    }
}
