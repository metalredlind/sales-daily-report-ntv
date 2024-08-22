<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SalesDailyReportDataTable;
use App\Http\Controllers\Controller;
use App\Models\BrandClient;
use App\Models\TargetSales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function dashboard(SalesDailyReportDataTable $dataTable)
    {
        // Get the current user
        $user = Auth::user();

        // Get the current month and year
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');

        // Get target sales for the current month
        $targetSales = TargetSales::where('user_sales_id', $user->id)
            ->where('month', $currentMonth)
            ->where('year', $currentYear)
            ->first();

        $target = $targetSales ? $targetSales->target_sales : 0;

        // Sum of realisasi_revenue for the current month
        $realisasi = BrandClient::where('pic_ntv_id', $user->id)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('realisasi_revenue');

        // Calculate the difference
        $selisih_varian = $target - $realisasi;

        // Pass the data to the view
        return $dataTable->render('sales.dashboard', compact('target', 'realisasi', 'selisih_varian'));
    }
}
