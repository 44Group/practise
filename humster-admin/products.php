<?php include 'product_functions.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Humster. Admin-panel</title>
</head>

<body class="bg-secondary">
  <div class="container mb-5 bg-light">
    <header class="d-flex flex-wrap justify-content-around py-3 border-bottom">
      <ul class="nav d-flex nav-pills flex-wrap justify-content-between mt-3">
        <li class="nav-item"><a href="/" class="nav-link m-2" aria-current="page">Категорії</a></li>
        <li class="nav-item"><a href="./products.php" class="nav-link m-2 active">Товари</a></li>
      </ul>
    </header>
  </div>
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
            <th class='text-center'>Категорія</th>
            <th class='text-center'>Фото</th>
            <th>Ціна</th>
            <th>Дії</th>
          </thead>
          <tbody>
            <?php foreach ($result as $res) { ?>
              <tr>
                <td><?php echo $res->Name; ?></td>
                <td><?php echo $res->Description; ?></td>
                <td class='ml-5'><?php echo $res->Category; ?></td>
                <td><img src='./img/products/<?php echo $res->Photo; ?>' class="rounded mx-auto d-block w-50"></td>
                <td><?php echo $res->Price; ?></td>
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
                      <h5 class="modal-title" id="exampleModalLabel">Змінити продукт</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="?id=<?php echo $res->id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <small>Назва</small>
                          <input type="text" class="form-control" name="name" value='<?php echo $res->Name; ?>'>
                        </div>
                        <div class="form-group">
                          <small>Ціна</small>
                          <input type="number" class="form-control" name="price" value='<?php echo $res->Price; ?>'>
                        </div>
                        <div class="form-group">
                          <small>Опис</small>
                          <input type="text" class="form-control" name="description" value='<?php echo $res->Description; ?>'>
                        </div>
                        <div class="form-group">
                          <small>Категорія</small>
                          <select class="form-select" aria-label="Default select example" name="idCategory">
                            <?php foreach ($category as $categ) { ?>
                              <option value="<?php echo $categ->id; ?>" <?php if(strcasecmp($categ->Name, $res->Category) == 0){
                                echo 'selected';
                              } ?> ><?php echo $categ->Name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <small>Фото</small>
                          <img src='./img/products/<?php echo $res->Photo; ?>' class="d-block w-50">
                          <input type="file" class="form-control" name="file">
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
                      <h5 class="modal-title" id="exampleModalLabel">Точно видалити продукт "<?php echo $res->Name; ?>"</h5>
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
          <h5 class="modal-title" id="exampleModalLabel">Додати продукт</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <small>Назва</small>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
              <small>Ціна</small>
              <input type="number" class="form-control" name="price">
            </div>
            <div class="form-group">
              <small>Опис</small>
              <input type="text" class="form-control" name="description">
            </div>
            <div class="form-group">
              <small>Категорія</small>
              <select class="form-select" aria-label="Default select example" name="idCategory">
                <?php foreach ($category as $categ) { ?>
                  <option value="<?php echo $categ->id; ?>"><?php echo $categ->Name; ?></option>
                <?php } ?>
              </select>
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

  <script src="https://use.fontawesome.com/dfcff28445.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>