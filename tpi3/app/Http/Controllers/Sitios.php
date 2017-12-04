<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Sitio;

use App\User;

use App\Imagen;

use Storage;

use Illuminate\Support\Facades\Auth; //para poder recuperar el usuario logueado


class Sitios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $user=Auth::user();//recupero el usuario logueado
        $id=$user->id;
        $sitios= Sitio::where('user_id', '=', $id)->get();
        $imagens=Imagen::all();
        return view('administracion')->with(['sitios'=> $sitios], ['imagens' => $imagens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        dd('cabal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);

        $sitio=new Sitio();
        $sitio->nombreSitio=$request->nombre_sitio;
        $sitio->descripcion=$request->descripcion_sitio;
        $sitio->telefono=$request->tel_sitio;
        

        

        $img=$request->file('urlImg');
        $file_route=time().'_'.$img->getClientOriginalName();
        Storage::disk('imgSitios')->put($file_route,file_get_contents($img->getRealPath()));

        $sitio->imgUrl=$file_route;


        $user=Auth::user();//recupero el usuario logueado
        $sitio->user_id=$user->id;




        $sitio->save();
        flash()->success('Se ha guardado de forma exitosa');

        return view('cargarfotos', ['sitio' => $sitio]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sitio = Sitio::find($id);
        return view('home')->with(['edit' => true, 'sitio' => $sitio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $sitio=Sitio::find($id);
        $sitio->nombreSitio=$request->nombre_sitio;
        $sitio->descripcion=$request->descripcion_sitio;
        $sitio->telefono=$request->tel_sitio;
        

        

        $img=$request->file('urlImg');
        $file_route=time().'_'.$img->getClientOriginalName();
        Storage::disk('imgSitios')->put($file_route,file_get_contents($img->getRealPath()));
        Storage::disk('imgSitios')->delete($request->img);

        $sitio->imgUrl=$file_route;


        $user=Auth::user();//recupero el usuario logueado
        $sitio->user_id=$user->id;

        $sitio->save();
        flash()->success('Se ha actualizado de forma exitosa');

        return redirect('sitios'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sitio = Sitio::find($id);
        
        Storage::disk('imgSitios')->delete($sitio->urlImg);
        Sitio::destroy($id);
        flash()->success('Se ha eliminado de forma exitosa');
        return back();

    }
}
