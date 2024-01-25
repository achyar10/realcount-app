<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Post;
use App\Models\Tps;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
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


        // dd($data['totalVote']);

        return view('welcome', $data);
    }
}
