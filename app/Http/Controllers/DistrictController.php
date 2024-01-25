<?php

namespace App\Http\Controllers;

use App\Services\DistrictService;
use Illuminate\Http\Request;

class DistrictController extends Controller
{

    public function __construct(Request $request)
    {
        $this->district = new DistrictService($request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Daftar Wilayah Pemilihan';
        $data['uri'] = 'district';
        $data['rows'] = $this->district->getAll();
        $view = 'admin.district.index';
        return view($view, $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Wilayah Pemilihan';
        $data['uri'] = 'district';
        $view = 'admin.district.create';
        return view($view, $data);
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
            'name' => 'required',
        ]);
        $this->district->create();
        return redirect()->route('district')->with('success', 'Data berhasil ditambah');
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
        $data['title'] = 'Ubah Wilayah Pemilihan';
        $data['uri'] = 'district';
        $data['row'] = $this->district->getById($id);
        $view = 'admin.district.edit';
        return view($view, $data);
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
        $request->validate([
            'name' => 'required',
        ]);
        $this->district->update($id);
        return redirect()->route('district')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->district->delete($request->id);
        return redirect()->route('district')->with('success', 'Data berhasil dihapus');
    }
}
