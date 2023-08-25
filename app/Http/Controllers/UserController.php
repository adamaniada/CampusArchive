<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use app\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::OrderByDesc('created_at')->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->input('password') != $request->input('confirm-password')){
            return redirect()->back()->with('error', "Les mot de pass ne corresponden pas");
        }else {
            $user = new User();
            $user->nom = $request->input('nom');
            $user->prenom = $request->input('prenom');
            $user->email = $request->input('email');
            $user->role = $request->input('role');
            $user->avatar = $request->input('avatar');
            $user->password = Hash::make($request->input('password'));
            $user->save();
        }

        return redirect()->route('user')->with('status', "Nouvel utilisateurs créer avec success");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if($request->input('avatar') != NULL){
            $user->avatar = $request->input('avatar');
        }

        if(($request->input('new-password') != NULL) or (($request->input('confirm-new-password') != NULL))){
            if($request->input('new-password') == $request->input('confirm-new-password')){
                $user->password = Hash::make($request->input('new-password'));
            }else{
                return redirect()->back()->with('error', "Les mot de pass ne corresponden pas");
            }
        }

        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->update();

        return redirect()->route('user')->with('status', "Utilisateurs editer avec success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user')->with('status', "Utilisateurs supprimer avec success");
    }
}
