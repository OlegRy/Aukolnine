<div class="products">
			<div class="container">
				<? if ($aukcion == 'Аукционы') { ?>
					<div style = "margin-top:50px;height:50px;">
						<font style = "color:black;">Сортировать по:</font>
						<a style = "margin-left:20px;text-decoration:none;color:black;" href = "#" onclick="sortByTime('aukcion');">Времени</a>
						<a style = "margin-left:10px;text-decoration:none;color:black;" href = "#" onclick="sortByCategory('aukcion');">Категории</a>
						<a style = "" class = "button" href = "/rate"><font style = "line-height:30px;">Купить  ставки</font></a>
					</div>
				<? } ?>
				<? foreach ($auct as $auction) {
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