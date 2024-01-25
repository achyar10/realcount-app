<?php

namespace App\Services;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CandidateService
{

    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function getAll()
    {
        return Candidate::where('is_blank', 0)->orderBy('id', 'asc')->paginate(10);
    }

    public function findAll()
    {
        return Candidate::orderBy('sort_number', 'asc')->get();
    }

    public function getById($id)
    {
        return Candidate::find($id);
    }

    public function create()
    {
        $nameFile = null;
        if ($this->req->image) $nameFile = $this->upload('candidate', $this->req->image);
        $data =  Candidate::create([
            'sort_number' => $this->req->sort_number,
            'name' => $this->req->name,
            'image' => $nameFile,
        ]);
        return $data;
    }

    public function update($id)
    {
        $data = Candidate::find($id);
        $data->sort_number = $this->req->sort_number;
        $data->name = $this->req->name;
        if ($this->req->image) $data->image = $this->upload('candidate', $this->req->image);
        $data->save();
        return $data;
    }

    public function delete($id)
    {
        $data = Candidate::find($id);
        $data->delete();
        return $data;
    }

    public function upload($path, $image)
    {
        if (!File::exists($path)) {
            File::makeDirectory($path);
        }
        $nameFile = time() . '.' . $image->extension();
        $image->move(public_path($path), $nameFile);
        return $nameFile;
    }
}
