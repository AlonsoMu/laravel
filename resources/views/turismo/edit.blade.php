<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Editar Turismo - Turismo SENATI</title>
    <style>
        body {
            background-image: url('{{ asset("img/editarr.jpg") }}');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Lugar Turístico</h1>

        <form action="{{ route('turismo.update', $turismo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre_lugar" class="form-label">Nombre del lugar</label>
                <input type="text" class="form-control" id="nombre_lugar" name="nombre_lugar" value="{{ $turismo->nombre_lugar }}" required style="max-width: 400px;">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required style="max-width: 400px;">{{ $turismo->descripcion }}</textarea>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" style="max-width: 400px;" >
            </div>

            <div class="mb-3">
                <label for="imagen_actual" class="form-label">Imagen Actual</label>
                @if($turismo->imagen)
                    <img src="data:image/jpeg;base64,{{ base64_encode($turismo->imagen) }}" alt="Imagen actual" width="100">
                @else
                    <p>No hay imagen actual.</p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('turismo.index') }}" class="btn btn-warning">Cancelar</a>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    -->
</body>
</html>
