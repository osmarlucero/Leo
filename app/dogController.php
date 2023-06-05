<?php
	if (!isset($_SESSION)) {
    session_start();
	}
	include_once "connectionController.php";
	if(isset($_POST['action'])){
		$CategoryController = new CategoryController();
		switch ($_POST['action']) {
			case 'storeAnimal':
				$name = strip_tags($_POST['name']);
				$description = strip_tags($_POST['description']);
				$year = strip_tags($_POST['year']);
				$status = strip_tags($_POST['status']);
				$contentType = strip_tags($_POST['contentType']);
				$link = strip_tags($_POST['link']);
				$CategoryController->store(
					$name,
					$description,
					$date,
					$year,
					$status,
					$link);
			break;
		}
	}

	class CategoryController{
		public function store($name,$description,$date,$directors,$clasificacion,$duration,	$categorie,
					$budget,$year,$status,$found,$contentType,$link){
			$conn = connect();
			if ($conn->connect_error==false){
				if($name!="" &&$description!=""&&$status!=""){
					$target_path="../Imagenes/Covers";						
					$new_path = $target_path.basename($_FILES['imageCover']['name']);
					if(move_uploaded_file($_FILES['imageCover']['tmp_name'], $new_path)){
						$query="insert into pelicula (nombre, descripcion, fechaDeEstreno, directores, clasificacion, duracion, categoria,
						presupuesto, añoDeEstreno, status, recaudacion, portada,tipo, link) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
						$prepared_query = $conn->prepare($query);
						$prepared_query->bind_param('ssssssssisssss',$name,$description,$date,$directors,$clasificacion,$duration,$categorie,
						$budget,$year,$status,$found, $new_path,$contentType,$link);
						if($prepared_query->execute()){
							header("Location:".$_SERVER["HTTP_REFERER"]);
							$_SESSION['success'] ="Datos enviados correctaqmente";
						}
						else{
							$_SESSION['error'] ="verifica datos";
							header("Location:".$_SERVER["HTTP_REFERER"]);
						}
					}
				}
			}
			else{
				$_SESSION['error'] ="COnexion MAl BD";
				header("Location:".$_SERVER["HTTP_REFERER"]);
			}

		}
		public function get($name){
			$year = date("Y");
			$conn = connect();
			if ($conn->connect_error==false){			
				switch ($name) {
					case 'Inicio':
						$query = "select * FROM `pelicula` order by id DESC";
					break;
					case 'CLASICOS':
						$query = "SELECT * FROM `pelicula` where añoDeEstreno <1999 order by añoDeEstreno DESC";
					break;
					case 'ESTRENOS':
						$query = "select * FROM `pelicula` where añoDeEstreno ='$year' order by añoDeEstreno DESC";
					break;

					case '4K':
						$query = "select * FROM `pelicula` where tipo ='4k' order by añoDeEstreno DESC";
						
					break;
					case 'TRAILERS':
						$query = "select * FROM `pelicula` where tipo ='TRAILERS' order by añoDeEstreno DESC";
						
					break;
					case 'Serie':
						$query = "select * FROM `pelicula` where tipo ='Serie' order by añoDeEstreno DESC";
						
					break;
					case 'PELICULA':
						$query = "select * FROM `pelicula` where tipo ='PELICULA' order by añoDeEstreno DESC";
						
					break;
							
					default:
						$query = "select * FROM `pelicula` where categoria='".$name."' order by id DESC";
					break;
				}
				$prepared_query = $conn->prepare($query);
				$prepared_query->execute();
				$results = $prepared_query->get_result();
				$categories = $results->fetch_all(MYSQLI_ASSOC);

				if( count($categories)>0){
					return $categories;
				}else{
					return array();				
				}
			}else{
				echo "error";
			}
		}	
	}
?>