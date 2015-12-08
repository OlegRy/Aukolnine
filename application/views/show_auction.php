<? if (isset($user_aucts)) 
      foreach ($user_aucts as $user_auct) {
        if ($auction[0]->id == $user_auct->auction_id) {
          $contains = true;
          break;
        }
      } 
?>
<div class="page-container">
  <div class="page-content" style="min-height:349px">
    <div class="container">
      <div class="row margin-top-10">
        <div class="col-md-12 col-sm-12">
          <div class="portlet light ">
            <div class="portlet-body">
              <div class="row list-separated">
                <div class="col-md-6 col-sm-3 col-xs-6">
                  <div class="auction-name"><b><?= $auction[0]->name ?></b></div>
                    <div class="auction-name light">Новый аксессуар от Apple</div>
                      <div style="margin-top: 2em;">
                        <img src="/images/aukc_image/<?= $auction[0]->image ?>" width="233" height="238">
                      </div>
                      <div style="margin-top: 5em;font-size:14px">
                        <div class="info caption" ><b>Информация о товаре</b></div>
                        <div class="info description" style="margin-top: 1em;">
                          <?= $auction[0]->text ?>
                        </div>
                      </div>
                </div>
                <div class="col-md-6 col-sm-3 col-xs-6">
                  <div class="font-hg theme-font">
                    <a class="btn-buy" id="btn_buy" <? if(!$this->session->userdata('ay_login')) { ?> onmouseover="mouseOver();" onmouseout="mouseOut('КУПИТЬ СТАВКИ');" <? } else { ?> href="/rate" <?}?>>
                      КУПИТЬ СТАВКИ
                    </a>
                  </div>
                <div class="font-hg theme-font" style="margin-top: 1em;">
                  <div style="
                    width: 311px;
                    height: 382px;
                    border: 1px solid #BBBBBB;
                    border-radius: 8px;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;">
                      <div style="
                        width: 143px;
                        height: 49px;
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                        margin-top: 1em;
                        border: 1px solid #BBBBBB;
                        border-radius: 8px;
                        background-color: rgb(250, 250, 250);">
                        <div>
                          <p style="
                            font-size: 14px;
                            text-align: center;
                            color: #777777;">
                            Текущая цена: <br>
                            <b style="
                              font-size: 16px;
                              color: rgb(50, 197, 230);" id="price_<?= $auction[0]->id?>">
                              <?= $auction[0]->price ?> руб.
                            </b>
                          </p>
                        </div>
                      </div>
                      <?if ($auction[0]->is_ended) {?>
                        <div id="rate" style="
                          width: 100%;
                          height: 62px;
                          margin-top: 1em;
                          background-color: rgb(232, 232, 232);
                          text-decoration: none;"><div>
                          <p style="
                            font-size: 18px;
                            color: #FFFFFF;
                            text-align: center;
                            padding-top: 6px;">
                            <a style="pointer-events: none; cursor: default;">АУКЦИОН ЗАВЕРШЕН</a> <br>
                            <span id="timer_<?= $auction[0]->id ?>" style="color: rgb(172, 172, 172);"><?= date('d.m.Y G:i:s', strtotime($auction[0]->end_date)) ?></span>                          
                          </p>
                        </div>
                      </div>
                      <div style="
                        width: 235px;
                        height: 44px;
                        margin-top: 1em;
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                        border: 1px solid #BBBBBB;
                        border-radius: 8px;
                        background-color: rgb(250, 250, 250);">
                        <div>
                          <p class="winner">
                              Победитель: 
                              <span id="login_<?=$auction[0]->id?>" style="color: rgb(89, 204, 216);"><?= $auction[0]->login ?></span>
                          </p>
                        </div>
                      </div>
                      <? } else { ?>
                        <div id="rate" style="
                          width: 100%;
                          height: 62px;
                          margin-top: 1em;">
                          <div>
                          <p style="
                            font-size: 18px;
                            color: #FFFFFF;
                            text-align: center;
                            padding-top: 6px;">
                            <? if (strtotime($auction[0]->start_time) - time() <= 0) {?>
                              <a id="rate_<?= $auction[0]->id ?>" href="#" onclick="rate(<?= $auction[0]->id ?>);return false;" class="products-bet">СДЕЛАТЬ СТАВКУ <br></a>
                              <span style="color: rgb(172, 172, 172);" id="timer_<?= $auction[0]->id ?>">
                                <script>
                                  startTimer(<?= $auction[0]->id ?>, <?= $auction[0]->has_bot ?>, <?= $auction[0]->full_price ?>);
                                </script>
                              </span> 
                            <? } else { 
                              if (isset($contains) && $contains) {?>
                                <div id="rate_<?= $auction[0]->id ?>" class="products-bet not-started" style="background-color: #607D8B">
                                  Заявка подана
                                </div>
                              <?} else { ?>
                                <a href="#" id="rate_<?= $auction[0]->id ?>" onclick="apply(<?= $auction[0]->id ?>);return false;" class="products-bet not-started"
                                        <? if(!$this->session->userdata('ay_login')) { ?> onmouseover="onMouseOver(<?= $auction[0]->id ?>)" onmouseout="onMouseOut(<?= $auction[0]->id ?>, 'ПОДАТЬ ЗАЯВКУ')" <? } ?>>
                                  ПОДАТЬ ЗАЯВКУ
                              </a>
                              <?}?>
                              <span style="color: rgb(172, 172, 172);" id="timer_<?= $auction[0]->id ?>">
                                <script>
                                  refreshTimer(<?= $auction[0]->id ?>, '<?= $auction[0]->start_time ?>', <?= $auction[0]->has_bot ?>, <?= $auction[0]->full_price ?>);
                                </script>
                              </span>
                            <?}?>
                          </p>
                        </div>
                      </div>
                      <?}?>
                      <?if (!$auction[0]->is_ended) {?>
                      <div id="login" style="
                        width: 235px;
                        height: 44px;
                        margin-top: 1em;
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                        border: 1px solid #BBBBBB;
                        border-radius: 8px;
                        background-color: rgb(250, 250, 250);">
                        <div>
                          <p class="winner"> 
                              <span style="color: rgb(89, 204, 216);" id="login_<?=$auction[0]->id?>">
                                <?if (strtotime($auction[0]->start_time) - time() <= 0) {?>
                                  <?= $auction[0]->login ?>
                                <?} else {?>
                                  СКОРО НАЧАЛО
                                <? } ?>
                              </span>
                          </p>
                        </div>
                      </div>
                      <?}?>  
                    <div id="rates" style="
                      width: 235px;
                      height: 113px;
                      margin-top: 1em;
                      display: block;
                      margin-left: auto;
                      margin-right: auto;
                      border: 1px solid #BBBBBB;      border-radius: 8px;      background-color: rgb(250, 250, 250);
                      overflow: hidden;">
                      <?if (strtotime($auction[0]->start_time) - time() <= 0) {?>
                      <? foreach ($rates as $rate) { ?>
                        <div style="
                          font-size: 12px;
                          color: rgb(174, 174, 174);
                          margin-left: 5px;
                          margin-right: 5px;
                          overflow: auto;">
                          <div style="display: inline-block;"><?= date('G:i:s', strtotime($rate->time))?></div>
                          <div style="
                            display: inline-block;
                            margin-left: 17px;">
                            <?= $rate->login ?>
                          </div>
                          <div style="
                            display: inline-block;
                            margin-left: 23px;">
                            <?= $rate->price ?> руб.
                          </div>
                        </div>
                      <?}?>
                  </div>
                  <?}?>
                </div>
              </div>
              <div style="
                display: block;
                margin-left: auto;
                margin-top: 42px;
                width: 421px;">
                <div class="condition">
                  <b>Условия аукциона</b>
                </div>
                <div style="
                  margin-top: 1em;
                  margin-left: 36px;">
                    <div>
                        <div style="display: inline-block;">
                          <img src="" width="26" height="26">
                        </div>
                        <div style="
                          display: inline-block;
                          width: 335px;
                          color: #777777;
                          font-size: 14px;
                          word-wrap: break-word;
                          margin-left: 18px;">
                          <p>
                            psjfpoisjgiosdhgiosdnoigdjoigdjsiogvjdiogjdiogjdiogjiodjgiodjgiodjgiodjgiodjiogjdiogjdiogvjdiogjiodjgiodjgiodjgiodjio
                          </p>
                        </div>
                      </div>
                    </div>
                    <div style="margin-left: 36px;">
                      <div>
                          <div style="display: inline-block;">
                            <img src="" width="26" height="26">
                          </div>
                          <div style="
                            display: inline-block;
                            width: 335px;
                            color: #777777;
                            font-size: 14px;
                            word-wrap: break-word;
                            margin-left: 18px;">
                            <p>
                              psjfpoisjgiosdhgiosdnoigdjoigdjsiogvjdiogjdiogjdiogjiodjgiodjgiodjgiodjgiodjiogjdiogjdiogvjdiogjiodjgiodjgiodjgiodjio
                            </p>
                          </div>
                        </div>
                    </div>
                    <div style="margin-left: 36px;">
                      <div>
                          <div style="display: inline-block;">
                            <img src="" width="26" height="26">
                          </div>
                          <div style="
                            display: inline-block;
                            width: 335px;
                            color: #777777;
                            font-size: 14px;
                            word-wrap: break-word;
                            margin-left: 18px;">
                            <p>
                              psjfpoisjgiosdhgiosdnoigdjoigdjsiogvjdiogjdiogjdiogjiodjgiodjgiodjgiodjgiodjiogjdiogjdiogvjdiogjiodjgiodjgiodjgiodjio
                            </p>
                          </div>
                        </div>
                    </div>
                    <div style="margin-left: 36px;">
                      <div>
                          <div style="display: inline-block;">
                            <img src="" width="26" height="26">
                          </div>
                          <div style="
                            display: inline-block;
                            width: 335px;
                            color: #777777;
                            font-size: 14px;
                            word-wrap: break-word;
                            margin-left: 18px;">
                            <p>
                              psjfpoisjgiosdhgiosdnoigdjoigdjsiogvjdiogjdiogjdiogjiodjgiodjgiodjgiodjgiodjiogjdiogjdiogvjdiogjiodjgiodjgiodjgiodjio
                            </p>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>      
            </div>
          </div>
        </div>
      </div>        
    </div>      
  </div>
</div>