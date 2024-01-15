<?php

include 'helpers/connect.php';

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:index.php');
}

// if(isset($_POST['submit'])){

//    if($user_id != ''){

//       $id = create_unique_id();
//       $title = $_POST['title'];
//       $title = filter_var($title, FILTER_SANITIZE_STRING);
//       $description = $_POST['description'];
//       $description = filter_var($description, FILTER_SANITIZE_STRING);
//       $rating = $_POST['rating'];
//       $rating = filter_var($rating, FILTER_SANITIZE_STRING);

//       $verify_review = $conn->prepare("SELECT * FROM `reviews` WHERE post_id = ? AND user_id = ?");
//       $verify_review->execute([$get_id, $user_id]);

//       $add_review = $conn->prepare("INSERT INTO `reviews`(id, post_id, user_id, rating, title, description) VALUES(?,?,?,?,?,?)");
//       $add_review->execute([$id, $get_id, $user_id, $rating, $title, $description]);
//       $success_msg[] = 'Operación exitosa!';
//       header('location:view_post.php?get_id='.$get_id);
//       // if($verify_review->rowCount() > 0){
//       //    $warning_msg[] = 'Operación exitosa!';
//       // }else{
//       // }

//    }else{
//       $warning_msg[] = 'Inicia sesión primero';
      
//    }

// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Rating Me | Referencia</title>

	<link rel="shortcut icon" href="<?php echo BASE_URL . "uploaded_files/icon.png"; ?>">
	<link rel="stylesheet" href="css/style.css">

</head>

<body>

	<!-- header section starts  -->
	<?php include 'helpers/header.php'; ?>
	<!-- header section ends -->

	<!-- add review section starts  -->

	<section class="account-form">

		<form class="form__add__review" method="post">
			<h3>Agregando referencia</h3>
			<p class="placeholder">Nombre del servicio <span>*</span></p>
			<input type="text" name="title" required maxlength="50" placeholder="Venta de USDT" class="box">
			<input type="text" name="idPost" value="<?= $get_id; ?>" hidden="hidden">
			<p class="placeholder">Comentario</p>
			<textarea name="description" class="box" placeholder="Rápido, seguro y serio" maxlength="1000" cols="30"
				rows="10"></textarea>
			<p class="placeholder">Del 1 al 5 ¿Que valor le darías? <span>*</span></p>


			<div class="rating__stars">
				<input id="rating-1" class="rating__input rating__input-1" type="radio" name="rating" value="1">
				<input id="rating-2" class="rating__input rating__input-2" type="radio" name="rating" value="2">
				<input id="rating-3" class="rating__input rating__input-3" type="radio" name="rating" value="3">
				<input id="rating-4" class="rating__input rating__input-4" type="radio" name="rating" value="4">
				<input id="rating-5" class="rating__input rating__input-5" type="radio" name="rating" value="5">
				<label class="rating__label" for="rating-1">
					<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
						<g transform="translate(16,16)">
							<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8"
								transform="scale(0)" />
						</g>
						<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<g transform="translate(16,16) rotate(180)">
								<polygon class="rating__star-stroke"
									points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07"
									fill="none" />
								<polygon class="rating__star-fill"
									points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07"
									fill="#000" />
							</g>
							<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
								<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
							</g>
						</g>
					</svg>
					<span class="rating__sr">1 star—Terrible</span>
				</label>
				<label class="rating__label" for="rating-2">
					<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
						<g transform="translate(16,16)">
							<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8"
								transform="scale(0)" />
						</g>
						<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<g transform="translate(16,16) rotate(180)">
								<polygon class="rating__star-stroke"
									points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07"
									fill="none" />
								<polygon class="rating__star-fill"
									points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07"
									fill="#000" />
							</g>
							<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
								<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
							</g>
						</g>
					</svg>
					<span class="rating__sr">2 stars—Bad</span>
				</label>
				<label class="rating__label" for="rating-3">
					<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
						<g transform="translate(16,16)">
							<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8"
								transform="scale(0)" />
						</g>
						<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<g transform="translate(16,16) rotate(180)">
								<polygon class="rating__star-stroke"
									points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07"
									fill="none" />
								<polygon class="rating__star-fill"
									points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07"
									fill="#000" />
							</g>
							<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
								<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
							</g>
						</g>
					</svg>
					<span class="rating__sr">3 stars—OK</span>
				</label>
				<label class="rating__label" for="rating-4">
					<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
						<g transform="translate(16,16)">
							<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8"
								transform="scale(0)" />
						</g>
						<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<g transform="translate(16,16) rotate(180)">
								<polygon class="rating__star-stroke"
									points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07"
									fill="none" />
								<polygon class="rating__star-fill"
									points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07"
									fill="#000" />
							</g>
							<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
								<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
							</g>
						</g>
					</svg>
					<span class="rating__sr">4 stars—Good</span>
				</label>
				<label class="rating__label" for="rating-5">
					<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
						<g transform="translate(16,16)">
							<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8"
								transform="scale(0)" />
						</g>
						<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<g transform="translate(16,16) rotate(180)">
								<polygon class="rating__star-stroke"
									points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07"
									fill="none" />
								<polygon class="rating__star-fill"
									points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07"
									fill="#000" />
							</g>
							<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
								<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
								<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
							</g>
						</g>
					</svg>
					<span class="rating__sr">5 stars—Excellent</span>
				</label>
				<p class="rating__display" data-rating="1" hidden>Terrible</p>
				<p class="rating__display" data-rating="2" hidden>Malo</p>
				<p class="rating__display" data-rating="3" hidden>OK</p>
				<p class="rating__display" data-rating="4" hidden>Bueno</p>
				<p class="rating__display" data-rating="5" hidden>¡Excelente!</p>
			</div>
			<input type="submit" value="Enviar referencia" name="submit" class="btn">
			<a href="view_post.php?get_id=<?= $get_id; ?>" class="option-btn">Atrás</a>
		</form>

	</section>

	<!-- add review section ends -->
	<?php include 'helpers/footer.php'; ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<!-- custom js file link  -->
	<script>
		const BASE_URL = "<?php echo BASE_URL; ?>"
	</script>
	<script src="js/app.js"></script>
	<script src="js/script.js"></script>

	<?php include 'helpers/alers.php'; ?>

</body>

</html>