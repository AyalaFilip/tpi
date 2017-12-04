 @extends('layouts.app')

@section('content')


<table class="table table-striped">
  @include('flash::message')
  @if(isset($sitios))
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Logo</th>
    </tr>
  </thead>

  <tbody>
    @foreach($sitios as $s)
    <tr>
      <td>{{ $s->id}}</td>
      <td>{{ $s->nombreSitio}}</td>
      <td>{{ $s->descripcion}}</td>
      <td>
        <img src="imgSitios/{{ $s->imgUrl}}" class="img-responsive" alt="Responsive image" width="300">
      </td>
      <td>
        
      </td>
      <td> 
        <a href="sitios/{{$s->id}}/edit" class="btn btn-warning btn-xs" >Modificar</a>
        <form action="{{ route('sitios.destroy', $s->id) }}" method="post" >
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