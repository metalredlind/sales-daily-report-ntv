<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SalesDailyReportDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function dashboard(SalesDailyReportDataTable $dataTable)
    {
        return $dataTable->render('sales.dashboard');
    }
}
