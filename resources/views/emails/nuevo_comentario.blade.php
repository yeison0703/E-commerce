<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Comentario</title>
</head>
<body>
    <h1>Nuevo Comentario en el Artículo: {{ $comentario->articulo->titulo }}</h1>
    <p><strong>Nombre:</strong> {{ $comentario->nombre_usuario }}</p>
    <p><strong>Correo:</strong> {{ $comentario->email }}</p>
    <p><strong>Contenido:</strong></p>
    <p>{{ $comentario->contenido }}</p>
</body>
</html>
