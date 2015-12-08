<style>
		.button{
			display: block;
			margin-left: auto;
			margin-right: auto;
			width: 85px;
			min-height: 28px;
			border-radius: 14px;
			box-shadow: 0 2px 2px rgba(44,165,176,1);
			background-color: #32c5d2;
			font-family: "RobotoSlabRegular", Arial, "Helvetica CY", "Nimbus Sans L", sans-serif;
			font-size: 12px;
			line-height: 28px;
			color: #FFFFFF;
			text-align: center;
			text-decoration: none; 
		  }
</style>
<div class="products">
	<div class="container" style = "width:900px;height:430px;margin-top:70px;background:#fafafa;border-radius:20px;">
		<div style = "float:left;width:450px;height:300px;" class = "left_feedback">
			<div style = "background:#DCDCDC;margin-top:30px;color:white;line-height:50px;width:250px;border-radius: 0px 30px 30px 0px;"><font style = "margin-left:40px;">Обратная связь</font></div>
			<div style = "margin-left:40px;">
				<p style = "font-size:12px;margin-top:20px;">Для связи с нами заполните форму ниже</p>
				<p style = "font-size:12px;">Мы с радостью ответим вам в ближайшее время</p>
				<p style = "font-size:12px;margin-top:20px;">Текст сообщения</p>
				<textarea style = "width:285px;height:80px;resize:none;border-radius:8px;display" id="feedback_text"></textarea>
				<div style = "margin-top:20px;">
					<img src="/images/captcha/<?= $captcha[0]->img ?>" id="captcha" width="140" height="50" style="display:inline;float:left;" />
					<div class="answer_block">
						<a href="#" onclick="reloadCaptcha();return false;"><img src="/images/captcha/reload.png" style="margin-left:10px;float:left;margin-right:15px;margin-top:3px" width="13" height="13" /></a>
						<label for="answer" class="label-answer">Введите символы с картинки</label>
						<input type="text" id="answer" class="input-answer">
						
					</div>
				</div>
				
				<div style="margin-top:50px;margin-left:180px;"><a href="#" class="products-bet btn-feedback" onclick="handleCaptcha('<?= $captcha[0]->answer ?>');return false;"/>ОТПРАВИТЬ</a></div>
			</div>
		</div>
		<div style = "float:right;width:450px;height:300px;" class = "right_feedback">
			<div style = "background:#DCDCDC;width:300px;margin-top:30px;margin-right:300px;color:white;line-height:50px;width:250px;border-radius: 0px 30px 30px 0px;"><font style = "margin-left:30px;">Контактная информация</font></div>
			<img src="/images/feedback_con.png"/>
		</div>
	</div>
</div>
