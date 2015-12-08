<div class="products">
	
	<div class="container white">
		<div class="container-caption">
			<p class="caption-text">ДОСТУПНЫЕ ПАКЕТЫ СТАВОК</p>
		</div>
		<div class="container-description">
			<p class="description">Покупка пакетов ставок осуществляется через сервис приема платежей "Робокасса" любым удобным для вас способом. 
			После нажатия кнопки "Купить ставки" вы будете перенаправлены на страницу платежной системы, где необходимо
			будет осуществить оплату. Как только от сервиса "Робокасса" будет получено подтверждение покупки, мы зачислим
			приобретенное количество ставок на ваш счет в системе. Срок действия ставок - 1 год со дня покупки. <br><br>

			<span class="attention">Увеличивайте ваши шансы на победу в аукционах.</span> <br><br>

			Покупайте большие пакеты ставок по более выгодной цене - чем больше пакет, тем ниже цена одной ставки!</p>

		</div>
		<div class="rates-caption">
			Выберите пакет ставок:
		</div>
		<div class="rates">
			<? foreach ($rates as $rate) { ?>
			<div class="product-wrapper" <? if ($rate->id % 4 != 1) { ?> style="margin-left: 48px;" <? } ?>>
				<div class="rates-block">
					<img src="/images/aukc_image/<?= $rate->img ?>" class="products-img rate-img" alt="product-1" />
				</div>
				<input id="radio_<?=$rate->id?>" class="rate-radio" type="radio" name="radio1" value="<?= $rate->count ?>;<?= $rate->price ?>">
					<label class="rate-label" for="radio_<?=$rate->id?>"><?= $rate->count ?> ставок за <?= $rate->price ?> руб. </label> 
				</input>
			</div>
			<? } ?>
		</div> 
		<div class="payment-block">
			<p class="payment-caption">Выберите способ оплаты:</p>
			<div class="payment">
				<a href="#" onclick="highlight(1);return false;"><img src="/images/payment/card.png" id="pay_1" width="100" height="40" /></a>
				<a href="#" onclick="highlight(2);return false;"><img src="/images/payment/qiwi.png" id="pay_2" width="80" height="40" style="margin-left: 10px" /></a>
				<a href="#" onclick="highlight(3);return false;"><img src="/images/payment/yandex.png" id="pay_3" width="80" height="40" style="margin-left: 10px"/></a>
				<a href="#" onclick="highlight(4);return false;"><img src="/images/payment/mts.png" id="pay_4" width="80" height="40" style="margin-left: 10px"/></a>
				<a href="#" onclick="highlight(5);return false;"><img src="/images/payment/megafon.png" id="pay_5" width="150" height="40" style="margin-left: 10px"/></a>
				<a href="#" onclick="highlight(6);return false;"><img src="/images/payment/beeline.png" id="pay_6" width="80" height="40" style="margin-left: 10px"/></a>
				<a href="#" onclick="highlight(7);return false;"><img src="/images/payment/tele2.png" id="pay_7" width="80" height="40" style="margin-left: 10px"/></a>
			</div>
			<div class="payment-btn-block">
				<a href="#" class="products-bet payment-btn" id="btn_buy" <? if(!$this->session->userdata('ay_login')) { ?> onmouseover="mouseOver();" onmouseout="mouseOut('КУПИТЬ СТАВКИ');" <? } ?>>КУПИТЬ СТАВКИ</a>
			</div>
		</div>
	</div>
</div>