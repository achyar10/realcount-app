<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\District;
use App\Models\Post;
use App\Models\Tps;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $data['tpsTotal'] = Tps::count();
        $data['tpsVote'] = Vote::all()->groupBy('tps_id')->count();
        $data['totalVote'] = Vote::where('candidate_id', '!=', 1)->sum('total');
        $data['percent'] = intval(($data['tpsVote'] / $data['tpsTotal']) * 100);
        $data['votes'] = Vote::where('candidate_id', '!=', 1)->select('candidate_id', DB::raw('SUM(total) as total_vote'))->groupBy('candidate_id')->get();
        $data['invalidVote'] = Vote::where('candidate_id', 1)->sum('total');

        $invalidPercent = $data['invalidVote'] == 0 ? 0 : floatval(($data['invalidVote'] / $data['totalVote']) * 100);
        $data['invalidPercent'] = number_format($invalidPercent, 2);

        $candidates = Candidate::where('id', '!=', 1)->get();
        $data['pie'] = [];
        $data['candidates'] = [];
        foreach ($candidates as $key) {
            $total_vote = 0;
            foreach ($data['votes'] as $vote) {
                if ($vote->candidate_id == $key->id) {
                    $total_vote += intval($vote->total_vote);
                }
            }
            array_push($data['pie'], [
                'name' => 'No. ' . $key->sort_number,
                'y' => $total_vote
            ]);
            $percent = $total_vote == 0 ? 0 : floatval(($total_vote / $data['totalVote']) * 100);
            array_push($data['candidates'], [
                'sort_number' => $key->sort_number,
                'name' => $key->name,
                'image' => $key->image,
                'total_vote' => $total_vote,
                'percent' => number_format($percent, 2),
            ]);
        }
        $data['districts'] = District::select('id', 'name')->get();
        $data['api'] = $this->detail($request);

        // dd($data['totalVote']);

        return view('welcome', $data);
    }

    public function detail(Request $request)
    {
        $district_id = $request->district_id ?? null;
        $filter = [];
        if ($district_id) {
            $filter['district_id'] = $district_id;
        }
        $tps = Tps::where($filter)->get();
        $candidates = Candidate::orderBy('sort_number', 'asc')->get();
        $votes = Vote::where([])->select('candidate_id', 'tps_id', DB::raw('SUM(total) as total_vote'))->groupBy(['candidate_id', 'tps_id'])->get();

        // Calculate
        $dataTps = [];
        foreach ($tps as $tp) {
            $dataCan = [];
            $total_suara_tps = 0;
            foreach ($candidates as $can) {
                $total_vote = 0;
                $grand_total_vote = 0;
                foreach ($votes as $vote) {
                    if ($vote->tps_id == $tp->id && $vote->candidate_id == $can->id) {
                        $total_vote += intval($vote->total_vote);
                        $total_suara_tps += intval($vote->total_vote);
                    }
                    if ($tp->id == $vote->tps_id && $vote->candidate_id != 1) {
                        $grand_total_vote += intval($vote->total_vote);
                    }
                }
                $percent = $total_vote == 0 ? 0 : floatval(($total_vote / $grand_total_vote) * 100);
                array_push($dataCan, [
                    'id' => $can->id,
                    'sort_number' => $can->sort_number,
                    'name' => $can->name,
                    'total_vote' => $total_vote,
                    'percent' => number_format($percent, 2),
                    'grand_total_vote' => $grand_total_vote,
                    'grand_total_percent' => ($grand_total_vote > 0) ? 100 : '0.00',
                ]);
            }
            array_push($dataTps, [
                'no_tps' => $tp->number_of_tps,
                'total_dpt' => $tp->total_dpt,
                'total_suara' => $total_suara_tps,
                'absen' => $tp->total_dpt - $total_suara_tps,
                'plano' => null,
                'candidates' => $dataCan
            ]);
        }
        return $dataTps;
        // return response()->json($dataTps, 200);
    }
}
