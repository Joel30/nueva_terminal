<a href="{{route('restaurar.personal', $id)}}" class="boton btn-outline-green btn-sm text-center py-0 px-1" title="Restaurar" onclick="return confirm('Está seguro de restaurar el personal con C.I.: {{App\Personal::onlyTrashed()->find($id)->ci}}?')"><i class="fa fa-reply"aria-hidden="true"></i></a>

