<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        div {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ff5100;
            font-size: 2em;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            font-size: 1.2em;
            line-height: 1.5;
        }

        button {
            background-color: #ff5100;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div>
        <h1>Votre signalement a été envoyé avec succès</h1>
        <p>Merci pour votre signalement.</p>
        <button onclick="retour()">Retour</button>
    </div>

    <script>
        function retour() {
            // Redirigez l'utilisateur vers la page de signalement
            window.location.href = 'signalerabsence.php';
        }
    </script>
</body>
</html>
