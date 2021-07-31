<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportUsers;
use App\Exports\ExportCandidates;
use App\Exports\ExportResult;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportuser() 
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportcandidate() 
    {
        return Excel::download(new ExportCandidates, 'candidates.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportresult() 
    {
        return Excel::download(new ExportResult, 'result.xlsx');
    }
}
