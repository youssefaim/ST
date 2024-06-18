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
        require_once "db.php";
        $id = $_GET['id'];


        $res = $conn->prepare("SELECT * FROM etudiant WHERE ID=?");
        $res->execute([$id]);
        $data = $res->fetch(PDO::FETCH_NUM);

    ?>
    <form method="GET" action="" >
        <lable for="name">Full name</lable><br>
        <input type="text" id="name" name="name" value="<?php echo $data[1] ;?>"><br>

        <lable for="email">Email</lable><br>
        <input type="text" id="email" name="email" value="<?php echo $data[2]; ?>"><br>

        <input type="hidden" value="<?php echo $id ?>" name="id">
    <?php
        
    ?>

        <button type="submit" name="modify">MODIFY</button>
    </form>
    <?php
        if (isset($_GET['modify'])){
            $name = $_GET['name'];
            $email = $_GET['email'];
            $id = $_GET["id"];

            require_once "db.php";
            $sqlstate = $conn -> prepare('UPDATE etudiant SET FULL_NAME = ? , email = ? WHERE ID = ?');
            $modify =$sqlstate -> execute([$name,$email,$id]);
            
            header('location: index.php');
        }
?>
</body>
</html>
