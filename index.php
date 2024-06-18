<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        table{
            width: 100%;
        }
        tr:hover{
            background-color: black;
            color: white;
        }
        td{
            padding:10px;
        }
    </style>
</head>
<body>
    <?php
        require_once "header.php";
        require_once "db.php";
        $res = $conn->query("SELECT * FROM etudiant");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div style="background-color:rgb(20,110,118);width:100%;padding-top:5%;padding-right:2%;padding-left:2%;height:100vh">
        <table style="background-color:white;">
            <tr style="border-bottom: 2px solid">
                <td>ID</td>
                <td>FULL NAME</td>
                <td>EMAIL</td>
                <td>OPERATION</td>
            </tr>
            <?php
                foreach ($data as $row){
            ?>
                <tr style="border-bottom: 1px solid">
                    <td><?php echo $row['ID'] ?></td>
                    <td><?php echo $row['FULL_NAME'] ?></td>
                    <td><?php echo $row['EMAIL'] ?></td>                   
                    <td>
                        <a href="edit.php?id=<?php echo $row['ID'] ?>" style="background-color:blue;text-decoration:none;padding:2px;border-radius:3px;margin-right:3px;color:white;">Modifier</a>
                        <a href="delete.php?id=<?php echo $row['ID'] ?>" style="background-color:red;text-decoration:none;padding:2px;border-radius:3px;margin-right:3px;color:white;">Supprimer</a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>
