<?php include 'category_functions.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

 <title>Humster. Admin-panel</title>
</head>

<body class="bg-secondary">
  <!-- Menu -->
  <div class="container mb-5 bg-light">
    <header class="d-flex flex-wrap justify-content-around py-3 border-bottom">
      <ul class="nav d-flex nav-pills flex-wrap justify-content-between mt-3">
        <li class="nav-item"><a href="/" class="nav-link m-2 active " aria-current="page">Категорії</a></li>
        <li class="nav-item"><a href="./products.php" class="nav-link m-2">Товари</a></li>
      </ul>
    </header>
  </div>
  <div class="container bg-white mb-5">
    <div class="row">
      <div class="col-12">
        <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#create">
          <i class="fa fa-plus"></i>
        </button>
        <table class="table table-striped table-hover mt-2">
          <thead class="table-success">
            <th>Назва</th>
            <th>Опис</th>
            <th class='text-center'>Фото</th>
            <th>Дії</th>
          </thead>
          <tbody>
            <?php foreach ($result as $res) { ?>
              <tr>
                <td><?php echo $res->Name; ?></td>
                <td><?php echo $res->Description; ?></td>
                <td><img src='./img/categories/<?php echo $res->Photo; ?>' class="rounded mx-auto d-block w-25"></td>
                <td class='block w-25'>
                  <a href="?id=<?php echo $res->id; ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $res->id; ?>">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $res->id; ?>">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="edit<?php echo $res->id; ?>" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Змінити категорію</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="?id=<?php echo $res->id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <small>Ім'я</small>
                          <input type="text" class="form-control" name="name" value='<?php echo $res->Name; ?>'>
                        </div>
                        <div class="form-group">
                          <small>Опис</small>
                          <input type="text" class="form-control" name="description" value='<?php echo $res->Description; ?>'>
                        </div>
                        <div class="form-group">
                          <small>Фото</small>
                          <img src='./img/categories/<?php echo $res->Photo; ?>' class="d-block w-50">
                          <input type="file" class="form-control" name="file" value="<?php echo $res->Photo; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary btn-success" name="edit">Зберегти</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Modal Edit -->
              <!-- Modal Delete -->
              <div class="modal fade" id="delete<?php echo $res->id; ?>" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Точно видалити категорію "<?php echo $res->Name; ?>"</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                      <form action="?id=<?php echo $res->id; ?>" method="post">
                        <button type="submit" class="btn btn-primary btn-danger" name="delete">Так</button>
                      </form>
                    </div>

                  </div>
                </div>
              </div>
              <!-- Modal Delete -->
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Add -->
  <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Додати категорію</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <small>Ім'я</small>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
              <small>Опис</small>
              <input type="text" class="form-control" name="description">
            </div>
            <div class="form-group">
              <small>Фото</small>
              <input type="file" class="form-control" name="file">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-success" name="add">Зберегти</button>
        </div>
        </form>

      </div>
    </div>
  </div>
  <!-- Modal Add -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>