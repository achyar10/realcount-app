<?php

namespace App\Services;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictService
{

    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function getAll()
    {
        return District::orderBy('id', 'asc')->paginate(10);
    }

    public function findAll()
    {
        return District::orderBy('name', 'asc')->get();
    }

    public function getById($id)
    {
        return District::find($id);
    }

    public function create()
    {
        $data =  District::create([
            'name' => $this->req->name
        ]);
        return $data;
    }

    public function update($id)
    {
        $data = District::find($id);
        $data->name = $this->req->name;
        $data->save();
        return $data;
    }

    public function delete($id)
    {
        $data = District::find($id);
        $data->delete();
        return $data;
    }
}
