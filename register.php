<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
         body{
            padding: 0;
            margin: 0;
            font-family: arial, sans-serif;

        }

        .container{
            margin-top: 30px;
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

        input[type="email"]{
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        input[type="date"]{
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
        <h2>Register</h2>

        <form action="proses_register.php" method="post">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" id="">     
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="">     
            </div>

            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" name="name" id="">     
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="">     
            </div>

            <div class="form-group">
                <label for="">Tanggal lahir</label>
                <input type="date" name="birth_date" id="">     
            </div>

            <center><p style="margin-top: 0;">Sudah punya akun? <a href="login.php" style="text-decoration: none;">Login</a></p></center>
            <input type="submit" value="Register" class="btn-add">
        </form>
    </div>
</div>
    
</body>
</html>