<?php

namespace App\Http\Controllers;

use App\DataTables\MediaOrderDataTable;
use App\Models\MediaOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MediaOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.media-order.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.media-order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'klien' => ['required','max:200'],
            'nomor_paket' => ['required', 'max:200'],
            'tanggal_paket' => ['required', 'max:100'],
            'nominal_paket' => ['required','numeric'],
            'jenis_paket' => ['required','max:200'],
            'status_paket' => ['required'],
            'user_team' => ['required']
        ]);

        $mediaOrder = new MediaOrder();

        $mediaOrder->klien = $request->klien;
        $mediaOrder->nomor_paket = $request->nomor_paket;
        $mediaOrder->tanggal_paket = $request->tanggal_paket;
        $mediaOrder->nominal_paket = $request->nominal_paket;
        $mediaOrder->jenis_paket = $request->jenis_paket;
        $mediaOrder->status_paket = $request->status_paket;
        $mediaOrder->user_team = $request->user_team;

        $mediaOrder->save();

        toastr('Media Order baru berhasil ditambah', 'success');

        return redirect()->route('admin.media-order.index');
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
        $mediaOrder = MediaOrder::findOrFail($id);
        return view('admin.media-order.edit', compact('mediaOrder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'klien' => ['required','max:200'],
            'nomor_paket' => ['required', 'max:200'],
            'tanggal_paket' => ['required', 'max:100'],
            'nominal_paket' => ['required','numeric'],
            'jenis_paket' => ['required','max:200'],
            'status_paket' => ['required'],
        ]);

        $mediaOrder = MediaOrder::findOrFail($id);

        $mediaOrder->klien = $request->klien;
        $mediaOrder->nomor_paket = $request->nomor_paket;
        $mediaOrder->tanggal_paket = $request->tanggal_paket;
        $mediaOrder->nominal_paket = $request->nominal_paket;
        $mediaOrder->jenis_paket = $request->jenis_paket;
        $mediaOrder->status_paket = $request->status_paket;
        $mediaOrder->user_team = $request->user_team;

        $mediaOrder->save();

        toastr('Media Order berhasil diedit', 'success');

        return redirect()->route('admin.media-order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mediaOrder = MediaOrder::findOrFail($id);
        $mediaOrder->delete();

        return response(['status' => 'success', 'message'=> 'Media Order has been deleted successfully']);
    }

    public function getData(MediaOrderDataTable $dataTable)
    {
        return $dataTable->ajax();
    }
}
