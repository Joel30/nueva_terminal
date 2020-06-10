
<a href="{{route('bus.editar', $id)}}" class="boton btn-outline-yellow py-0 px-1 my-0 mr-3" title="Editar"><i class="fa fa-edit"></i></a>
<a href="{{route('bus.eliminar', $id)}}" class="boton btn-outline-red py-0 px-1" title="Eliminar" onclick="return confirm('Esta seguro de eliminar el Bus con Nro de placa: {{App\Bus::find($id)->placa}}?')"><i class="fa fa-trash"></i></a>