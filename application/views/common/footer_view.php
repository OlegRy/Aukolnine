<style>
	.footer {
		width: 100%;
		bottom: 0;
	}
</style>
<footer class="footer" style = "background:black;color:white;font-size:12px;font-family: Arial, Helvetica, sans-serif;margin-top:80px;line-height:18px;">
			<div class="container" style="overflow: hidden;">

				<div class="footer-block" style="width: 100%;">
					<div class="logo">
						ЛОГОТИП
					</div>
				</div>

				<div class="footer-block footer-block-main"  style="float: left; width: 100px; height: 100px;margin-left:20px;">
					<p>Главная:</p>

					<ul>
						<a href = "#" style = "text-decoration:none;color:white;">Аукционы</a><br>
						<a href = "#" style = "text-decoration:none;color:white;">Game Zone</a><br>
						<a href = "#" style = "text-decoration:none;color:white;">Купить ставки</a>
						<a href = "#" style = "text-decoration:none;color:white;">Личный кабинет</a>
					</ul>
				</div>

				<div class="footer-block footer-block-information"  style="float: left; width: 200px; height: 100px;margin-left:20px;">
					<p>Важная информация:</p>

					<ul>
						<a href = "#" style = "text-decoration:none;color:white;">Пользовательское соглашение</a>
						<a href = "#" style = "text-decoration:none;color:white;">Обработка персональных данных</a>
						<a href = "#" style = "text-decoration:none;color:white;">Условия купли продажи</a>
						<a href = "#" style = "text-decoration:none;color:white;">Сотрудничайте с нами</a>
					</ul>
				</div>

				<div class="footer-block footer-block-helpful"  style="float: left; width: 160px; height: 100px;margin-left:40px;">
					<p>Полезно знать:</p>

					<ul>
						<a href = "#" style = "text-decoration:none;color:white;">Как это работает</a>
						<a href = "#" style = "text-decoration:none;color:white;">Вопросы ответы</a>
						<a href = "#" style = "text-decoration:none;color:white;">Отзывы и видео</a>
						<a href = "#" style = "text-decoration:none;color:white;">Советы для новичков</a>
					</ul>
				</div>

				<div class="footer-block footer-block-phone" style="float: left; width: 100px; height: 100px;margin-left:40px;">
					<div>
						Наш телефон:<br>
						8(800)134-45-67
					</div>
				</div>
			</div>
		</footer>

	</body>

<?if(isset($personal) && $personal == 'Personal' || isset($aukcion) && $aukcion == 'Lot'):?>
		<!-- END FOOTER -->
		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
		<!-- BEGIN CORE PLUGINS -->
		<!--[if lt IE 9]>
		<script src="../../assets/global/plugins/respond.min.js"></script>
		<script src="../../assets/global/plugins/excanvas.min.js"></script> 
		<![endif]-->
		<?if(isset($personal) && $personal == 'Personal'){?>
			<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<?}?>   
		<script src="../../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
		<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
		<script src="../../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
		<script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
		<script src="../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
		<script src="../../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
		<script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->
		<!-- BEGIN PAGE LEVEL PLUGINS -->
		<script src="../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
		<script src="../../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
		<!-- END PAGE LEVEL PLUGINS -->
		<!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
		<script src="../../assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
		<script src="../../assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
		<script src="../../assets/admin/pages/scripts/profile.js" type="text/javascript"></script>
		<script src="/js/change_password.js" type="text/javascript"></script>
		<script src="/js/save_data.js" type="text/javascript"></script>
		<script src="/js/saveUsersAddress.js" type="text/javascript"></script>
		<!-- END PAGE LEVEL SCRIPTS -->
		<script>
		jQuery(document).ready(function() {       
			// initiate layout and plugins
			Metronic.init(); // init metronic core components
			Layout.init(); // init current layout
			Demo.init(); // init demo features\
			Profile.init(); // init page demo
		});
		</script>
		<!-- END JAVASCRIPTS -->
<?endif;?>		
	
</html>