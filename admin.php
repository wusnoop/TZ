<?php
require_once 'function.php';
session_start();
if (!$_SESSION['login'] || !$_SESSION['password']){
    header('Location: index.php');
    die();

}
if (isset($_POST['unlogin'])){
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
                <th>Action</th>

                </thead>

                <tbody>
                <?php
                foreach ($result as $res) {
                ?>
                <tr>
                    <td><?=$res['date']?></td>
                    <td><?=$res['name']?></td>
                    <td><?=$res['email']?></td>
                    <td><a href="?id=<?=$res['id']?>" class="btn btn-success modal-open" data-bs-toggle="modal" data-bs-target="#edit<?=$res['id']?>""><i class="fa fa-edit"></i></a>
                        <a href="?id=<?=$res['id']?> " data-bs-toggle="modal" data-bs-target="#delete<?=$res['id']?>" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a></td>
                </tr>

                    <!-- Modal edit-->
                <div class="modal fade"   id="edit<?=$res['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Просмотр заявки</h5>

                            </div>
                            <div class="modal-body">
                                <form action="?id=<?=$res['id']?>" method="post">
                                    <div>
                                        <h1>Пользователь :  <?=$res['name']?></h1>
                                        <h5>
                                            <small>Почта</small>
                                            <div class="form-group">
                                                <p><?=$res['email']?></p>
                                            </div>
                                        </h5>
                                        <h5>
                                            <small>Адрес</small>
                                            <div class="form-group">
                                                <p><?=$res['address']?></p>
                                            </div>
                                        </h5>
                                        <h5>
                                            <small>Телефон</small>
                                            <div class="form-group">
                                                <p><?=$res['phone']?></p>
                                            </div>
                                        </h5>
                                        <small><?=$res['date']?></small>
                                        <h2>Оставил заявку</h2>
                                    </div>
                                  <div class="form-group">
                                        <small>Заявка</small>
                                        <textarea  class="form-control" name="text" aria-label="With textarea" ><?=$res['text']?></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Modal edit-->

                <!-- Modal delete-->
                    <div class="modal fade"   id="delete<?=$res['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Удалить заявку?</h5>

                                </div>

                                <div class="modal-footer">
                                    <form action="?id=<?=$res['id']?>" method="post">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
                                    <button type="submit" class="btn btn-danger" name="delete">Да</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Modal delete-->
                <?php   }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>





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