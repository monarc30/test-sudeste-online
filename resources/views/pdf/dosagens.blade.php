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
<th>Produto</th>
<th>Cultura</th>
<th>Praga</th>
<th>Dosagem</th>
</tr>
</thead>
<tbody>
@foreach ($data as $dosagens)
    <tr>
        <td style="text-align:center;">{{ $dosagens->idproduto }}</td>
        <td style="text-align:center;">{{ $dosagens->idcultura }}</td>
        <td style="text-align:center;">{{ $dosagens->idpraga }}</td>
        <td style="text-align:center;">{{ $dosagens->dosagem }}</td>
    </tr>
@endforeach
</tr>
</tbody>
</table>
</body>
</html>
