<?php

namespace App\Exports;

use App\User;
use App\Candidate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportResult implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'paslon',
            'total suara'
        ];
    }

    public function collection()
    {
        $result = array();

        foreach (Candidate::all() as $candidate) {
            $result[$candidate->id][] = $candidate->nama_ketua ." & ".$candidate->nama_wakil;
            $result[$candidate->id][] = User::where('candidate_id',$candidate->id)->count();
        }

        return collect($result);
    }
}