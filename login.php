<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
         body{
            padding: 0;
            margin: 0;
            font-family: arial, sans-serif;

        }

        .container{
            margin-top: 90px;
            display: flex;
            justify-content: center;
        }

        .card{
            width: 360px;
            background-color: white;
            box-shadow: 0 12px 20px rgba(0,0,0,0.1);
            padding: 20px;
            border-radius: 10px;
        }

        .card h2{
            text-align: center;
            margin-bottom: 20px;
        }


        label{
            display: block;
            font-size: 15px;
            margin-bottom:5px;
            color: black;
        }

        input[type="text"]{
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        input[type="password"]{
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        .btn-add{
            padding: 7px 14px;
            border-radius: 5px;
            margin-top: 10px;
            background-color: #59c7f0ff;
            border: none;
            text-decoration: none;
            color:white;
            width: 100%;
            font-size: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Login</h2>

        <form action="proses_login.php" method="post">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" id="">     
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="">     
            </div>

            <center><p style="margin-top: 0;">Belum punya akun? <a href="register.php" style="text-decoration: none;">Register</a></p></center>
            <input type="submit" value="Login" class="btn-add">
        </form>
    </div>
</div>
    
</body>
</html>