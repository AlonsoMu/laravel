 <!-- Modal -->
    <div class="modal fade" id="modal-delete-{{ $turismo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('turismo.destroy', $turismo->id) }}" method="post">
                @csrf <!-- Ejecuta sin ningún incoveniente (SOLO SE USA EN FORMULARIOS) -->
                @method('DELETE')
                
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        ¿Deseas eliminar el registro del lugar turístico "{{ $turismo->nombre_lugar }}"?
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                    </div>
                </div>
            </form>
        </div>
    </div>
