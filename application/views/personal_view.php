<?foreach($user as $user):?>
<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row margin-top-10">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar" style="width: 250px;">
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
								<img src="/images/users/<?=$user->avatar?>" class="img-responsive" style = "width:150px;height:150px;" alt="">
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									 <?=$user->login?>
								</div>
							</div>
							<!-- END SIDEBAR USER TITLE -->
							<!-- SIDEBAR BUTTONS -->
							<div class="profile-userbuttons">
							</div>
							<!-- END SIDEBAR BUTTONS -->
							<!-- SIDEBAR MENU -->
							<div class="profile-usermenu">
								<ul class="nav">
									<li class="active">
										<a href="/personal">
										<i class="icon-settings"></i>
										Account Settings </a>
									</li>
									<li class="active">
										<a href="/personal/lang?lang=english">
										<i class="fa fa-language"></i>
											English
										</a>
									</li>
									<li class="active">
										<a href="/personal/lang?lang=ru">
										<i class="fa fa-language"></i>
											Русский
										</a>
									</li>
									<li class="active">
										<a href="#" onclick = "alert('Нужно прикрутить робокассу');return false;">
										<i class="fa fa-language"></i>
											Купить билет
										</a>
									</li>
								</ul>
							</div>
							<!-- END MENU -->
						</div>
						<!-- END PORTLET MAIN -->
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab" aria-expanded="true">Personal Info</a>
											</li>
											<li class="">
												<a href="#tab_1_2" data-toggle="tab" aria-expanded="false">Change Avatar</a>
											</li>
											<li class="">
												<a href="#tab_1_3" data-toggle="tab" aria-expanded="false">Change Password</a>
											</li>
											<li class="">
												<a href="#tab_1_5" data-toggle="tab" aria-expanded="false">Адрес доставки</a>
											</li>
											<!--<li class="">
												<a href="#tab_1_4" data-toggle="tab" aria-expanded="false">Privacy Settings</a>
											</li>-->
											<li class="">
												<a href="#tab_1_4" data-toggle="tab" aria-expanded="false">История</a>
											</li>
											<li class="">
												<a href="#tab_1_6" data-toggle="tab" aria-expanded="false">Мои аукционы</a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
											<div class="tab-pane active" id="tab_1_1">
												<form role="form" id = "personal_info">
												<div id = "success_password_personal_info" class="alert alert-success" style = "display:none;">
													<p>Вы успешно обновили информацию</p>
												</div>
													<div class="form-group">
														<label class="control-label">Логин</label>
														<input type="text" id = "login" placeholder="<?=$user->login?>" class="form-control">
													</div>
													<div class="form-group">
														<label class="control-label">Электронная почта</label>
														<input type="text" id = "email" placeholder="<?=$user->email?>" class="form-control" disabled>
													</div>
													<div class="form-group">
														<label class="control-label">Дата регистрации</label>
														<input type="text" id = "data_reg" placeholder="<?=$user->date?>" class="form-control" disabled>
													</div>
													<div class="form-group">
														<label class="control-label">Имя</label>
														<input type="text" id = "firstname" placeholder="Имя" class="form-control">
													</div>
													<div class="form-group">
														<label class="control-label">Фамилия</label>
														<input type="text" id = "lastname" placeholder="Фамилия" class="form-control">
													</div>
													<div class="form-group">
														<label class="control-label">Пол</label>
														<select id = "pol" class="form-control">
															<option >Мужской</option>
															<option>Женский</option>
														</select>
													</div>
													<div class="form-group">
														<label class="control-label">Возраст</label>
														<select id = "age" class="form-control">
															<option>10</option>
															<option>11</option>
															<option>12</option>
															<option>13</option>
															<option>14</option>
															<option>15</option>
															<option>16</option>
															<option>17</option>
															<option>18</option>
															<option>19</option>
															<option>20</option>
															<option>21</option>
															<option>22</option>
															<option>23</option>
															<option>24</option>
															<option>25</option>
														</select>
													</div>
													<div class="margiv-top-10">
														<input type = "submit" onclick = "saveData();return false;" class="btn green-haze" value = "Сохранить">
													</div>
												</form>
											</div>
											<!-- END PERSONAL INFO TAB -->
											<!-- CHANGE AVATAR TAB -->
											<div class="tab-pane" id="tab_1_2">
												<p>
													 Загрузка аватара
												</p>
												<form action="/personal/load_avatar" enctype="multipart/form-data" method = "POST" role="form">
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															</div>
															<div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Select image </span>
																<span class="fileinput-exists">
																Change </span>
																<input type="file" name="my_avatar">
																</span>
																<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">
																Remove </a>
															</div>
														</div>
														<div class="clearfix margin-top-10">
															<span class="label label-danger">NOTE! </span>
															<span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
														</div>
													</div>
													<div class="margin-top-10">
														<input type = "submit" value = "Сохранить" class="btn green-haze">
													</div>
												</form>
											</div>
											<!-- END CHANGE AVATAR TAB -->
											<!-- CHANGE PASSWORD TAB -->
											<div class="tab-pane" id="tab_1_3">
												<div>
													<?if(isset($_GET['error'])):?>
													<div class="error">
														 <?if($_GET['error'] == 1):?>
															<div class="alert alert-danger">
																<p>Вы неправильно ввели текущий пароль</p>
															</div>
														<?endif;?>	
													</div>
													<?endif;?>
												</div>
												<div id = "error_password" class="alert alert-danger" style = "display:none;">
													<p>Вы неправильно ввели текущий пароль</p>
												</div>
												<div id = "success_password" class="alert alert-success" style = "display:none;">
													<p>Вы успешно изменили пароль</p>
												</div>
												<form id = "change_password">
													<div class="form-group">
														<label class="control-label">Current Password</label>
														<input type="password" class="form-control" id = "cur_password"  name = "cur_password">
														<input type = "hidden" id = "my_login" value = "<?=$user->login?>">
													</div>
													<div class="form-group">
														<label class="control-label">New Password</label>
														<input type="password" class="form-control" id = "new_password" name = "new_password">
													</div>
													<div class="form-group">
														<label class="control-label">Re-type New Password</label>
														<input type="password" class="form-control">
													</div>
													<div class="margin-top-10">
														<a href = "#"  onclick = "change_password();return false;" class="btn green-haze">Сохранить</a>
													</div>
												</form>
											</div>
											<!-- END CHANGE PASSWORD TAB -->
											<!-- PRIVACY SETTINGS TAB -->
											<div class="tab-pane" id="tab_1_4">
												<form action="#">
													<table class="table table-light table-hover">
													<thead>
														<tr>
															<th>Аукцион</th>
															<th>Статус</th>
														</tr>
													</thead>
													<tbody>
														<?foreach ($auctions as $auction):?>
					
																<tr>
																	<td>
																		<a href="/aukcion/id/<?= $auction->id ?>" style="text-decoration:none" onclick="showAuction(<?= $auction->id ?>);return false;">
																			<?=$auction->name?>
																		</a>
																	</td>
																	<td>
																		<a href="/aukcion/id/<?= $auction->id ?>" style="text-decoration:none" onclick="showAuction(<?= $auction->id ?>);return false;">
																			<?if ($auction->is_ended){?>
																				Завершен
																			<?}else if (strtotime($auction->start_time) - time() <= 0){?>
																				Идет
																			<?}else{?>
																				Скоро начало
																			<?}?>
																		</a>
																	</td>
																</tr>
															</a>
														<?endforeach;?>
													</tbody></table>
													<!--end profile-settings-->
												</form>
											</div>
											<div class="tab-pane" id="tab_1_5">
												<div id = "success_users_address" class="alert alert-success" style = "display:none;">
													<p>Вы успешно сохранили информацию</p>
												</div>
												<form id = "users_address">
													<div class="form-group">
														<label class="control-label">Получатель(ФИО)</label>
														<input type="text" class="form-control" id = "fio"  name = "fio">
														<input type = "hidden">
													</div>
													<div class="form-group">
														<label class="control-label">Почтовый индекс</label>
														<input type="text" class="form-control" maxlength="10" id = "email_index" name = "email_index">
													</div>
													<div class="form-group">
														<label class="control-label">Страна</label>
														<select id = "country" class="form-control">
															<option>Россия</option>
															<option>Германия</option>
															<option>Великобритания</option>
															<option>США</option>
															<option>Япония</option>
														</select>
													</div>
													<div class="form-group">
														<label class="control-label">Город</label>
														<input type="text" class="form-control" id = "city" name = "city">
													</div>
													<div class="form-group">
														<label class="control-label">Адрес</label>
														<input type="text" class="form-control" id = "address" name = "address">
													</div>
													<div class="form-group">
														<label class="control-label">Телефон для связи</label>
														<input type="text" class="form-control" id = "my_phone" name = "my_phone">
													</div>
													<div class="form-group">
														<label class="control-label">Примечание</label>
														<textarea class="form-control" id = "note" rows="3"></textarea>
													</div>
													<div class="margin-top-10">
														<a href = "#"  onclick = "saveUsersAddress();return false;" class="btn green-haze">Сохранить</a>
													</div>
												</form>
											</div>
											<!-- END PRIVACY SETTINGS TAB -->
											<div class="tab-pane" id="tab_1_6">
												<div class="products">
													<div class="container">
														<? foreach ($my_auctions as $auction) {
															if (isset($user_aucts)) 
																foreach ($user_aucts as $user_auct) {
															 		if ($auction->id == $user_auct->auction_id && !$auction->is_ended) {
															 			$contains = true;
															 			break;
															 		}
															 	}
															if (isset($autorates))
																foreach ($autorates as $autorate) {
																 	if ($auction->id == $autorate->auction_id) {
																 		$seconds_value = $autorate->second_value;
																 		$rates_count = $autorate->rates_count;
																 		break;
																 	}
																} 
														?>
															<div class="products-block">
																<figure class="products-block-figure">

																	<figurecaption class="products-block-figurecaption">
																		<?= $auction->name ?>
																		<div class="products-block-figurecaption-img"></div>
																	</figurecaption>
																	<a href="/aukcion/id/<?= $auction->id ?>" style="text-decoration:none" onclick="showAuction(<?= $auction->id ?>);return false;">
																		<img src="/images/aukc_image/<?= $auction->image ?>" class="products-img" alt="product-1">
																	</a>
																</figure>
																<div id="price_<?= $auction->id ?>" class="products-price">
																	<?= $auction->price ?> <span>руб.</span>
																</div>
																<div class="products-time-remaining">
																	<? if (!$auction->is_ended) { ?>
																		<div id="remaining_<?=$auction->id?>" class="products-time-remaining-img"></div>
																		<div id="timer_<?= $auction->id ?>">
																			<? if (strtotime($auction->start_time) - time() <= 0) { ?>
																				<?if (isset($seconds_value)){?>
																					<script>
																						startTimer(<?= $auction->id ?>, <?= $auction->has_bot?>, <?= $auction->full_price ?>, <?=$seconds_value?>, <?=$rates_count?>);
																					</script>
																				<?}else{?>
																					<script>
																						startTimer(<?= $auction->id ?>, <?= $auction->has_bot?>, <?= $auction->full_price ?>);
																					</script>
																				<?}?>
																			<? } else { ?>
																				<?if (isset($seconds_value)) {?>
																					<script>
												                        				refreshTimer(<?= $auction->id ?>, '<?= $auction->start_time ?>', <?= $auction->has_bot ?>, <?= $auction->full_price ?>, <?=$seconds_value?>, <?=$rates_count?>);
												                      				</script>
												                      			<?}else{?>
												                      				<script>
											                        					refreshTimer(<?= $auction->id ?>, '<?= $auction->start_time ?>', <?= $auction->has_bot ?>, <?= $auction->full_price ?>);
											                      					</script>
											                      				<?}?>
											                      			<? } ?>
											                      		</div>
											                      	<? } else { ?>
											                      		<div id="timer_<?= $auction->id ?>" style="text-align: center"><?= date('d.m.Y G:i:s', strtotime($auction->end_date)) ?></div>
											                      	<? } ?>
																</div>
																<div id="login_<?= $auction->id ?>"class="products-nickname">
																	<? if (strtotime($auction->start_time) - time() <= 0) { ?>
																		<?= $auction->login ?>
																	<? } else { ?>
																		СКОРО НАЧАЛО
																	<? } ?>
																</div>
																<? if (!$auction->is_ended) {
																	if (strtotime($auction->start_time) - time() > 0) {
																		if (isset($contains) && $contains) { ?>
																			<div id="rate_<?= $auction->id ?>" class="products-bet not-started" style="background-color: #607D8B">
											                        			Заявка подана
											                      			</div>
											                      		<? } else { ?>
																			 <a href="#" id="rate_<?= $auction->id ?>" onclick="apply(<?= $auction->id ?>);return false;" class="products-bet not-started"
												                                  <? if(!$this->session->userdata('ay_login')) { ?> onmouseover="onMouseOver(<?= $auction->id ?>)" onmouseout="onMouseOut(<?= $auction->id ?>, 'ПОДАТЬ ЗАЯВКУ')" <? } ?>>
												                      			ПОДАТЬ ЗАЯВКУ
												                    		</a>
												                    	<? } ?>
											                    	<? } else { ?>
											                    		<?if (isset($seconds_value)) {?>
												                    		<a href="#" id="rate_<?= $auction->id ?>" onclick="return rate(<?= $auction->id ?>, <?= $seconds_value?>, <?=$rates_count?>);" class="products-bet"
												                                  <? if (!$this->session->userdata('ay_login')) { ?> onmouseover="onMouseOver(<?= $auction->id ?>)" onmouseout="onMouseOut(<?= $auction->id ?>, 'СДЕЛАТЬ СТАВКУ')" <? } ?>>
												                    			СДЕЛАТЬ СТАВКУ
												                  			</a>
												                  		<?} else {?>
												                  			<a href="#" id="rate_<?= $auction->id ?>" onclick="return rate(<?= $auction->id ?>);" class="products-bet"
												                                  <? if (!$this->session->userdata('ay_login')) { ?> onmouseover="onMouseOver(<?= $auction->id ?>)" onmouseout="onMouseOut(<?= $auction->id ?>, 'СДЕЛАТЬ СТАВКУ')" <? } ?>>
												                    			СДЕЛАТЬ СТАВКУ
												                  			</a>
												                  		<?}?>
											                  		<? } ?>
											                  	<? } else { ?>
																	<a class="products-bet end">
											                			АУКЦИОН ЗАВЕРШЕН
											              			</a>
											              		<? } ?>
															</div>
														<?}?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
<?endforeach;?>