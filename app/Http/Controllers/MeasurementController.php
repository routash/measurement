<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use App\Exports\MeasurementsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon; 


class MeasurementController extends Controller
{
    public function index()
    {
        $measurements = Measurement::all();
        return view('measurements.index', compact('measurements'));
    }

    public function create()
    {
        return view('measurements.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_name' => 'nullable|string|max:255',
            'details' => 'required|array',
        ]);

        $measurement = new Measurement();
        $measurement->client_name = $validatedData['client_name'];
        $measurement->details = json_encode($validatedData['details']); 
        $measurement->save();

        return redirect()->route('measurements.index')
                         ->with('success', 'Measurement created successfully.');
    }

    public function show($id)
    {
        $measurement = Measurement::find($id);
    
        if (!$measurement) {
            return response()->json(['error' => 'Measurement not found'], 404);
        }
            $details = $measurement->details;
        if (is_string($details)) {
            $details = json_decode($details, true);
        }
    
        return response()->json([
            'id' => $measurement->id,
            'client_name' => $measurement->client_name,
            'room_name' => $measurement->room_name,
            'details' => $details, 
        ]);
    }
    
    
    
    public function edit($id)
    {
        $measurement = Measurement::findOrFail($id);
        return view('measurements.edit', compact('measurement'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_name' => 'nullable|string|max:255',
            'details' => 'required|array',
            'details.*.room_name' => 'nullable|string',
            'details.*.top_width' => 'nullable|string',
            'details.*.left_height' => 'nullable|string',
            'details.*.blind_type' => 'nullable|string',
            'details.*.mount_type' => 'nullable|string',
            'details.*.fabric' => 'nullable|string',
            'details.*.notes' => 'nullable|string',
        ]);

        foreach ($validatedData['details'] as &$detail) {
            $detail['room_name'] = $detail['room_name'] ?? '';
            $detail['top_width'] = $detail['top_width'] ?? '';
            $detail['left_height'] = $detail['left_height'] ?? '';
            $detail['blind_type'] = $detail['blind_type'] ?? '';
            $detail['mount_type'] = $detail['mount_type'] ?? '';
            $detail['fabric'] = $detail['fabric'] ?? '';
            $detail['notes'] = $detail['notes'] ?? '';
        }

        $measurement = Measurement::findOrFail($id);

        $measurement->client_name = $validatedData['client_name'];
        $measurement->details = json_encode($validatedData['details']);
        
        $measurement->save();

        return redirect()->route('measurements.show', $id)->with('success', 'Measurement updated successfully');
    }

    public function destroy($id)
    {
        $measurement = Measurement::findOrFail($id);
        $measurement->delete();

        return redirect()->route('measurements.index')
                         ->with('success', 'Measurement deleted successfully.');
    }

  
public function exportMeasurement($id)
{
    $measurement = Measurement::find($id);

    if (!$measurement) {
        return redirect()->back()->with('error', 'Measurement not found.');
    }

    // Access client_name directly from the Measurement model
    $clientName = $measurement->client_name ?? 'unknown_client';
    $createdDate = Carbon::parse($measurement->created_at)->format('Y-m-d');

    // Create the filename with client name and creation date
    $filename = "{$clientName}_measurement_{$createdDate}.xlsx";

    return Excel::download(new MeasurementsExport($measurement), $filename);
}

}