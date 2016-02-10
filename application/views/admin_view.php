<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 4.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Form Layouts</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/select2/select2.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../../assets/global/plugins/icheck/skins/all.css" rel="stylesheet"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="../../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="../../assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="../../assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="../../assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">


<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<!-- BEGIN HEADER -->
<div class="page-header">
	<div class="portlet box green">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-gift"></i>Добавление аукциона
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse" data-original-title="" title="">
				</a>
				<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
				</a>
				<a href="javascript:;" class="reload" data-original-title="" title="">
				</a>
				<a href="javascript:;" class="remove" data-original-title="" title="">
				</a>
			</div>
		</div>
		<div class="portlet-body form">
		<div>
			<?if(isset($_GET['success'])):?>
			<div class="error">
				 <?if($_GET['success'] == 1):?>
					<div class="alert alert-success">
						<p style = "text-align:center;">Аукцион успешно добавлен</p>
					</div>
				<?endif;?>	
			</div>
			<?endif;?>
		</div>
			<!-- BEGIN FORM-->
			<form action="/admin/add" class="form-horizontal" enctype="multipart/form-data" method = "POST">
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label">Название</label>
						<div class="col-md-4">
							<input type="text" class="form-control input-circle" name = "name" placeholder="Название">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Первоначальная цена</label>
						<div class="col-md-4">
							<input type="text" class="form-control input-circle" name = "price" placeholder="Цена">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Полная цена</label>
						<div class="col-md-4">
							<input type="text" class="form-control input-circle" name = "full_price" placeholder="Цена">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Время</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="datetimepicker2" name = "time">
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Текст</label>
						<div class="col-md-4">
							<textarea class="form-control" placeholder = "Текст" name = "auk_text" id = "auk_text"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Категория</label>
						<div class="col-md-4">
							<input type="text" class="form-control input-circle" name = "category" placeholder="Категория">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Тип аукциона</label>
						<div class="col-md-4">
						<div class="input-group">
							<div class="icheck-list">
								<label>
									<input id = "nogen" type="radio" value = "Auction" name="type_auct" onclick = "genre(0);" checked class="icheck"> Простые аукционы
								</label>
								<label>
									<input id = "mygen" type="radio" value = "Gamezone" name="type_auct" onclick = "genre(1);"  class="icheck"> Gamezone
								</label>
							</div>
						</div>
						</div>
					</div>
					<div id = "genre" class="form-group" style = "display:none;">
						<label class="col-md-3 control-label">Жанр</label>
						<div class="col-md-4">
							<input type="text" class="form-control input-circle" name = "game_genre" placeholder="Жанр">
						</div>
					</div>
					<script>
						function genre(type){
							if(type == 1){
								$('#genre').css('display', 'block');
							} else {
								$('#genre').css('display', 'none');
							}
							
						}
					</script>
					<div class="form-group">
						<label class="col-md-3 control-label">Аукцион по билетам</label>
						<div class="col-md-4">
						<div class="input-group">
							<div class="icheck-list">
								<label>
									<input type="radio" value = "1" name="ticket" class="icheck"> Да
								</label>
								<label>
									<input type="radio" value = "0" name="ticket" checked  class="icheck"> Нет
								</label>
							</div>
						</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Бот</label>
						<div class="col-md-4">
						<div class="input-group">
							<div class="icheck-list">
								<label>
									<input type="radio" value = "1" name="type_bot" class="icheck"> Включить
								</label>
								<label>
									<input type="radio" value = "0" name="type_bot" checked  class="icheck"> Выключить
								</label>
							</div>
						</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Картинка</label>
						<div class="col-md-4">
							<p><input type="file" name="userfile"></p>
						</div>
					</div>
				</div>
				<div class="form-actions">
					<div class="row">
						<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn btn-circle blue">Добавить</button>
						</div>
					</div>
				</div>
			</form>
			<!-- END FORM-->
		</div>
	</div>
	<!--Тут статистика-->
	<div class="portlet box green">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-gift"></i>Статистика
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse" data-original-title="" title="">
				</a>
				<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
				</a>
				<a href="javascript:;" class="reload" data-original-title="" title="">
				</a>
				<a href="javascript:;" class="remove" data-original-title="" title="">
				</a>
			</div>
		</div>
		<div class="portlet-body form">	
			<!-- BEGIN FORM-->
		<!-- BEGIN CHART PORTLET-->
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-haze"></i>
					<span class="caption-subject bold uppercase font-green-haze"> Возраст</span>
					<span class="caption-helper">Статистика по возрасту</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
					<a href="#portlet-config" data-toggle="modal" class="config">
					</a>
					<a href="javascript:;" class="reload">
					</a>
					<a href="javascript:;" class="fullscreen">
					</a>
					<a href="javascript:;" class="remove">
					</a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="chart_5" class="chart" style="height: 400px;">
					<?echo "<pre>";print_r($age);?>
				</div>
			</div>
		</div>		
		<!-- END CHART PORTLET-->
		<!-- BEGIN CHART PORTLET-->
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-haze"></i>
					<span class="caption-subject bold uppercase font-green-haze"> Пол</span>
					<span class="caption-helper">Статистика по полу</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
					<a href="#portlet-config" data-toggle="modal" class="config">
					</a>
					<a href="javascript:;" class="reload">
					</a>
					<a href="javascript:;" class="fullscreen">
					</a>
					<a href="javascript:;" class="remove">
					</a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="chart_5" class="chart" style="height: 400px;">
					<?echo "<pre>";print_r($gender);?>
				</div>
			</div>
		</div>		
		<!-- END CHART PORTLET-->
		<!-- BEGIN CHART PORTLET-->
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-haze"></i>
					<span class="caption-subject bold uppercase font-green-haze">Ставки</span>
					<span class="caption-helper">Общая активность ставок</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
					<a href="#portlet-config" data-toggle="modal" class="config">
					</a>
					<a href="javascript:;" class="reload">
					</a>
					<a href="javascript:;" class="fullscreen">
					</a>
					<a href="javascript:;" class="remove">
					</a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="chart_5" class="chart" style="height: 400px;">
					<?echo "<pre>";print_r($rate);?>
				</div>
			</div>
		</div>		
		<!-- END CHART PORTLET-->
		<!-- BEGIN CHART PORTLET-->
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-haze"></i>
					<span class="caption-subject bold uppercase font-green-haze">Продукция</span>
					<span class="caption-helper">Популярность продукции(при ставке)</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
					<a href="#portlet-config" data-toggle="modal" class="config">
					</a>
					<a href="javascript:;" class="reload">
					</a>
					<a href="javascript:;" class="fullscreen">
					</a>
					<a href="javascript:;" class="remove">
					</a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="chart_5" class="chart" style="height: 400px;">
					<?echo "<pre>";print_r($products);?>
				</div>
			</div>
		</div>		
		<!-- END CHART PORTLET-->
		<!-- BEGIN CHART PORTLET-->
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-haze"></i>
					<span class="caption-subject bold uppercase font-green-haze">Регистрация</span>
					<span class="caption-helper">Количество людей, кто зарегистрировался через сайт, а кто через вк</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
					<a href="#portlet-config" data-toggle="modal" class="config">
					</a>
					<a href="javascript:;" class="reload">
					</a>
					<a href="javascript:;" class="fullscreen">
					</a>
					<a href="javascript:;" class="remove">
					</a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="chart_5" class="chart" style="height: 400px;">
					<?echo "<pre>";print_r($type_site);?>
				</div>
				
			 <p>0 - это сам сайт<p>
			 <p>1 - это вк</p>
			</div>
		</div>		
		<!-- END CHART PORTLET-->
			<!-- END FORM-->
		</div>
	</div>
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="container">
		 <a href = "/" style = "text-decoration:none;color:white;">Главная</a>
	</div>
</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
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
<script type="text/javascript" src="../../assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL SCRIPTS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/components-pickers.js"></script>
<script src="../../assets/admin/pages/scripts/form-samples.js"></script>

<script type="text/javascript" src="../../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/charts-amcharts.js"></script>


<script type="text/javascript">
$(function () {
  $('#datetimepicker2').datetimepicker({language: 'ru'});
});
</script>

<script>
jQuery(document).ready(function() {    
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   FormSamples.init();
   ComponentsPickers.init();
   FormiCheck.init(); // init page demo
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>