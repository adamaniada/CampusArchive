<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universite;
use App\Models\UFR;

class UniversiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universites = Universite::paginate(10);

        return view('universite.index', compact('universites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('universite.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $universite = new Universite();
        $universite->nom = $request->input('nom');
        $universite->designation = trim($request->input('designation'));
        $universite->save();

        return redirect()->route('univ')->with('status', 'Ajouter avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $univ_designation)
    {
        $universite = Universite::where('designation', '=', $univ_designation)->first();

        $ufrs = Universite::join('u_f_r_s' ,'universites.id', 'u_f_r_s.id_univ')
                    ->where('u_f_r_s.id_univ', '=', $universite->id)
                    ->where('u_f_r_s.deleted_at', '=', NULL)
                    ->paginate(10);

        return view('universite.show', compact('universite' ,'ufrs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $universite = Universite::find($id);

        return view('universite.edit', compact('universite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $universite = Universite::find($id);
        $universite->nom = $request->input('nom');
        $universite->designation = trim($request->input('designation'));
        $universite->update();

        return redirect()->route('univ')->with('status', 'Editer avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $universite = Universite::findOrFail($id)->delete();

        return redirect()->route('univ')->with('status', 'Supprimer avec success');
    }
}
