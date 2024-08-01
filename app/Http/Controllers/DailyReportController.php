<?php

namespace App\Http\Controllers;

use App\DataTables\DailyReportDataTable;
use App\Models\DailyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DailyReportDataTable $dataTable)
    {
        return $dataTable->render('admin.daily-report.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.daily-report.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'waktu' => ['required'],
            'tim_bertugas' => ['required', 'max:200'],
            'nama_brand_klien' => ['max:200'],
            'lokasi_pertemuan' => ['max:200'],
            'nama_klien' => ['max:200'],
            'nomor_telepon' => ['max:200'],
            'jenis_kegiatan' => ['required', 'max:200'],
            'follow_up' => ['required', 'max:200'],
        ]);

        $dailyReport = new DailyReport();

        $dailyReport->waktu = $request->waktu;
        $dailyReport->tim_bertugas = $request->tim_bertugas;
        $dailyReport->nama_brand_klien = $request->nama_brand_klien;
        $dailyReport->lokasi_pertemuan = $request->lokasi_pertemuan;
        $dailyReport->nama_klien = $request->nama_klien;
        $dailyReport->nomor_telepon = $request->nomor_telepon;
        $dailyReport->jenis_kegiatan = $request->jenis_kegiatan;
        $dailyReport->follow_up = $request->follow_up;
        $dailyReport->user_team = Auth::user()->team;

        $dailyReport->save();

        toastr('Daily Report baru berhasil ditambah', 'success');

        return redirect()->route('admin.daily-report.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dailyReport = DailyReport::findOrFail($id);
        return view('admin.daily-report.edit', compact('dailyReport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'waktu' => ['required'],
            'tim_bertugas' => ['required', 'max:200'],
            'nama_brand_klien' => ['max:200'],
            'lokasi_pertemuan' => ['max:200'],
            'nama_klien' => ['max:200'],
            'nomor_telepon' => ['max:200'],
            'jenis_kegiatan' => ['required', 'max:200'],
            'follow_up' => ['required', 'max:200'],
        ]);

        $dailyReport = DailyReport::findOrfail($id);

        $dailyReport->waktu = $request->waktu;
        $dailyReport->tim_bertugas = $request->tim_bertugas;
        $dailyReport->nama_brand_klien = $request->nama_brand_klien;
        $dailyReport->lokasi_pertemuan = $request->lokasi_pertemuan;
        $dailyReport->nama_klien = $request->nama_klien;
        $dailyReport->nomor_telepon = $request->nomor_telepon;
        $dailyReport->jenis_kegiatan = $request->jenis_kegiatan;
        $dailyReport->follow_up = $request->follow_up;
        $dailyReport->user_team = Auth::user()->team;
        
        $dailyReport->save();

        toastr('Daily Report baru berhasil diupdate', 'success');

        return redirect()->route('admin.daily-report.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
