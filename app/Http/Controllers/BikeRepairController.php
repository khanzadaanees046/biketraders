<?php

namespace App\Http\Controllers;

use App\Models\BikeRepair;
use Illuminate\Http\Request;

class BikeRepairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repaiers = BikeRepair::paginate(20);
        return view('admin.bike-repaire', compact('repaiers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required',
            'bike_chase_no' => 'required',
            'bike_no' => 'required',
        ]);

        $data = $request->all();
        $repaiers = BikeRepair::create($data);
        return back()->with('message', 'Bike Repairing Added Succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BikeRepair $bikeRepair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BikeRepair $bikeRepair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BikeRepair $bikeRepair)
    {
        //
        $validated = $request->validate([
            'customer_name' => 'required',
            'bike_chase_no' => 'required',
            'bike_no' => 'required',
        ]);

        $bikeRepair->update($request->all());
        return back()->with('message', 'Bike Repairing Updated Succesfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $repaiers = BikeRepair::find($id);
        $repaiers->delete();
        return back()->with('message', 'Bike Repairing Deleted Succesfully.');

    }
    // -------------
    public function replaceRepaireBike($id)
    {
        $repaiers = BikeRepair::find($id);
        $repaiers->status = 1;
        $repaiers->save();
        return back()->with('message', 'Bike Repairing Status Change Succesfully.');

    }
}
