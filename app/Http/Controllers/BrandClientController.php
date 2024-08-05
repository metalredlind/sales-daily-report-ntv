<?php

namespace App\Http\Controllers;

use App\DataTables\BrandClientDataTable;
use App\Models\BrandClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BrandClientDataTable $dataTable)
    {
        return $dataTable->render('admin.brand-client.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand-client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pic_ntv' => ['required', 'max:200'],
            'jenis_industri' => ['required', 'max:200'],
            'nama_brand' => ['required', 'max:200'],
            'pic_brand_nama' => ['required', 'max:200'],
            'pic_brand_jabatan' => ['required', 'max:200'],
            'pic_brand_telepon' => ['required', 'max:200'],
            'proyeksi_revenue' => ['required', 'numeric'],
            'keterangan' => ['max:500'],
        ]);

        $brandClient = new BrandClient();

        $brandClient->pic_ntv = $request->pic_ntv;
        $brandClient->jenis_industri = $request->jenis_industri;
        $brandClient->nama_brand = $request->nama_brand;
        $brandClient->pic_brand_nama = $request->pic_brand_nama;
        $brandClient->pic_brand_jabatan = $request->pic_brand_jabatan;
        $brandClient->pic_brand_telepon = $request->pic_brand_telepon;
        $brandClient->proyeksi_revenue = $request->proyeksi_revenue;
        $brandClient->realisasi_revenue = 0;
        $brandClient->keterangan = $request->keterangan;
        $brandClient->user_team = Auth::user()->team;
        $brandClient->save();

        toastr('Brand/Klien baru berhasil ditambah', 'success');

        return redirect()->route('admin.brand-client.index');
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
        $brandClient = BrandClient::findOrFail($id);
        return view('admin.brand-client.edit', compact('brandClient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pic_ntv' => ['required', 'max:200'],
            'jenis_industri' => ['required', 'max:200'],
            'nama_brand' => ['required', 'max:200'],
            'pic_brand_nama' => ['required', 'max:200'],
            'pic_brand_jabatan' => ['required', 'max:200'],
            'pic_brand_telepon' => ['required', 'max:200'],
            'proyeksi_revenue' => ['required', 'numeric'],
            'realisasi_revenue' => ['required', 'numeric'],
            'keterangan' => ['max:500'],
        ]);

        $brandClient = BrandClient::findOrFail($id);

        $brandClient->pic_ntv = $request->pic_ntv;
        $brandClient->jenis_industri = $request->jenis_industri;
        $brandClient->nama_brand = $request->nama_brand;
        $brandClient->pic_brand_nama = $request->pic_brand_nama;
        $brandClient->pic_brand_jabatan = $request->pic_brand_jabatan;
        $brandClient->pic_brand_telepon = $request->pic_brand_telepon;
        $brandClient->proyeksi_revenue = $request->proyeksi_revenue;
        $brandClient->realisasi_revenue = $request->realisasi_revenue;
        $brandClient->keterangan = $request->keterangan;
        $brandClient->user_team = Auth::user()->team;
        
        $brandClient->save();

        toastr('Brand/Klien baru berhasil diupdate', 'success');

        return redirect()->route('admin.brand-client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brandClient = BrandClient::findOrFail($id);
        $brandClient->delete();

        return response(['status' => 'success', 'message'=> 'Brand/Klien is deleted successfully']);
    }
}
