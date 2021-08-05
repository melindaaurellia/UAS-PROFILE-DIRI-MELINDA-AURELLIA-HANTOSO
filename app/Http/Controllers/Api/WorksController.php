<?php

namespace App\Http\Controllers\Api;

use App\Models\Works;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Works::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data',
            'data' => $works,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:data|max:255',
            'tahun' => 'required|numeric',
            
        ]);

        $work = Works::create([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
        ]);

        if($works)
        {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Ditambahkan',
                'data' => $works
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Ditambahkan',
                'data' => $works
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $work = Works::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail works Group',
            'data' => $work
        ], 200);
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
        $works = Works::find($id)->update([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil di rubah',
            'data' => $work
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Works::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di hapus',
            'data'    => $work
        ], 200);
    }
}
