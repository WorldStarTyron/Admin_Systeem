<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('css/Leden.css') }}">
    <title>Leden-pagina</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Leden-pagina</h1>
            <button class="btn">Voeg lid toe</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoon</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>[EMAIL_ADDRESS]</td>
                    <td>123456789</td>
                    <td>
                        <button class="btn">Bewerk</button>
                        <button class="btn">Verwijder</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>