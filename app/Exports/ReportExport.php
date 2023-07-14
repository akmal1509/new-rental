<?php

namespace App\Exports;

use App\Models\Visit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function view(): View
    {
        return view('pages.exports.report', [
            'invoices' => Visit::all()
        ]);
    }
}
