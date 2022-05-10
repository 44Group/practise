<?php

include 'db.php';
//READ
$sql = $pdo->prepare("SELECT products.id, products.Name, products.Photo, Price, products.Description, categories.id as idCategory, categories.Name as Category FROM products INNER JOIN categories ON products.idCategory = categories.id ");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);


$sql = $pdo->prepare("SELECT `id`, `Name`, `Photo`, `Description` FROM `categories`");
$sql->execute();
$catresult = $sql->fetchAll(PDO::FETCH_OBJ);

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Хом'ячок</title>
</head>

<body>
  <div style="background-color: #C4C4C4;">
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3  border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <img src="./assets/logo.jpg" height="100">
        </a>

        <div style="background-color: #C4C4C4;">
          <div class="container">
            <header class="d-flex flex-wrap justify-content-around py-3">
              <ul class="nav d-flex nav-pills flex-wrap justify-content-between mt-3">
                <li class="nav-item"><a href="#about" class="nav-link m-2">Про компанію</a></li>
                <li class="nav-item"><a href="#products" class="nav-link m-2">Каталог</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link m-2">Контакти</a></li>
                <li class="nav-item"><a href="#delivery" class="nav-link m-2">Умови доставки</a></li>
              </ul>
            </header>
          </div>
        </div>
    </div>
    </header>
  </div>
  </div>
  <!-- Slider -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./assets/slider/2-1.jpg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="./assets/slider/masterzoo05op.jpg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="./assets/slider/Ukraina_Kharkov_MasterZoo_02.jpg" class="d-block w-100">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Slider -->
  <style>
    .card {
      border: none;
    }

    .card a {
      width: 330px;
      height: 190px;
      position: relative;
    }


    .card a .card-body {
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      transition-duration: 1s;
      justify-content: center;
      align-items: center;
      display: flex;
      flex-direction: column;
      opacity: 0;
      border-radius: 10px;
      background-color: grey;
      color: #fff;
    }

    .card a:hover .card-body {
      opacity: 1;

    }
  </style>



  <section class="my-5 text-center container" id="about" style="background-color:cornsilk">
    <div class="row py-lg-5">
      <div class="col-lg-8 col-md-10 mx-auto">
        <h1 class="fw-light">Магазин <b>Хом'ячок</b></h1>
        <h5 class="lead text-muted">Супермаркет для Ваших улюбленців "Хом'ячок", пропонує широкий вибір товарів для собак, котів, риб, птахів, коней, гризунів та рептилій. У нас в ассортименті представлені як повсякденні так і лікувальні корма для Ваших улюбленців, величезний вибір вітамінів і корисних добавок, посуд та засоби гігієни. Також у нас в зоомагазині можна придбати різноманітні товари для відпочинку (будиночки, спальні місця) і розваг (іграшки для улюбленців), все для прогулянок (ошийники, шлеї, тощо), все для виховання (дресерування), аксесуари для прогулянок, різноманий одяг на всі пори року. Також представлено багато повчальної інформації для якісного життя Ваших улюбленців, статті і відео.</h5>
        <h4>Товари для улюбленців</h4>
        <h6 class="lead text-muted">Наш інтернет магазин зоотоварів пропонує широкий асортимент товарів для Ваших улюбленців від виробників світових брендів. Вся продукція оригінальна і сертифікована. Постачальники є офіційними представниками в Україні, або самі виробники. Ми уважно слідкуємо за термінами придатності і реалізації кожного товару, тому що здоров'я і самопочуття кожного улюбленця для нас важливе так само як і наша репутація.</h6>
        <h4>Купити зоотовари</h4>
        <h6 class="lead text-muted">Купити зоотовари в інтернет-супермаркеті "Хом'ячок" можливо он-лайн, не виходячи з дому 24 години на добу, оформлення замовлення займе декілька хвилин. Також оформити замовлення можно в телефонному режимі, звернувшись на телефони які вказані на сайті, менеджер якісно Вас проконсультує і допоможе у вирішенні питань.</h6>
        <h4>Ознайомитися з правилами доставки Ви можете у розділі Доставка і оплата.</h4>
        <h6 class="lead text-muted">Також в нашому магазині дійсна програма лояльності для клієнтів, ми цінуємо кожного клієнта, тому пропонуємо приємні акції (які постійно оновлюються), вигідні ціни і якісну консультацію.</h6>
        <h4>У нас Ви знайдете те, чого немає ніде!</h4>
      </div>
    </div>
  </section>




  <div id="products" class="container mt-5 mb-5">
    <h1 class="mt-5 mb-5 text-center">
      Товари
    </h1>
    <div class="accordion" id="accordionExample">
      <?php
      $i = 10;
      foreach ($catresult as $res) {
      ?>
        <div class="accordion-item">
          <button class="accordion-button <?php if ($i != 10) echo 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#oiewhw<?php echo $res->id; ?>" aria-expanded="<?php if ($i == 10) {
                                                                                                                                                                                              echo 'true';
                                                                                                                                                                                            } else {
                                                                                                                                                                                              echo 'false';
                                                                                                                                                                                            } ?>" aria-controls="oiewhw<?php echo $res->id; ?>">
            <img src="http://humster-admin/img/categories/<?php echo $res->Photo; ?>" style="width: 10%;">
            <div class="card-body">
              <h3 class="card-title"><?php echo $res->Name; ?></h3>
            </div>
          </button>
          <div id="oiewhw<?php echo $res->id; ?>" class="accordion-collapse collapse  <?php if ($i == 10) echo 'show'; ?>" data-bs-parent="#accordionExample">
            <div class="accordion-body block">
              <p><b></b>Опис: <?php echo $res->Description; ?></p>
              <div class="container mt-5 mb-5">
                <div class="row flex-center justify-content-center align-items-center">
                  <?php
                  $a = 0;
                  foreach ($result as $cres) {
                    if ($cres->idCategory == $res->id) {

                  ?>
                      <div class="col block flex-center rounded">
                        <div class="card mb-5" style="width: 300px; background-color:azure;">
                          <img src="http://humster-admin/img/products/<?php echo $cres->Photo; ?>" id="ph<?php echo $cres->id; ?>" class="rounded-top" style="width: 300px;" />
                          <div class="card-body">
                            <h4 class="card-title text-center" id="n<?php echo $cres->id; ?>"><?php echo $cres->Name; ?></h3>
                          </div>
                          <h5 class="m-2" id="p<?php echo $cres->id; ?>">Ціна: <?php echo $cres->Price; ?> грн.</h5>

                          <h5 class="m-2">Опис:</h5>
                          <p class="ms-4"><?php echo $cres->Description; ?></p>
                          <button type="button" id="b<?php echo $cres->id; ?>" class="btn btn-info" onclick="add.apply(this)">Купити</button>
                        </div>
                      </div>
                  <?php
                    }
                    $a = 1;
                  } ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php
        $i = 1;
      } ?>
    </div>

  </div>



  <!-- <div class="container mt-5 mb-5">
     <div class="row flex-center justify-content-center align-items-center">
       <?php foreach ($result as $res) { ?>
         <div class="col block flex-center">
           <div class="card mb-5">
             <a href="./catalog.php" class="container">
               <img src="http://transport-admin/img/categories/<?php echo $res->photo; ?>" class="card-img-top">
               <div class="card-body">
                 <h3 class="card-title"><?php echo $res->Name; ?></h5>
                   <h5 class='card-subtitle mb-2'><?php echo $res->Description; ?></h5>
               </div>
             </a>
           </div>
         </div>
       <?php } ?>
     </div>
   </div> -->



  <section class="my-5 text-center container py-3" id="contact" style="background-color:bisque ">
    <h2 class="mt-5 ">
      КОНТАКТНА ІНФОРМАЦІЯ
    </h2>
    <h5 class="mt-3">
      Телефон: +38 (050) 304 55 34
    </h5>
    <h5 class="mt-3">
      Email: homka@gmail.com
    </h5>
    <h2 class="mt-5">
      ОФІС
    </h2>
    <h5 class="mt-3">
      36034 Україна, м. Полтава,
    </h5>
    <h5 class="mt-3">
      вул. Пушкіна 8
    </h5>
    <h2 class="mt-5">
      ГРАФІК РОБОТИ
    </h2>
    <h5 class="mt-3">
      Пн-Пт: 8:00 – 17:00
    </h5>
    <h5 class="mt-3">
      Сб-Нд: Вихідний день
    </h5>
  </section>


  <div class="container w-100 align-content-center align-items-center" id="delivery">
    <div class="row">
      <div class="col-lg-6 col-sm-12  p-sm-1 p-lg-5">
        <h1 class="mb-lg-5 mb-sm-2">
          Умови доставки
        </h1>
        <h5 class="mt-lg-5  pt-lg-5">
          Інтернет-зоомагазин Zoo.com.ua здійснює доставку з понеділка по п’ятницю з 09.00 - 18.00.
          Доставка зоотоварів по Україні здійснюється за допомогою кур’єрських служб.
          Мінімальна сума замовлення для відправки наложеним платежем від 200грн. До 200грн по 100% передоплаті.
          При оформленні замовлення необхідно вказати слідуючі дані, для кур’єрської служби: ПІБ , місто куди прямує замовлення, адресу відділення, контактний номер телефону.
          Наша компанія не несе відповідальність за збереження цілісності Вашого замовлення при пересилці. Будь-ласка перевіряйте цілісність товару на відділенні.
        </h5>
      </div>
      <div class="col-lg-6 pl-5">
        <img style="width: 100%;" src="./assets/Screenshot_5.png">
      </div>
    </div>
  </div>



  <!-- Button trigger modal -->

  <button type="button" class="btn btn-primary rounded-3" data-bs-toggle="modal" style="position:fixed; top:30px; right:30px;" data-bs-target="#exampleModal" onclick="update()">
    <img src="assets/busket.svg" width="40px" height="40px">
  </button>
  <small style="position:fixed; top:20px; right:20px; width:30px; height:30px" class="card rounded-circle bg-info p-1 text-center" id="number">
    0
  </small>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="busket">
          <p>
            Корзина пуста
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
          <button type="button" class="btn btn-danger" onclick="{localStorage.removeItem('busket'); document.querySelector('#number').innerHTML = 0; document.querySelector('#busket').innerHTML = 'Корзина пуста' }">Очистити корзину</button>
        </div>
      </div>
    </div>
  </div>



  <svg onclick="topFunction()" id="myBtn" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
  </svg>


  <style>
    #myBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      z-index: 99;
      font-size: 18px;
      border: none;
      outline: none;
      width: 40px;
      height: 40px;
      background-color: #2196f3;
      color: white;
      cursor: pointer;
      border-radius: 50%;
    }

    #myBtn:hover {
      background-color: #555;
    }
  </style>
  <script>
    let busket = [];
    busket = JSON.parse(localStorage.getItem("busket"));
    document.querySelector('#number').innerHTML = busket.length;


    function update() {
      let busket = [];
      busket = JSON.parse(localStorage.getItem("busket"));
      if (busket) {
        let list = "<div class='d-flex flex-column'>";
        let sum = 0;
        busket.forEach(element => {
          sum += +element.Price.slice(-9, -5);
          list += "<div class='d-flex flex-row'><img width='40px' height='40px' src='" + element.Photo + "' /><h5 class='mx-1'>" + element.Name + "</h5><h5>" + element.Price + "</h5></div>"
        });
        list += "</div><h4  class='m-2'>Всього : " + sum + "</h4>"
        document.querySelector('#busket').innerHTML = list;
      }
    }

    //add to busket
    function add() {
      idProduct = this.id;
      let name = document.getElementById("n" + idProduct.slice(1)).textContent;
      let price = document.getElementById("p" + idProduct.slice(1)).textContent;
      let photo = document.getElementById("ph" + idProduct.slice(1)).src;
      console.log(name + "    " + price.toString() + "    " + photo)
      let busket = [];
      busket = JSON.parse(localStorage.getItem("busket"));
      if (busket != null) {
        busket.push({
          Name: name,
          Price: price,
          Photo: photo
        })
      } else {
        busket = []
        debugger;
        busket.push({
          Name: name,
          Price: price,
          Photo: photo
        })
      }
      let str = JSON.stringify(busket);

      localStorage.setItem('busket', str);

      document.querySelector('#number').innerHTML = busket.length;

    }
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
      } else {
        document.getElementById("myBtn").style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/dfcff28445.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>