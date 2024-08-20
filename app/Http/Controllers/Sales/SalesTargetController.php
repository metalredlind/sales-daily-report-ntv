<?php

namespace App\Http\Controllers\Sales;

use App\DataTables\TargetSalesDataTable;
use App\Http\Controllers\Controller;
use App\Models\TargetSales;
use App\Models\User;
use Illuminate\Http\Request;

class SalesTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TargetSalesDataTable $dataTable)
    {
        return $dataTable->render('sales.target-sales.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // Fetch all users
        return view('sales.target-sales.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_sales_id' => 'required|exists:users,id',
            'target_sales' => 'required|numeric',
            'month' => 'required|digits:2',
            'year' => 'required|digits:4',
        ]);

        $targetSales = new TargetSales();
        $targetSales->user_sales_id = $request->user_sales_id;
        $targetSales->target_sales = $request->target_sales;
        $targetSales->month = $request->month;
        $targetSales->year = $request->year;
        $targetSales->save();

        return redirect()->route('sales.target-sales.index')->with('success', 'Target Sales created successfully.');
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
        return view('sales.target-sales.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $targetSales = TargetSales::findOrFail($id);
        $targetSales->delete();

        return response(['status' => 'success', 'message'=> 'Target has been deleted successfully']);
    }
}
