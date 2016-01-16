<style>
		body{
			background: url(/images/gamezone.jpg) no-repeat;
			-moz-background-size: 100%; /* Firefox 3.6+ */
			-webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
			-o-background-size: 100%; /* Opera 9.6+ */
			background-size: 100%; /* Современные браузеры */
		}
		.button{
			display: block;
			margin-left: auto;
			margin-right: auto;
			border-radius: 14px;
			box-shadow: 0 2px 2px #efda2b;
			background-color: #efda2b;
			font-family: "RobotoSlabRegular", Arial, "Helvetica CY", "Nimbus Sans L", sans-serif;
			font-size: 12px;
			color: #FFFFFF;
			text-align: center;
			text-decoration: none;
			float:right;
			margin-right:30px;
			width:150px;
			height:30px;
		  }
		</style>
<div class="products">
	<div class="container">
		<div style = "margin-top:50px;height:50px;">
			<font style = "color:white;">Сортировать по:</font>
			<a style = "margin-left:20px;text-decoration:none;color:white;" href = "#" onclick="sortByTime('gamezone');">Времени</a>
			<a style = "margin-left:10px;text-decoration:none;color:white;" href = "#" onclick="sortByCategory('gamezone');">Категории</a>
			<a style = "margin-left:10px;text-decoration:none;color:white;" href = "#" onclick="sortByGenre('gamezone');">Жанру</a>
			<a style = "" class = "button" href = "/rate"><font style = "line-height:30px;">Купить  ставки</font></a>
		</div>
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

						<img src="/images/aukc_image/<?= $auction->image ?>" class="products-img" alt="product-1">

					</figure>

					<div id="price_<?= $auction->id ?>" class="products-price">
						<?= $auction->price ?> <span>руб.</span>
					</div>

					<div class="products-time-remaining">
						<? if (!$auction->is_ended) { ?>
							<div class="products-time-remaining-img"></div>
							<div id="timer_<?= $auction->id ?>">
								<? if (strtotime($auction->start_time) - time() <= 0) { ?>
									<script>
										startTimer(<?= $auction->id ?>);
									</script>
								<? } else { ?>
									<script>
                        				refreshTimer(<?= $auction->id ?>, '<?= $auction->start_time ?>');
                      				</script>
                      			<? } ?>
                      		</div>
                      	<? } else { ?>
                      		<p style="text-align: center"><?= date('d.m.Y G:i:s', strtotime($auction->end_date)) ?></p>
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
						<div class="products-bet end">
                			АУКЦИОН ЗАВЕРШЕН
              			</div>
              		<? } ?>
				</div>
				<?}?>

	</div>
</div>