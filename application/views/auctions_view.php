<div class="products">
			<div class="container">
				<? foreach ($auct as $auction) {
					if (isset($user_aucts)) 
						foreach ($user_aucts as $user_auct) {
					 		if ($auction->id == $user_auct->auction_id) {
					 			$contains = true;
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
											<script>
												startTimer(<?= $auction->id ?>, <?= $auction->has_bot?>, <?= $auction->full_price ?>);
											</script>
										<? } else { ?>
											<script>
		                        				refreshTimer(<?= $auction->id ?>, '<?= $auction->start_time ?>', <?= $auction->has_bot ?>, <?= $auction->full_price ?>);
		                      				</script>
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
		                    		<a href="#" id="rate_<?= $auction->id ?>" onclick="rate(<?= $auction->id ?>);return false;" class="products-bet"
		                                  <? if (!$this->session->userdata('ay_login')) { ?> onmouseover="onMouseOver(<?= $auction->id ?>)" onmouseout="onMouseOut(<?= $auction->id ?>, 'СДЕЛАТЬ СТАВКУ')" <? } ?>>
		                    			СДЕЛАТЬ СТАВКУ
		                  			</a>
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