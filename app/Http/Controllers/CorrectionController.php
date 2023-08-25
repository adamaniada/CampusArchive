<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examen;
use App\Models\Correction;

class CorrectionController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function correction(string $designation_univ, string $designation_ufr, string $designation_filiere, string $id_examen)
    {
        $examen = Examen::where('id', '=', $id_examen)->first();
        // $correction = Correction::where('exam_id', '=', $id_examen)->first();

        return view('correction.index', compact('designation_univ', 'designation_ufr', 'designation_filiere', 'examen'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
        //
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
        //
    }
}
