<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            text-align: center;
            align-items:center;
            padding-top:2%;
            background-color:rgb(47,120,158);
            color:white;
        }
        input{
            width: 50%;
        }
        button{
            width: 20%;
        }
    </style>
</head>
<body>
    <?php
        require_once "header.php";
    ?>
    <form method="GET" action="">
        <lable for="name">Full name</lable><br>
        <input type="text" id="name" name="name"><br>

        <lable for="email">Email</lable><br>
        <input type="email" id="eamil" name="email"><br>

        <button type="submit" name="ajouter">ADD</button>
    </form>
    <?php
        if (isset($_GET['ajouter'])){
            $name = $_GET['name'];
            $email = $_GET['email'];

            require_once "db.php";
            $sqlstate = $conn -> prepare('insert into etudiant values(NULL,?,?)');
            $ajoute = $sqlstate -> execute([$name,$email]);

            header('location: index.php');
        }
    ?>
</body>
</html>
