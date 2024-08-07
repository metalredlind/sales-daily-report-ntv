<?php

namespace App\Http\Controllers;

use App\DataTables\ProposalSuratDataTable;
use App\Models\ProposalSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProposalSuratDataTable $dataTable)
    {
        return $dataTable->render('admin.proposal-surat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.proposal-surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => ['required', 'max:200'],
            'tujuan_surat' => ['required', 'max:100'],
            'perihal' => ['required','max:200'],
            'status_follow_up' => ['required'],
        ]);

        $proposalSurat = new ProposalSurat();

        $proposalSurat->no_surat = $request->no_surat;
        $proposalSurat->tujuan_surat = $request->tujuan_surat;
        $proposalSurat->perihal = $request->perihal;
        $proposalSurat->status_follow_up = $request->status_follow_up;
        $proposalSurat->user_team = Auth::user()->team;

        $proposalSurat->save();

        toastr('Proposal/Surat baru berhasil ditambah', 'success');

        return redirect()->route('admin.proposal-surat.index');
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
        $proposalSurat = ProposalSurat::findOrFail($id);
        return view('admin.proposal-surat.edit', compact('proposalSurat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'no_surat' => ['required', 'max:200'],
            'tujuan_surat' => ['required', 'max:100'],
            'perihal' => ['required','max:200'],
            'status_follow_up' => ['required'],
        ]);

        $proposalSurat = ProposalSurat::findOrFail($id);

        $proposalSurat->no_surat = $request->no_surat;
        $proposalSurat->tujuan_surat = $request->tujuan_surat;
        $proposalSurat->perihal = $request->perihal;
        $proposalSurat->status_follow_up = $request->status_follow_up;
        $proposalSurat->user_team = Auth::user()->team;

        $proposalSurat->save();

        toastr('Proposal/Surat baru berhasil diupdate', 'success');

        return redirect()->route('admin.proposal-surat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proposalSurat = ProposalSurat::findOrFail($id);
        $proposalSurat->delete();

        return response(['status' => 'success', 'message'=> 'Proposal/Surat is deleted successfully']);
    }

    public function getData(ProposalSuratDataTable $dataTable)
    {
        return $dataTable->ajax();
    }
}
