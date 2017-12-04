<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Sitio;

use App\Imagen;

use App\User;

use Storage;
use Illuminate\Support\Facades\Auth; //para poder recuperar el usuario logueado


class Imagenes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=Auth::user();//recupero el usuario logueado
        $id=$user->id;
        $sitios= Sitio::where('user_id', '=', $id)->get();

        $imagens=Imagen::all();
        $imagens->each(function($imagens){
            $imagens->sitio;

        });


        $imageness = DB::table('sitios')
           ->join('imagens', 'imagens.sitio_id', '=', 'sitios.id', 'inner', true)
           ->select('sitios.*', 'imagens.id as imagen_id', 'imagens.imgUrl')
           ->where('sitios.id', '=', 'imagens.sitio_id')
           ->get();

           $users = DB::table('imagens')
            ->leftJoin('sitios', 'sitios.id', '=', 'imagens.sitio_id')
            ->get();

        

           

           //dd($imagens);
           


        return view('cargarfotos')->with(['imagens' => $imagens], ['imageness' => $imageness]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        


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

        //$sitio = Sitio::create($request->all());
        $imagen=new Imagen();
    
        


        $img=$request->file('urlImg');
        $file_route=time().'_'.$img->getClientOriginalName();
        Storage::disk('imgSitios')->put($file_route,file_get_contents($img->getRealPath()));

        $imagen->imgUrl=$file_route;
        $imagen->sitio_id=$request->sitio_id;
        //$imagen->sitio()->associate($sitio);

        $imagen->save();
        flash()->success('Se ha guardado de forma exitosa');
        return redirect('imagenes');


        //return view('layouts.mostrarImagenes');





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

        return view('cargarfotos')->with(['sitio' => $sitio]);

        //dd('guardar');
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
        $imagen = Imagen::find($id);
        
        Storage::disk('imgSitios')->delete($imagen->urlImg);
        Imagen::destroy($id);
        flash()->success('Se ha eliminado de forma exitosa');
        return back();
    }
}
