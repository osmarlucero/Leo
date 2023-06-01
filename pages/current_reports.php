<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="StyleSheet" href= "../css/admin_css.css?v=0.0.2" />
    <link rel="StyleSheet" href= "../css/vacc_css.css?v=0.0.2" />
    <title>Reportes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"crossorigin="anonymous">
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
                <div class="square_inner">
                <h4>Reportes</h4>
                <div id="header">
                    <ul>
                        <li>Nombre De Animal</li>
                        <li>
                            <select>
                                <option>Panfilo</option>
                                <option>Juan</option>
                            </select>
                        </li>
                    </ul>
                    <ul>
                        <li>Fecha</li>
                        <li>
                           <input type="date" name="">
                        </li>
                        <li><p>Buscar</p></li>
                        <li><p>Nueva +</p></li>
                    </ul>
                </div>
                    <ul class="list_form">
                        <li><p>Reporte</p></li>
                        <li><p>Reporte</p></li>
                        <li><p>Reporte</p></li>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- Fin square -->
        </div>

    </div>
</body>                     
</html>