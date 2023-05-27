<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Gestión de Turismo - Turismo SENATI</title>

    <style>
        body {
            background-image: url('{{ asset("img/fondopy.jpg") }}');
            background-size: cover;
            background-repeat: no-repeat;
        }
        .center-text {
            text-align: center;
        }
        .turismo-card {
            text-align: center;
            padding: 10px;
            margin-bottom: 20px;
        }
        .turismo-image {
            width: 100%;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="center-text">
            <h1>Turismo "City Tours"</h1>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('turismo.index') }}" method="get">
                    <div class="col-sm-4 my-1">
                        <div class="input-group">
                            <input type="text" class="form-control me-2" name="texto" placeholder="Buscar lugar turístico" value="{{ $texto }}">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                    @if (count($turismos) > 0)
                        <div class="col-lg-12">
                            <div class="col-auto my-1">
                                <a href="{{ route('turismo.create') }}" class="btn btn-success">Registrar lugar turístico</a>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        <div class="row">
            @if (count($turismos) > 0)
                @foreach($turismos as $turismo)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="data:image/jpeg;base64,{{ base64_encode($turismo->imagen) }}" class="card-img-top" alt="{{ $turismo->nombre_lugar }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $turismo->nombre_lugar }}</h5>
                                <p class="card-text">{{ Str::limit($turismo->descripcion, 100) }}</p>
                                <a href="{{ route('turismo.edit', $turismo->id) }}" class="btn btn-primary">Editar</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $turismo->id }}">Eliminar</button>
                            </div>
                        </div>
                    </div>
                    @include('turismo.delete')
                @endforeach
            @else
                <div class="col-lg-12">
                    <p>No hay resultados</p>
                </div>
            @endif
        </div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


