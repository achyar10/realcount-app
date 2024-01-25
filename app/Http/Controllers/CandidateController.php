<?php

namespace App\Http\Controllers;

use App\Services\CandidateService;
use Illuminate\Http\Request;

class CandidateController extends Controller
{

    public function __construct(Request $request)
    {
        $this->candidate = new CandidateService($request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Daftar Kandidat';
        $data['uri'] = 'candidate';
        $data['rows'] = $this->candidate->getAll();
        $view = 'admin.candidate.index';
        return view($view, $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Kandidat';
        $data['uri'] = 'candidate';
        $view = 'admin.candidate.create';
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
            'sort_number' => 'required',
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|max:1024'
        ]);
        $this->candidate->create();
        return redirect()->route('candidate')->with('success', 'Data berhasil ditambah');
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
        $data['title'] = 'Ubah Kandidat';
        $data['uri'] = 'candidate';
        $data['row'] = $this->candidate->getById($id);
        $view = 'admin.candidate.edit';
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
            'sort_number' => 'required',
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|max:1024'
        ]);
        $this->candidate->update($id);
        return redirect()->route('candidate')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->candidate->delete($request->id);
        return redirect()->route('candidate')->with('success', 'Data berhasil dihapus');
    }
}
