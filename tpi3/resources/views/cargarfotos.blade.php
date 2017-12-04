@extends('layouts.app')
@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              @include('flash::message')
                <div class="panel-heading">Cargar Imagenes</div>
                <div class="panel-body">

                  @if(isset($sitio))
                  {{ $sitio->id }}


                  <form class="form-horizontal" role="form" method="post" action="{{ url('imagenes') }}" enctype="multipart/form-data">
                   {{ csrf_field() }}
                   <input type="hidden"  name="sitio_id" value="{{ $sitio->id }}"> 



                   <div class="form-group">
                   <label for="urlImg" class="col-lg-2 control-label">Suba las imagenes de su Sitio Turistico</label>
                   <div class="col-lg-10">
                     <input type="file" class="form-control" name="urlImg">
                   </div>
                   </div>

                   <div class="form-group">
                     <div class="col-lg-offset-2 col-lg-10">
                       <button type="submit" class="btn btn-default">Guardar Fotos</button>
                      
                       <button class="btn btn-default" onclick ="{{ url('/home') }}">Atras</button>
                        
                   </div>
                </div>

                @else

                @include('layouts.mostrarImagenes')
                    <!--@if(isset($imagens))
                    <form class="form-horizontal" role="form" method="post" action="{{ url('imagenes') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}

                         <div class="form-group">
                         <label for="sitio">Seleccione Sitio</label>
                         <select class="form-control" id="sitio_id">
                         @foreach($imagens as $img)
                         <option>{{$img->sitio_id}}</option>
                         @endforeach
                         </select>
                         </div>

                         <div class="form-group">
                         <label for="urlImg" class="col-lg-2 control-label">Seleccione la Imagen</label>
                         <div class="col-lg-10">
                           <input type="file" class="form-control" name="urlImg">
                         </div>
                         </div>



                         <div class="form-group">
                         <div class="col-lg-offset-2 col-lg-10">
                         <button type="submit" class="btn btn-default">Guardar Fotos</button>
                      
                          <button class="btn btn-default" onclick ="{{ url('/home') }}">Atras</button>
                        
                         </div>
                         </div>
                         <div>
                           
                         </div>-->
                         

                         
                    @endif
                   </div>
                @endif
                
            </div>
        </div>
    </div>
</div>

@endsection
