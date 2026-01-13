<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id_user'])){
    header("location:login.php?logindulu");
    exit;
}

$id_user = $_SESSION['id_user'];

if(isset($_GET['fav'])){
    $id = $_GET['fav'];
    if(!isset($_SESSION['favorit'][$id])){
        $_SESSION['favorit'][$id] = 1;
    }else{
        $_SESSION['favorit'][$id] = $_SESSION['favorit'][$id] == 1 ? 0 : 1;
    }
    header("location:index.php");
    exit();
}

$favorit = isset($_GET['favorit']) && $_GET['favorit'] == 1;

$where = "WHERE id_user = '$id_user'";

if(isset($_GET['category']) && $_GET['category'] != ""){
    $id_kategori = $_GET['category'];
    $where .= " AND todo.id_category = '$id_kategori'";
}

if(isset($_GET['status']) && $_GET['status'] != ""){
    $status = $_GET['status'];
    $where .= " AND todo.status = '$status'";
}

$sql = "SELECT todo.*, category.category FROM todo
        LEFT JOIN category ON category.id_category = todo.id_category
        $where ORDER BY todo.id_todo DESC";
$query = mysqli_query($koneksi, $sql);

$kategori = mysqli_query($koneksi, "SELECT * FROM category");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        body{
            margin:0 ;
            padding: 0;
            padding-top: 70px;
            font-family: arial, sans-serif;
            background-color: #d7d7d7ff;

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

        .todo-wrapper{
            display : grid;
            grid-template-columns: repeat(3,1fr);
            gap: 18px;
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .todo-card{
            border-radius: 10px;
            margin-bottom: 15px;
            padding: 15px;
            position: relative;
        }

        .todo-card.pending{
            background-color: white;
            color: black;
        }

        .todo-card.done{
            background-color: black;
            color: white;
        }

        .todo-card .small{
            font-size: 13px;
            color: #767676ff;
        }

        .edit{
            padding: 6px 12px;
            background-color: #f7cf3cff;
            border-radius: 5px;
            text-decoration: none;
            color: white;
        }

        .hapus{
            padding: 6px 12px;
            background-color: #da3333ff;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            text-decoration: none;
        }

        select{
            border-radius: 5px;
            width: 200px;
            height: 25px;
            margin-bottom: 10px;

        }


        .print{
            padding: 6px 12px;
            border-radius: 5px;
            margin-top: 10px;
            background-color: #dd6effff;
            border: none;
            color: white;
        }

        .btn-add{
            padding: 6px 12px;
            border-radius: 5px;
            margin-top: 10px;
            background-color: #59c7f0ff;
            border: none;
            text-decoration: none;
            color:white;
        }

        .love-btn{
            position: absolute;
            top: 12px;
            right: 10px;
            width: 36px;
            height: 36px;
            display: flex;
            justify-content: cener;
            align-items: center;
            border-radius: 50%;
            background-color: white;
            color: red;
            text-decoration: none;
            font-size: 18px;
            padding: 0;
            line-height: 1;
        }

        .love-btn.active{
            background-color: red;
            color: white;
        }

    </style>
</head>
<body>
    
<div class="header-2">
    <div class="flex">
        <h2 class="judul">Todolist</h2>
    <nav class="navbar">
        <a href="profil.php">Profil</a>
        <a href="logout.php">Logout</a>
    </nav>
    </div>
</div>

<center>
<div class="header">
    <h2>Todolist</h2>

    <div class="top-bar">
        <form method="get">
            <label for="">Filter Kategori</label>
            <select name="category" id="category" onchange="this.form.submit()">
                <option value="">Semua kategori</option>
                <?php while($k = mysqli_fetch_assoc($kategori)){ ?>
                    <option value="<?= $k['id_category'] ?>">
                        <?= isset($_GET['category']) && $_GET['category'] == $k['category'] ? '' : '' ?>
                        <?= $k['category']; ?>
                    </option>
                <?php } ?>
            </select>
        </form>

        <form method="get">
            <label for="">Filter Status</label>
            <select name="status" id="status" onchange="this.form.submit()">
                <option value="">Semua status</option>
                <option value="pending" <?= (isset($_GET['status']) && $_GET['status']) ? 'selected' : '' ?>>Pending</option>
                <option value="done" <?= (isset($_GET['status']) && $_GET['status']) ? 'selected' : '' ?>>Done</option>
            </select>
        </form>

        <form method="get">
            <label for="">Filter Bookmark</label>
            <select name="favorit" id="favorit" onchange="this.form.submit()">
                <option value="">Semua</option>
                <option value="1" <?= @$_GET['favorit'] == 1 ? 'selected' : '' ?>>Favorit</option>
            </select>
        </form>

        <button class="print" onclick="window.print()">Print</button>
        <a href="tambah.php" class="btn-add">Tambah</a>   
    </div>
</div>
</center>

<div class="todo-wrapper">
    <?php while($todo = mysqli_fetch_assoc($query)){ ?>
        <?php 
        $inifavorit = $_SESSION['favorit'][$todo['id_todo']] ?? 0 ;
        if($favorit && $inifavorit != 1) continue;
        ?>

        <div class="todo-card <?= strtolower($todo['status']) == 'done' ? 'done' : 'pending' ?>">
            <h2 style="<?= strtolower($todo['status']) == 'done' ? 'text-decoration : line-through' : 'pending' ?>"><?= $todo['title']; ?></h2>
            <p class="small" style="<?= strtolower($todo['status']) == 'done' ? 'text-decoration : line-through' : 'pending' ?>"><?= $todo['description']; ?></p>
            <p style="<?= strtolower($todo['status']) == 'done' ? 'text-decoration : line-through' : 'pending' ?>"><?= $todo['category']; ?></p>
            <p style="<?= strtolower($todo['status']) == 'done' ? 'text-decoration : line-through' : 'pending' ?>"><?= $todo['status']; ?></p>

            <div class="button">
                <a href="edit.php?id_todo=<?= $todo['id_todo']; ?>" class="edit">Edit</a>
                <a href="hapus.php?id_todo=<?= $todo['id_todo']; ?>" class="hapus" onclick="alert('yakin ingin menghapus ini?')">Hapus</a>
            </div>

            <a href="?fav=<?= $todo['id_todo']; ?>"
            class="love-btn <?= $inifavorit == 1 ? 'active' : '' ?>">🩶
        </a>
        </div>
    <?php } ?>
</div>
</body>
</html>