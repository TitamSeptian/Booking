<?php

namespace App\Http\Controllers;

use App\Http\Requests\tempatRequest;
use Illuminate\Http\Request;
use App\Tempat;
use Yajra\DataTables\DataTables;
class TempatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('argon.pages.tempat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('argon.pages.tempat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tempatRequest $request)
    {
        $data = $request->all();
        $tempat = Tempat::create($data);
        return response()->json(['msg' => $tempat->name.' Berhasil Di Tambahkan']);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function data()
    {
        $tempat = Tempat::query()->latest('created_at');
        return DataTables::of($tempat)->addColumn('action', function ($tempat){
            return view('compo.actions.tempatAction',[
                'model' => $tempat,
                'urlShow' => route('tempat.show', $tempat->id),
                'urlEdit' => route('tempat.edit', $tempat->id),
                'urlDelete' => route('tempat.destroy', $tempat->id),
            ]);
        })->rawColumns(['action'])->addIndexColumn()->make(true);
    }
}
