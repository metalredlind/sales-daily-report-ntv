<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BrandClient;
use App\Models\TargetSales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function dashboard()
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
        $selisih_varian = $realisasi - $target;

        // Team data
        $team = $user->team;

        // Get all team members' user IDs
        $teamMemberIds = \App\Models\User::where('team', $team)->pluck('id');

        $target_team = TargetSales::whereIn('user_sales_id', $teamMemberIds)
            ->where('month', $currentMonth)
            ->where('year', $currentYear)
            ->sum('target_sales');

        $realisasi_team = BrandClient::whereIn('pic_ntv_id', $teamMemberIds)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('realisasi_revenue');

        $selisih_varian_team = $realisasi_team  - $target_team;

        // Pass the data to the view
        return view('manager.dashboard', compact('target', 'realisasi', 'selisih_varian', 'target_team', 'realisasi_team', 'selisih_varian_team'));
    }
}
