<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Services\CandidateService;
use App\Services\TpsService;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function __construct(Request $request)
    {
        $this->tps = new TpsService($request);
        $this->candidate = new CandidateService($request);
    }

    public function index()
    {
        $votes = Vote::where([
            'user_id' => auth()->user()->id,
            'tps_id' => auth()->user()->tps_id
        ])->get();

        $data['title'] = 'Tambah Vote';
        $data['uri'] = 'vote';
        $data['tps'] = auth()->user()->tps_id ? $this->tps->getById(auth()->user()->tps_id) : $this->tps->findAll();
        $data['candidates'] = $this->candidate->findAll();
        $data['votes'] = $votes;
        return view('admin.vote.index', $data);
    }

    public function store(Request $request)
    {
        $data = [];
        $tps = $this->tps->getById($request->tps_id);
        $total_dpt = $tps->total_dpt;
        $total_suara = 0;
        for ($i = 0; $i < count($request->candidate_id); $i++) {
            $total_suara += $request->total[$i];
            array_push($data, [
                'id' => $request->vote_id[$i] ?? null,
                'tps_id' => $request->tps_id,
                'user_id' => $request->user_id,
                'candidate_id' => $request->candidate_id[$i],
                'district_id' => $tps->district_id,
                'total' => $request->total[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        if ($total_suara > $total_dpt) {
            return redirect()->route('vote')->with('error', 'Total suara melebihi total dpt');
        }
        Vote::upsert($data, ['id']);
        return redirect()->route('vote')->with('success', 'Data berhasil disubmit');
    }
}
