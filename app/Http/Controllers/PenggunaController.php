<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Ruang;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->get();
        $role = Role::get();
        return view('pengguna.index', compact('users','role'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {


    $input = $request->all();

        User::create([

            'name'      => $input['name'],
            'email'      => $input['email'],
            'password'  => Hash::make($input ['password']),
            'role_id'      => $input['role_id'],

            // 'remember_token' => str_random(60),
        ]);


        return redirect()->route('pengguna.index')->with('success','Company has been created successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $role = Role::get();
        return view('pengguna.create',compact('users','role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $role = Role::get();

        return view('pengguna.edit', compact('user','role'));
    }

    public function update (Request $request, $id)
    {
        request()->validate([
            'name'       => 'required|string|min:2|max:100',
            'email'      => 'required|email|unique:users,email, ' . $id . ',id',
            'old_password' => 'nullable|string',
            'password' => 'nullable|required_with:old_password|string|confirmed|min:6',
            'role_id' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        // if ($request->filled('old_password')) {
        //     if (Hash::check($request->old_password, $user->password)) {
        //         $user->update([
        //             'password' => Hash::make($request->password)
        //         ]);
        //     } else {
        //         return back()
        //             ->withErrors(['old_password' => __('Please enter the correct password')])
        //             ->withInput();
        //     }
        // }

        if (request()->hasFile('photo')) {
            if($user->photo && file_exists(storage_path('app/public/photos/' . $user->photo))){
                Storage::delete('app/public/photos/'.$user->photo);
            }

            $file = $request->file('photo');
            $fileName = $file->hashName() . '.' . $file->getClientOriginalExtension();
            $request->photo->move(storage_path('app/public/photos'), $fileName);
            $user->photo = $fileName;
        }
        $user->role_id = $request->role_id;


        $user->save();
        return redirect()->route('pengguna.index')->with('success','Company has been created successfully.');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users= User::find($id);
        $users->delete();
        return redirect()->route('pengguna.index')->with('success','Company has been deleted successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
