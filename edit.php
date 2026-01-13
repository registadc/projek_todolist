<?php
include 'koneksi.php';

$id_todo = $_GET['id_todo'];

$sql = "SELECT * FROM todo WHERE id_todo = '$id_todo'";
$query = mysqli_query($koneksi, $sql);

while($todo = mysqli_fetch_assoc($query)){

$kategori = mysqli_query($koneksi, "SELECT * FROM category");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
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

        input[type="text"],
        textarea,
        select{
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
        <h2>Edit</h2>

        <form action="proses_edit.php" method="post">
            <input type="hidden" name="id_todo" value="<?= $todo['id_todo']; ?>">

            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="title" id="" value="<?= $todo['title']; ?>">
            </div>

            <div class="form-group">
                <label for="">Deskripsi</label>
                <input type="text" name="description" id="" value="<?= $todo['description']; ?>">
            </div>

            <label for="">Kategori</label>
            <select name="id_category" id="">
                <?php while($k = mysqli_fetch_assoc($kategori)) {
                    $selected = ($k['category'] == $todo['category']) ? 'selected' : '';
                    echo "<option value='{$k['id_category']}' $selected > {$k['category']} </option>";
                } ?>
            </select>

            <label for="">Status</label>
            <select name="status" id="">
                <option value="pending" <?= $todo['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="done" <?= $todo['status'] == 'done' ? 'selected' : '' ?>>Done</option>
            </select>

            <input type="submit" value="Edit" class="btn-add">
        </form>
    </div>
</div>
</body>
</html>


<?php } ?>