<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universite;
use App\Models\UFR;
use App\Models\Filiere;

class UfrController extends Controller
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
    public function create(string $univ_designation)
    {
        $universite = Universite::where('universites.designation', '=', $univ_designation)->first();

        return view('ufr.create', compact('universite'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $univ_designation, string $univ_id)
    {
        $ufr = new UFR();
        $ufr->id_univ = $univ_id;
        $ufr->nom = $request->input('nom');
        $ufr->designation = $request->input('designation');
        $ufr->save();

        return redirect()->route('show-univ', $univ_designation)->with('status', 'UFR creer avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $univ_designation, string $ufr_designation)
    {
        $universite = Universite::where('designation', '=', $univ_designation)->first();
        $ufr = UFR::where('designation', '=', $ufr_designation)->first();
        $filieres = Filiere::where('id_univ', '=', $universite->id)
                        ->where('id_ufr', '=', $ufr->id)
                        ->get();

        return view('ufr.show', compact('universite', 'ufr', 'filieres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $univ_designation, string $ufr_designation)
    {
        $ufr = UFR::where('u_f_r_s.designation', '=', $ufr_designation)->first();
        // dd($univ_designation, $ufr_designation);

        return view('ufr.edit', compact('ufr', 'univ_designation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $univ_designation, string $ufr_designation)
    {
        // $id = UFR::where('designation', '=', $ufr_designation)->first()->id; // recherche id de l'ufr
        $ufr = UFR::find(UFR::where('designation', '=', $ufr_designation)->first()->id);
        $ufr->nom = $request->input('nom');
        $ufr->designation = $request->input('designation');
        $ufr->updated_at = now();
        $ufr->update();

        return redirect()->route('show-univ', $univ_designation)->with('status', 'Ufr Editer avec success avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $univ_designation, string $ufr_designation)
    {
        $ufr = UFR::find(UFR::where('designation', '=', $ufr_designation)->first()->id);
        $ufr->delete();

        return redirect()->route('show-univ', $univ_designation)->with('status', 'Ufr supprimer avec success avec success');
    }
}
