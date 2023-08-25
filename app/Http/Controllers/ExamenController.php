<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Universite;
use App\Models\UFR;
use App\Models\Filiere;
use App\Models\Examen;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universites = Universite::all();

        return view('examen.index', compact('universites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $designation_univ, string $designation_ufr, string $designation_filiere)
    {
        return view('examen.create', compact('designation_univ', 'designation_ufr', 'designation_filiere'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $designation_univ, string $designation_ufr, string $designation_filiere)
    {
        $examen = new Examen();
        $examen->id_univ = Universite::where('designation', '=', $designation_univ)->first()->id;
        $examen->id_ufr = UFR::where('designation', '=', $designation_ufr)->first()->id;
        $examen->id_filiere = Filiere::where('designation', '=', $designation_filiere)->first()->id;
        $examen->nom = trim($request->input('module'));

        $files = $request->file('path');
        $path = [];
        if ($files != NULL) {
            foreach($files as $file){
                // $filename = $file->getClientOriginalName();
                $fileName = strtoupper($designation_univ.'_ufr-'.$designation_ufr.'_'.$designation_filiere).'_'.time()."_".Str::random(10)."_".uniqid().".".$file->getClientOriginalExtension();
                $mines = $file->getMimeType();
                $videosMines = ["video/x-flx", "video/mp4", "video/application/x-mpegURL", "video/MP2T", "video/3gpp", "video/quicktime", "video/x-msvideo", "video/x-ms-wmv", "video/x-matroska"];
                if (array_search($mines, $videosMines, true) == true) {
                    $file->move('fichiers/videos', $fileName);
                    array_push($path, ["videos" ,'fichiers/videos/'.$fileName]);
                } else {
                    $file->move('fichiers/photos', $fileName);
                    array_push($path, ["photos" ,'fichiers/photos/'.$fileName]);
                }
            }
            $examen->path = json_encode($path);
        }
        
        $examen->save();

        return redirect()->route('show-examen', [$designation_univ, $designation_ufr, $designation_filiere])->with('status', 'Plubier avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $designation_univ, string $designation_ufr, string $designation_filiere)
    {
        $examens = Examen::where('id_univ', '=', Universite::where('designation', '=', $designation_univ)->first()->id)
                        ->where('id_ufr', '=', UFR::where('designation', '=', $designation_ufr)->first()->id)
                        ->where('id_filiere', '=', Filiere::where('designation', '=', $designation_filiere)->first()->id)
                        ->get();

        return view('examen.show', compact('designation_univ', 'designation_ufr', 'designation_filiere', 'examens'));
    }

    /**
     * Display the specified resource.
     */
    public function show_examen(string $designation_univ, string $designation_ufr, string $designation_filiere, string $id_examen)
    {
        $examen = Examen::where('ID', '=', $id_examen)->first();

        return view('examen.show_examen', compact('designation_univ', 'designation_ufr', 'designation_filiere', 'examen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $designation_univ, string $designation_ufr, string $designation_filiere, string $id_examen)
    {
        $examen = Examen::find($id_examen);

        return view('examen.edit', compact('designation_univ', 'designation_ufr', 'designation_filiere', 'examen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $designation_univ, string $designation_ufr, string $designation_filiere, string $id_examen)
    {
        $examen = Examen::find($id_examen);
        $examen->nom = trim($request->input('module'));
        $examen->path = json_encode($request->input('path'));
        $examen->updated_at = now();
        $examen->update();

        return redirect()->route('show-examen', [$designation_univ, $designation_ufr, $designation_filiere])->with('status', 'Editer avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $designation_univ, string $designation_ufr, string $designation_filiere, string $id_examen)
    {
        $examen = Examen::find($id_examen);
        $examen->delete();

        return redirect()->route('show-examen', [$designation_univ, $designation_ufr, $designation_filiere])->with('status', 'Supprimer avec success');
    }
}
