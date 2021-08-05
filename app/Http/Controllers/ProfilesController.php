<?php

namespace App\Http\Controllers;
Use App\Models\Profiles;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {
     $profiles = Profiles::orderBy('id')->paginate(5);
     
     return view ('profiles.index', compact('profiles'));
    }

    public function create()
    {
     
     return view ('profiles.create');
    }
    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'nama' => 'required|unique:profiles|max:255',
          'tgl' => 'required',
          'jenis' => 'required',
          'alamat' => 'required',
          'no_tlp' => 'required|numeric',
          'email' => 'required',
      ]);
 
         $profiles = new Profiles;
 
         $profiles->nama = $request->nama;
         $profiles->tgl = $request->tgl;
         $profiles->jenis = $request->jenis;
         $profiles->alamat = $request->alamat;
         $profiles->no_tlp = $request->no_tlp;
         $profiles->email = $request->email;
 
         $profiles->save();
 
         return redirect('/');
 
    }
    public function show($id)
    {
       $profiles = Profiles::where('id',$id)->first();
       return view('profiles.show', ['profile' => $profile]);
    }
    public function edit($id)
    {
       $profiles = Profiles::where('id',$id)->first();
       return view('profiles.edit', ['profile' => $profile]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
         'nama' => 'required|unique:profiles|max:255',
         'tgl' => 'required',
         'jenis' => 'required',
         'alamat' => 'required',
         'no_tlp' => 'required|numeric',
         'email' => 'required',
        ]);
   
         profiles::find($id)->update([
            'nama' => $request->nama,
            'tgl' => $request->tgl,
            'jenis' => $request->jenis,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email
         ]);
   
         return redirect ('/');
    }
    public function destroy($id)
    {
       profiles::find($id)->delete();
       return redirect ('/');
    }

    public function profiles()
    {
        return view ('profileS.home');
    }
}
