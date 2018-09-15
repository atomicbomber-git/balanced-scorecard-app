<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scorecard;

class ScorecardController extends Controller
{
    public function index()
    {
        $scorecards = Scorecard::select('id', 'year')
            ->get();

        return view('scorecard.index', compact('scorecards'));
    }
}
