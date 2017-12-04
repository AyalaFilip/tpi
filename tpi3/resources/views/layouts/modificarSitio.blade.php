@if(isset($sitio)) 


<form class="form-horizontal" role="form" method="post" action="{{ route('sitios.update',$sitio->id) }}" enctype="multipart/form-data">
  {{ csrf_field() }}

  <input name="_method" type="hidden" value="put" >
  
  <input type="hidden"  name="img" value="{{ $sitio->imgUrl }}">

  <div class="form-group">
    <label for="nombre_sitio" class="col-lg-2 control-label">Nombre del Sitio Turistico</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="nombre_sitio" value="{{ $sitio->nombreSitio }}" >  <!--guardo el url de la imagen antigua-->
      @if($errors->has('nombre_sitio'))
       <span style="color:red;"> {{ $errors->first('nombre_sitio')}} </span>
      @endif
    </div>
  </div>

  <div class="form-group">
    <label for="descrp_sitio" class="col-lg-2 control-label">Descripcion del Sitio Turistico</label>
    <div class="col-lg-10">
      <textarea type="text" class="form-control" name="descripcion_sitio"  >{{ $sitio->descripcion }}</textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="nombre_sitio" class="col-lg-2 control-label">Telefono del Sitio Turistico</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="tel_sitio" value="{{ $sitio->telefono }}">
    </div>
  </div>



  <div class="form-group">
    <label for="urlImg" class="col-lg-2 control-label">Logo del Sitio Turistico</label>
    <div class="col-lg-10">
      <input type="file" class="form-control" name="urlImg">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-warning">Modificar</button>
      
      
  </div>
</form>
@endif