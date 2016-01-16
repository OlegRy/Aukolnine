<!DOCTYPE html>
<html>
	
	<head>

		<meta charset="utf-8">
		<title>Главная страница</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<?if(isset($personal) && $personal == 'Personal' || isset($aukcion) && $aukcion == 'Lot'):?>
			<!-- BEGIN GLOBAL MANDATORY STYLES -->
			<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
			<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
			<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
			<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
			<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
			<!-- END GLOBAL MANDATORY STYLES -->
			<!-- BEGIN PAGE LEVEL STYLES -->
			<link href="../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
			<link href="../../assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
			<link href="../../assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
			<!-- END PAGE LEVEL STYLES -->
			<!-- BEGIN THEME STYLES -->
			<link href="../../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
			<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css">
			<link href="../../assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
			<link href="../../assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
			<link href="../../assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">

			<!-- END THEME STYLES -->
		<?endif;?>
		<link rel="stylesheet" href="/css/styles.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="/js/jquery.plugin.js"></script>
		<script type="text/javascript" src="/js/jquery.countdown.js"></script>
		<script type="text/javascript" src="/js/jquery.countdown-ru.js"></script>
		<script type="text/javascript" src="/js/application.js"></script>
		<script type="text/javascript" src="/js/captcha.js"></script>
		<script type="text/javascript" src="/js/rate.js"></script>
		<script type="text/javascript" src="/js/sorter.js"></script>
		<!--[if lt IE 9]>      
		   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>


	<body>
	<script>
		var my_session = "<?= $this->session->userdata('ay_login') ?>";
	</script>
	<?if($this->session->userdata('ay_login') == false){ ?>
		<header class="header">
			<div class="container">

				<div class="logo">
					<a href="/" class="logo-link">
						ЛОГОТИП
					</a>
				</div>

				<div class="header-contact">
					<div class="header-phone">8(800)123-45-67</div>
					<div class="header-phone-notation">24 часа, звонок по России бесплатный</div>
				</div>

				<div class="authorization">
					<div class="authorization-block">
						<a href="#openModal" class="authorization-link login-btn downloadavatar">
							Вход
						</a>
					</div>

					<div class="authorization-block">
						<a href="#openModal" class="authorization-link  downloadavatar">
							Регистрация
						</a>
					</div>
				</div>

			</div>
		</header>
		<?}else{?>
			<header class="header">
			<div class="container">

				<div class="logo">
					<a href="/" class="logo-link">
						ЛОГОТИП
					</a>
				</div>

				<div class="header-contact">
					<div class="header-phone">8(800)123-45-67</div>
					<div class="header-phone-notation">24 часа, звонок по России бесплатный</div>
				</div>

				<div class="authorization">
					<div class="authorization-block">
						<p class="authorization-link login-btn">
							<?=$this->session->userdata('ay_login')?>
						</p>
					</div>

					<div class="authorization-block">
						<a href = "/auth/logout" style = "text-decoration:none;color:white;"><?php echo $this->lang->line('logout'); ?></a>
					</div>
				</div>

			</div>
		</header>
		<?}?>
		

		<div id="openModal" class="modalDialog">
			<div>
				<a href="#close" title="Закрыть" class="close">X</a>
				<div class = "modal_reg">
					<div>
						<?if(isset($_GET['error'])):?>
						<div class="error">
							 <?if($_GET['error'] == 1):?>
								<div class="alert alert-danger">
									<p>Логин или пароль введены неверно</p>
								</div>
							<?endif;?>	
						</div>
						<?endif;?>
					</div>
					<form action = "/auth/reg" method = "POST">
						<table>
							<tr>
								<td>
									Email <input type = "email" name = "email">
								</td>
							</tr>
							<tr>
								<td>
									Пароль <input type = "password" name = "password">
								</td>
							</tr>
							<tr>
								<td>
									Логин <input type = "text" name = "login">
								</td>
							</tr>
							<tr>
								<td>
									Промокод <input type = "text" name = "promo">
								</td>
							</tr>
							<tr>
								<td>
									<input type = "submit" value = "Зарегистрироваться">
								</td>
							</tr>
						</table>
					</form>
					<form action = "/auth/auth" method = "POST">
						<table>
							<tr>
								<td>
									Email <input type = "email" name = "email">
								</td>
							</tr>
							<tr>
								<td>
									Пароль <input type = "password" name = "password">
								</td>
							</tr>
							<tr>
								<td>
									<input type = "submit" value = "Войти">
								</td>
							</tr>
						</table>
					</form>
					
				</div>
			</div>
		</div>
		
		

		<nav class="main-menu">
			<div class="container">
				<div class="main-menu-block">
					<ul>
						<li class="main-menu-link">
							<a style = "color:<?if($aukcion == 'Аукционы'){?>#32c5d2;<?}else{?>#a9a9a9<?}?>"  href="/aukcion">
								АУКЦИОНЫ 
							</a>
						</li>

						<li class="main-menu-link">
							<a  style = "color:<?if($aukcion == 'Gamezone'){?>#32c5d2;<?}else{?>#a9a9a9<?}?>"  href="/gamezone">
								GAME-ZONA
							</a>
						</li>

						<li class="main-menu-link">
							<a href="/">
								КАК ЭТО РАБОТАЕТ
							</a>
						</li>

						<li class="main-menu-link">
							<a href="/">
								ОТЗЫВЫ И ВИДЕО
							</a>
						</li>

						<li class="main-menu-link">
							<a style = "color:<?if($aukcion == 'Feedback'){?>#32c5d2;<?}else{?>#a9a9a9<?}?>"  href="/feedback">
								ОБРАТНАЯ СВЯЗЬ
							</a>
						</li>

						<li class="main-menu-link">
							<a href="/">
								БОНУСЫ
							</a>
						</li>

						<li class="main-menu-link">
							<a href="https://vk.com/my_group">
								МЫ В VK
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>