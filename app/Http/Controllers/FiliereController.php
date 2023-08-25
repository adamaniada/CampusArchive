<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universite;
use App\Models\UFR;
use App\Models\Filiere;

class FiliereController extends Controller
{
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
    public function create(string $univ_designation, string $ufr_designation)
    {
        return view('filiere.create', compact('univ_designation', 'ufr_designation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $univ_designation, string $ufr_designation)
    {
        $univ_id = Universite::where('designation', '=', $univ_designation)->first()->id;
        $ufr_id = UFR::where('designation', '=', $ufr_designation)->first()->id;

        $filiere = new Filiere();
        $filiere->id_univ = $univ_id;
        $filiere->id_ufr = $ufr_id;
        $filiere->nom = $request->input('nom');
        $filiere->designation = trim($request->input('designation'));
        $filiere->save();

        return redirect()->route('show-univ-ufr', [$univ_designation, $ufr_designation])->with('status', 'Filiere creer avec success');
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
    public function edit(string $univ_designation, string $ufr_designation, string $filiere_designation)
    {
        $filiere = Filiere::where('designation', '=', $filiere_designation)->first();

        return view('filiere.edit', compact('univ_designation', 'ufr_designation', 'filiere_designation', 'filiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $univ_designation, string $ufr_designation, string $filiere_designation)
    {
        $filiere = Filiere::findOrFail(Filiere::where('designation', '=', $filiere_designation)->first()->id);
        $filiere->nom = $request->input('nom');
        $filiere->designation = trim($request->input('designation'));
        $filiere->save();

        return redirect()->route('show-univ-ufr', [$univ_designation, $ufr_designation])->with('status', 'Filiere editer avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $univ_designation, string $ufr_designation, string $filiere_designation)
    {
        $filiere = Filiere::findOrFail(Filiere::where('designation', '=', $filiere_designation)->first()->id);
        $filiere->delete();

        return redirect()->route('show-univ-ufr', [$univ_designation, $ufr_designation])->with('status', 'Filiere supprimer avec success');
    }
}
