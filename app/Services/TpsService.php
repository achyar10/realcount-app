<?php

namespace App\Services;

use App\Models\Tps;
use Illuminate\Http\Request;

class TpsService
{

    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function getAll()
    {
        return Tps::with('district')->orderBy('id', 'asc')->paginate(10);
    }

    public function findAll()
    {
        return Tps::with('district')->orderBy('number_of_tps', 'asc')->get();
    }

    public function getById($id)
    {
        return Tps::with('district')
            ->find($id);
    }

    public function create()
    {
        $data =  Tps::create([
            'number_of_tps' => $this->req->number_of_tps,
            'total_dpt' => $this->req->total_dpt,
            'address' => $this->req->address,
            'pic' => $this->req->pic,
            'is_active' => $this->req->is_active,
            'district_id' => $this->req->district_id,
        ]);
        return $data;
    }

    public function update($id)
    {
        $data = Tps::find($id);
        $data->number_of_tps = $this->req->number_of_tps;
        $data->total_dpt = $this->req->total_dpt;
        $data->address = $this->req->address;
        $data->pic = $this->req->pic;
        $data->is_active = $this->req->is_active;
        $data->district_id = $this->req->district_id;
        $data->save();
        return $data;
    }

    public function delete($id)
    {
        $data = Tps::find($id);
        $data->delete();
        return $data;
    }
}
