<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin</title>
		<link rel="stylesheet" href="/css/admin.css">
	</head>

	<body>
		<div class="login">
			<form action = "/entrance/input" method="POST" id="slick-login">
			<?if(isset($_GET['error'])):?>
			<div class="error">
				<?if($_GET['error'] == 1):?>
					<div class="alert alert-danger">
						<p style = "font-weight:bold;color:red">Логин или пароль введены неверно</p>
					</div>
				<?endif;?>
			</div>
			<?endif;?>
				<label for="username">Логин:</label>
					<input type="text" name="email" class="placeholder" placeholder="admin@mail.ru">

				<label for="password">Пароль:</label>
					<input type="password" name="password" class="placeholder" placeholder="Пароль">

				<input type="submit" value="ВОЙТИ">
			</form>
		</div>
	</body>

</html>