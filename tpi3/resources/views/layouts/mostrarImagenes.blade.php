 @extends('layouts.app')

@section('content')
<!--<form class="form-horizontal" role="form" method="post" action="{{ url('imagenes') }}" enctype="multipart/form-data">
                   {{ csrf_field() }}-->
@include('flash::message')

<table class="table table-striped">
    @if(isset($imagens))
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sitio</th>
      <th scope="col">Imagen</th>
      <th scope="col">Nombre del sitio</th>
    </tr>
  </thead>

  <tbody>
    @foreach($imagens as $img)
    <tr>
      <td>{{ $img->id}}</td>
      <td>{{ $img->sitio_id}}</td>
      <td>
        <img src="imgSitios/{{ $img->imgUrl}}" class="img-responsive" alt="Responsive image" width="300">
      </td>
      <td>{{$img->sitio->nombreSitio}}</td>

       <td> 
        <a href="imagenes/{{$img->sitio_id}}/edit" class="btn btn-warning btn-xs" >Agregar</a>
        <form action="{{ route('imagenes.destroy', $img->id) }}" method="post" >
           <input type="hidden" name="_method" value="delete">
           {{ csrf_field() }}
           <input type="submit" class="btn btn-danger btn-xs" value="Eliminar"></input>  

        </form>
        </td>
      
    </tr>
    
    
    @endforeach
  </tbody>
  @endif
</table>


@endsection