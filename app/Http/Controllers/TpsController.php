<?php

namespace App\Http\Controllers;

use App\Services\DistrictService;
use App\Services\TpsService;
use Illuminate\Http\Request;

class TpsController extends Controller
{

    public function __construct(Request $request)
    {
        $this->tps = new TpsService($request);
        $this->district = new DistrictService($request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Daftar TPS';
        $data['uri'] = 'tps';
        $data['rows'] = $this->tps->getAll();
        $view = 'admin.tps.index';
        return view($view, $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah TPS';
        $data['uri'] = 'tps';
        $data['districts'] = $this->district->findAll();
        $view = 'admin.tps.create';
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
            'district_id' => 'required',
            'number_of_tps' => 'required',
            'total_dpt' => 'required',
            'is_active' => 'required',
        ]);
        $this->tps->create();
        return redirect()->route('tps')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Detail TPS';
        $data['uri'] = 'tps';
        $data['row'] = $this->tps->getById($id);
        $view = 'admin.tps.detail';
        // return $data;
        return view($view, $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Ubah TPS';
        $data['uri'] = 'tps';
        $data['row'] = $this->tps->getById($id);
        $data['districts'] = $this->district->findall();
        $view = 'admin.tps.edit';
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
            'district_id' => 'required',
            'number_of_tps' => 'required',
        ]);
        $this->tps->update($id);
        return redirect()->route('tps')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->tps->delete($request->id);
        return redirect()->route('tps')->with('success', 'Data berhasil dihapus');
    }
}
