<?php
include 'function.php';


?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<nav class="navbar bg-light">
    <form class="container-fluid justify-content-start" >
        <button class="btn btn-outline-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#auth">Авторизация</button>
        <div>

            <a href="graf.php" ><button class="btn btn-sm btn-outline-secondary" type="button">График заявок</button></a>
        </div>

    </form>
</nav>

            <div class="text-center" >
                <button type="button" class="btn btn-primary btn-lg" style="margin-top: 16rem" data-bs-toggle="modal" data-bs-target="#create" >Оставить заявку</button>
            </div>


            </button>





<!-- Modal add-->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Форма заявки</h5>

            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <small>ФИО</small>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <small>Почта</small>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <small>Адрес</small>
                        <input type="text" class="form-control" name="address" required>
                    </div>
                    <div class="form-group">
                        <small>Телефон</small>
                        <input type="text" class="form-control" name="phone" required>
                    </div>
                    <div class="form-group">
                        <small>Заявка</small>
                        <textarea  class="form-control" name="text" aria-label="With textarea" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="add">Save changes</button>
                </form>
            </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal add-->






<div class="modal fade" id="auth" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <small>Логин</small>
                        <input type="text" class="form-control" name="login" required>
                    </div>
                    <div class="form-group">
                        <small>Пароль</small>
                        <input type="password" class="form-control" name="password" required>
                    </div>


            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary" name="enter">Войти</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
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
