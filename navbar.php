<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: arial, sans-serif;
        }

        .header-2{
            width: 100%;
            background-color: black;
            box-shadow : 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            padding: 5px 10px;
            left: 0;
            top: 0;
            z-index: 999;
        }

        .header-2 .flex{
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1000px;
            margin: auto;
        }

        .navbar{
            display: flex;
            gap: 18px;
        }

        .navbar a{
            text-decoration: none;
            font-weight: 500px;
            color: white;
        }

        .judul{
            text-decoration: none;
            font-weight: 600px;
            color: white;
            font-size: 18px;
        }
    </style>
</head>
<body>
    
<div class="header-2">
    <div class="flex">
        <h2 class="judul"><a href="index.php" class="judul">Todolist</a></h2>
    <nav class="navbar">
        <a href="profil.php">Profil</a>
        <a href="logout.php">Logout</a>
    </nav>
    </div>
</div>
</body>
</html>