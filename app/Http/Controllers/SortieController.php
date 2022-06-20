<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use App\Models\Ville;
use App\Models\Campus;
use App\Models\Sortie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SortieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('sorties.create');
    }

    public function save(Request $request)
    {
        //return view('sorties.createSortie');
    }

    public function sortieSend(Request $request)
    {

        //dd($request->all());
        $sortie = new Sortie();

        $sortie->name = $request->name;
        $sortie->dateHeureDebut = $request->dateHeureDebut;
        $sortie->dateLimiteInscription = $request->dateLimiteInscription;
        $sortie->duree = $request->duree;
        $sortie->nbInscriptionMax = $request->nbInscriptionMax;
        $sortie->infoSortie = $request->infoSortie;
        $sortie->photo = $request->photo;
        $sortie->campus_id = $request->campus;
        $sortie->user_id = $request->user;

        $lieu = new Lieu();
        $lieu->name = $request->rue;
        $lieu->rue = $request->rue;
        $lieu->latitude = $request->latitude;
        $lieu->longitude = $request->longitude;
        $lieu->ville_id = $request->ville;

        $ville = new Ville();
        $ville->name = $request->ville;
        $ville->codePostal = $request->codePostal;

        $sortie->save();
        $lieu->save();
        $ville->save();
        //return redirect()->route('dashboard');
        return view('sorties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = array_merge($request->all(), ['campus_id' => $request->campus()->id],
                                               ['etat_id' => $request->etat()->id],
                                               ['ville_id' => $request->ville()->id],
                                               ['user_id' => $request->user()->id]);
        $this->sortieRepository->store($inputs);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sortie $sortie)
    {
        // $sorties = Sortie::all();
        // $sortie->dateHeureDebut;
        return view('sorties.show', compact('sortie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sortie $sortie)
    {
        $campuses = Campus::all();
        $lieux = Lieu::all();
        $villes = Ville::all();
        // dd($sortie);
        // $sorties = Sortie::find($id);
        // $sortie = sortie::where('id', $id)->first();
        return view('sorties.edit', compact('sortie', 'campuses', 'lieux', 'villes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        DB::table('sorties')->upsert([
            'name' => $request->name,
            'dateHeureDebut' => $request->dateHeureDebut,
            'dateLimiteInscription' => $request->dateLimiteInscription,
            'nbInscriptionMax' => $request->nbInscriptionMax,
            'duree' => $request->duree,
            'infoSortie' => $request->infoSortie,
            'campus_id' => $request->campus,
            'lieu_id' => $request->lieu,
            'codePostal' => $request->codePostal,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ],['name', 'dateHeureDebut', 'dateLimiteInscription', 'nbInscriptionMax', 'duree', 'infoSortie', 'campus_id', 'lieu_id', 'codePostal', 'latitude', 'longitude']);

        // $sortie = Sortie::find($request->id);
        // $sortie->name=$request->name;
        // $sortie->dateHeureDebut=$request->dateHeureDebut;
        // $sortie->dateLimiteInscription=$request->dateLimiteInscription;
        // $sortie->nbInscriptionMax=$request->nbInscriptionMax;
        // $sortie->duree=$request->duree;
        // $sortie->infoSortie=$request->infoSortie;

        // $campus = Campus::find($request->id);
        // $campus->name=$request->campus;

        // $lieu = Lieu::find($request->id);
        // $lieu->name=$request->name;
        // $lieu->longitude=$request->longitude;
        // $lieu->latitude=$request->latitude;

        // $ville = Ville::find($request->id);
        // $ville->codePostal=$request->codePostal;

        // $sortie->save();
        // $campus->save();
        // $lieu->save();
        // $ville->save();
        // $sortie = DB::table('sorties')->where('id', $id)->update(['name' => $request->name]);

        // $sortie->save();

        return redirect('sorties.edit', compact('sortie'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sortie $sortie)
    {
        // $sortie = Sortie::find($id);
        $sortie->delete();
        return redirect(route('dashboard'))->with('success', 'Sortie supprimée');
    }
}
