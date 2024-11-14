<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BrandClient;
use App\Models\TargetSales;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $currentMonth = Carbon::now()->format('m'); // Current month
    $currentYear = Carbon::now()->format('Y');  // Current year

    // Get all teams
    $teams = User::where('team', '!=', 0)->distinct()->pluck('team');

    $teamData = [];

    foreach ($teams as $team) {
        // Sum target_sales for this team for the current month and year
        $target_team = TargetSales::whereHas('user', function($query) use ($team) {
            $query->where('team', $team);
        })
        ->where('month', $currentMonth)
        ->where('year', $currentYear)
        ->sum('target_sales');

        // Sum realisasi_revenue for this team for the current month and year
        $realisasi_team = BrandClient::where('user_team', $team)
        ->whereMonth('created_at', $currentMonth)
        ->whereYear('created_at', $currentYear)
        ->sum('realisasi_revenue');

        // Calculate selisih/varian
        $selisih_varian_team = $realisasi_team - $target_team;

        $teamData[$team] = [
            'target_team' => $target_team,
            'realisasi_team' => $realisasi_team,
            'selisih_varian_team' => $selisih_varian_team,
        ];
    }

    return view('admin.dashboard', compact('teamData'));
    }
}
