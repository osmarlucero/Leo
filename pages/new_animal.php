<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="StyleSheet" href= "../css/admin_css.css?v=0.0.2" />
    <link rel="StyleSheet" href= "../css/examp_css.css?v=0.0.2" />
    <title>Nuevo Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"crossorigin="anonymo<li>Imagen Del Animal <input type="file" name="imageCover" required="" placeholder="Imagen Pelicula" accept="image/*"> </li>
    us">
    <link rel="shortcut icon" href="../images/veterinary_icon_180324.png" />
    <meta charset="UTF-8">
    <meta http-equiv =»Cache-Control» content =»no-cache»/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="app/jquery-3.5.1.min.js"></script>
    <script>
    window.onload = function() {
      var container = document.getElementById('menu_left');
      fetch('../pages/menu.php')
        .then(response => response.text())
        .then(data => {
          container.innerHTML = data;
        })
        .catch(error => {
          console.log('Error:', error);
        });
    };
  </script>
</head>
<body>

    <div id="menu_left">
        
    </div>
    <div id="container">
        <!-- Inicio primer container-->
        <div id="main">
            <!-- inicio square -->
            <div class="square">
                  <h4>  Nuevo Ingreso</h4>
                <div class="square_inner">
                    <form action="../app/dogController.php" method="POST" enctype="multipart/form-data" >
                        <ul id="list_form">
                            <li><input type="text" name="name" placeholder="Nombre"></li>
                            <li><input type="text" name="type" placeholder="Tipo De Animal"></li>
                            <li><input type="text" name="age" placeholder="Edad"></li>
                            <li><input type="text" name="place_found" placeholder="Lugar Encontrado"></li>
                            <li><textarea type="text" name="vaccine" placeholder="Vacunas"></textarea></li>
                            <li>Imagen Del Animal <input type="file" name="imageCover" required="" placeholder="Imagen Pelicula" accept="image/*"> </li>
                            <li>
                                 <button type="submit" class="style_form font_style_reverse"> 
                            Dar De Alta</button>
                            </li>

                        </ul>
                        <input type="hidden" name="action" value="storeAnimal">
                    </form>
                </div>
            </div>
            <!-- Fin square -->
        </div>
    </div>
</body>                     
</html>