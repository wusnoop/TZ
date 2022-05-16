<?php

require_once 'function.php';
session_start();
if (!$_SESSION['login'] || !$_SESSION['password']) {
    header('Location: index.php');
    die();

}
if (isset($_POST['unlogin'])) {
    session_destroy();
    header("Location: index.php");

}
?>



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <title>Hello, world!</title>
</head>
<?php if (!$_POST){ ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped  table-hover mt-2" >
                <thead class="thead-dark">

                <form method="post">
                    <button class="btn btn-dark" name="unlogin">Exit</button>
                </form>

                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Search<form class="d-flex" role="search" style="width: 245px" method="post">
                        <input class="form-control " type="search"  aria-label="Search" name="keyword">
                        <button class="btn btn-outline-success" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form></th>
                </thead>
                <tbody>
                <?php

                foreach ($result as $res) {
                ?>
                <tr>
                    <td><?=$res['date']?></td>
                    <td><?=$res['name']?></td>
                    <td><?=$res['email']?></td>
                    <td></td>
                </tr
                <?php   }?>
                </tbody>

            </table>
        </div>
    </div>
</div>
<?php }
else {?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped  table-hover mt-2" >
                <thead class="thead-dark">

                <form method="post">
                    <button class="btn btn-dark" name="unlogin">Exit</button>
                </form>

                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Search<form class="d-flex" role="search" style="width: 245px" method="post">
                        <input class="form-control " type="search"  aria-label="Search" name="keyword">
                        <button class="btn btn-outline-success" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form></th>
                </thead>
                <tbody>
                <?php
                if (isset($_POST['search'])){
                    $search = $_POST['keyword'];
                    $sql = $pdo->prepare("SELECT * FROM application WHERE name LIKE '%$search%' ");
                    $sql->execute();
                    while ($row = $sql->fetch()){?>


                        <tr>
                            <td><?=$row['date']?></td>
                            <td><?=$row['name']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['phone']?></td>
                        </tr
                    <?php   }?>

                    <?php
                }
                ?>
                </tbody>

            </table>
        </div>
    </div>
</div>


<?php } ?>

             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script defer src="https://use.fontawesome.com/releases/v6.1.1/js/all.js" integrity="sha384-xBXmu0dk1bEoiwd71wOonQLyH+VpgR1XcDH3rtxrLww5ajNTuMvBdL5SOiFZnNdp" crossorigin="anonymous"></script>
                <script src="js/main.js"></script>
                <!-- Option 2: Separate Popper and Bootstrap JS -->
                <!--
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
                -->
                </body>
</html>