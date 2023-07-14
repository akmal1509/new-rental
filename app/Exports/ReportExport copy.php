<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class ReportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = DB::table('visits')
        ->leftJoin('users', 'visits.userId', '=','users.id')
        ->leftJoin('customers', 'visits.customerId', '=','customers.id')
        ->select(
            ''
            'users.name'
        )
    }
}
