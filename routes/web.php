<?php

use Illuminate\Support\Facades\Route;
use App\Exports\MeasurementExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Measurement;


use App\Http\Controllers\MeasurementController;



Route::resource('measurements', MeasurementController::class);


Route::get('export-measurement/{id}', function ($id) {
    $measurement = Measurement::findOrFail($id);
    return Excel::download(new MeasurementExport($measurement), 'measurement.xlsx');
})->name('export.measurement');

Route::get('/export/measurement/{id}', [MeasurementController::class, 'exportMeasurement'])->name('export.measurement');
