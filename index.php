<?php
    require_once 'show.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .forms {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .ins {
            float: left;
            margin: 10px;
        }
        .del {
            float: right;
            margin: 10px;
        }
        .results {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            margin: 10px;
        }

        .results td, .results th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .results tr:nth-child(even){background-color: #f2f2f2;}

        .results tr:hover {background-color: #ddd;}

        .results th {
            padding-top: 6px;
            padding-bottom: 6px;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>
<div class="forms">
    <div class="ins">
        <form action="insert.php" method="post">
            <fieldset>
                <legend>Register</legend>
                <label for="fname">First Name : </label><br>
                <input type="text" id="fname" name="fname"><br>
                <label for="fname">Last Name : </label><br>
                <input type="text" id="lname" name="lname"><br>
                <label for="fname">Identification Number : </label><br>
                <input type="text" id="idnum" name="idnum"><br>
                <button type="submit" name="submit">Submit</button>
            </fieldset>
        </form>
    </div>
    <div class="del">
        <form action="delete.php" method="post">
            <fieldset>
                <legend>Delete</legend>
                <label for="fname">ID Number : </label><br>
                <input type="text" id="idnum" name="idn"><br>
                <button type="submit" name="delete">delete</button>
            </fieldset>
        </form>
    </div>
        <table class="results">
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Surname</th>
                <th>ID Number</th>
            </tr>
            <?php $count = 1; ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $count; ?></td>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['surname']; ?></td>
                    <td><?= $user['personCode']; ?></td>
                </tr>
                <?php $count += 1; ?>
            <?php endforeach; ?>
        </table>
</div>
</body>
</html>
