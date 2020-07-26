<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Dosagens</title>
</head>
<body>
    <table class="blueTable">
        <thead>
        <tr>
            <th>Produtos</th>
            <th>Culturas</th>
            <th>Pragas</th>
            <th>Dosagens</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $dosagens)
            <tr>
                <td style="text-align:center;">{{ $dosagens->produtos['name'] }}</td>
                <td style="text-align:center;">{{ $dosagens->culturas['name'] }}</td>
                <td style="text-align:center;">{{ $dosagens->pragas['name'] }}</td>
                <td style="text-align:center;">{{ $dosagens->dosagem }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
