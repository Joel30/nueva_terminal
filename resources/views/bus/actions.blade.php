
<a href="{{route('bus.editar', $id)}}" class="float-left pr-4"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20" title="Editar"></a>
<a href="{{route('bus.eliminar', $id)}}" class="float-left pr-4"><input type=image src="{{asset('images/delete.png')}}" width="20" height="20" title="Eliminar" onclick="return confirm('Esta seguro de eliminar el Bus con id: {{$id}}')"></a>
