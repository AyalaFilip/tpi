<form class="form-horizontal" role="form" method="post" action="{{ url('sitios') }}" enctype="multipart/form-data">
  {{ csrf_field() }}

  <div class="form-group">
    <label for="nombre_sitio" class="col-lg-2 control-label">Nombre del Sitio Turistico</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="nombre_sitio" placeholder="Ingrese el Nombre del Sitio">
      @if($errors->has('nombre_sitio'))
       <span style="color:red;"> {{ $errors->first('nombre_sitio')}} </span>
      @endif
    </div>
  </div>

  <div class="form-group">
    <label for="descrp_sitio" class="col-lg-2 control-label">Descripcion del Sitio Turistico</label>
    <div class="col-lg-10">
      <textarea type="text" class="form-control" name="descripcion_sitio" placeholder="Ingrese la Descripcion del Sitio"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="nombre_sitio" class="col-lg-2 control-label">Telefono del Sitio Turistico</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="tel_sitio" placeholder="Telefono del Sitio Turistico">
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
      <button type="submit" class="btn btn-default">Crear</button>
      
                        
      
  </div>
</form>
