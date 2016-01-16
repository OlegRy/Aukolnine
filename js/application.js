function rate(auct_id){
    $.ajax({
        type: 'POST',
        url: '/auth/rate',
        data: {'id': auct_id},
        success: function(data) {
            var data = JSON.parse(data);
            if (data.message) {
                if (data.message == 'На Вашем счете нет ставок!' || data.message == 'У Вас нет билета для участия в этом аукционе!') {
                    alert(data.message);                    
                } else {
                    window.location = '/#openModal';
                }
            } else {
                var new_price = data.auction.price;
                var new_login = data.auction.login;
                var hasBot = data.auction.has_bot;
                var fullPrice = data.auction.full_price;
                var divRates = $('#rates');
                if (!divRates) new_price += '<span> руб.</span>';
                $('#price_' + auct_id).html(new_price);
                $('#login_' + auct_id).html(new_login);
                if (divRates) {
                    var newDiv = '<div style="font-size: 12px;color: rgb(174, 174, 174);margin-left: 5px;margin-right: 5px;overflow: auto;"><div style="display: inline-block;">' + data.date + '</div><div style="display: inline-block;margin-left: 17px;">' + new_login + '</div><div style="display: inline-block;margin-left: 23px;">' + new_price + ' руб.</div></div>'
                    divRates.prepend(newDiv);
                }
                resetTimer(auct_id, hasBot, fullPrice);

            }
        }
    });
}

function apply(auct_id) {
    $.ajax({
       type: 'POST',
        url: '/auth/apply',
        data: {'auction_id': auct_id},
        success: function(data) {
            data = jQuery.parseJSON(data);
            if (data.message == 'Вы успешно подали заявку на участие!') {
                alert(data.message);
                $('#rate_' + auct_id).html('Заявка подана');
                $('#rate_' + auct_id).css("background-color", '#607D8B')
                $('#rate_' + auct_id).removeAttr('onclick');   
            } else if (data.message == 'У Вас нет билета для участия в этом аукционе!') {
                alert(data.message);
            } else {
                window.location = '/#openModal';
            }
        }
    });
}

function refreshTimer(auct_id, startDate, hasBot, fullPrice) {
    if (startDate) {
        $('#timer_' + auct_id).countdown({ until: new Date(startDate), format: 'HMS', compact: true, onTick: function(periods) {
            if (periods[4] == 0 && periods[5] == 0 && periods[6] == 0) {
                var login = $('#login_' + auct_id);
                var timer = $('#timer_' + auct_id);
                var button = $('#rate_' + auct_id);
                login.html('');
                timer.countdown('destroy');
                timer.html('<script>startTimer(' + auct_id + ', ' + hasBot + ', ' + fullPrice + ');</script>');
                console.log(my_session);
                if (!my_session) {

                    button.attr('onmouseout', 'onMouseOut(' + auct_id + ', \'СДЕЛАТЬ СТАВКУ\');');
                    button.attr('onmouseover', 'onMouseOver(' + auct_id + ');');
                }
                button.attr('class', 'products-bet');
                button.attr('style', 'cursor: pointer;');
                button.attr('onclick', 'rate(' + auct_id + ');');
                button.html('СДЕЛАТЬ СТАВКУ');
            }
        }});
    }
}

function additionFor(unit) {
    var unitAddition;
    if (unit < 10) {
        unitAddition = '0';
    } else {
        unitAddition = '';
    }
    return unitAddition;
}

function onMouseOver(auct_id) {
    $('#rate_' + auct_id).html("Войти");
}

function onMouseOut(auct_id, body) {
    $('#rate_' + auct_id).html(body);
}

function showAuction(id) {
    $.ajax({
        type: 'GET',
        url: '/aukcion/id/' + id,
        success: function(data) {
            window.location = '/aukcion/id/' + id;
        }
    });
}

function resetTimer(id, hasBot, fullPrice) {
    $('#timer_' + id).countdown('destroy');
    $.ajax({
        type: 'POST',
        url: '/aukcion/updateTimer',
        data: { 'id' : id, 'timer' : 15 },
        success: function(data) {
            startTimer(id, hasBot, fullPrice);        
        }
    });
    
} 

function startTimer(id, hasBot, fullPrice) {
    $.ajax({
        type: 'GET',
        url: '/aukcion/timer',
        data: { 'id' : id },
        success: function(data) {
            data = parseInt(data);
            $('#timer_' + id).countdown({ until: +data, format: 'MS', compact: true, onTick: function(periods) {
                if (periods[6] > 1) {
                    $.ajax({
                        type: 'POST',
                        url: '/aukcion/updateTimer',
                        data: { 'id' : id, 'timer' : periods[6] }
                    });
                } else if (periods[6] == 1) {
                    if (hasBot) {
                        ratesNum(id, function(output) {
                            if (10 * output < fullPrice + 2000) {
                                $.ajax({
                                    type: 'POST',
                                    url: '/auth/rate',
                                    data: {'id': id, 'is_bot': true },
                                    success: function(data) {
                                        resetTimer(id, hasBot, fullPrice);
                                        var data = JSON.parse(data);
                                        var new_price = data.auction.price;
                                        var new_login = data.auction.login;
                                        var divRates = $('#rates');
                                        new_price += '<span> руб.</span>';
                                        $('#price_' + id).html(new_price);
                                        $('#login_' + id).html(new_login);
                                        if (divRates) {
                                            var newDiv = '<div style="font-size: 12px;color: rgb(174, 174, 174);margin-left: 5px;margin-right: 5px;overflow: auto;"><div style="display: inline-block;">' + data.date + '</div><div style="display: inline-block;margin-left: 17px;">' + new_login + '</div><div style="display: inline-block;margin-left: 23px;">' + data.auction.price + ' руб.</div></div>'
                                            divRates.prepend(newDiv);
                                        }
                                        
                                    }
                                });    
                            } else {
                                setEndOfAuction(id);
                            }
                        });
                    }
                }
            }});
        }
    });
} 

function setEndOfAuction(id) {
    $.ajax({
        type: 'POST',
        url: '/aukcion/update',
        data: { 'is_ended': 1, 'id': id },
        success: function(data) {
            console.log(data);
            if (data != 0) {
                data = JSON.parse(data);
                var button = $('#rate_' + id);
                var timer = $('#timer_' + id);
                var remainingImg = $('#remaining_' + id);
                var pWinner = $('.winner');
                var spanWinner = $('#login_' + id);
                var divRate = $('#rate');
                button.removeAttr('href');
                button.removeAttr('onclick');
                button.removeAttr('onmouseover');
                button.removeAttr('onmouseout');
                button.attr('class', 'products-bet end');
                button.html('АУКЦИОН ЗАВЕРШЕН');
                timer.attr('style', 'text-align: center; color: rgb(172, 172, 172);');
                timer.html(data.date);
                if (remainingImg) remainingImg.remove();
                if (spanWinner) {
                    var styleAttr = 'width: 100%; height: 62px; margin-top: 1em; background-color: rgb(232, 232, 232); text-decoration: none;'
                    divRate.attr('style', styleAttr);
                    divRate.html('<div><p style="font-size: 18px;color: #FFFFFF;text-align: center;padding-top: 6px;"><a style="pointer-events: none; cursor: default;">АУКЦИОН ЗАВЕРШЕН</a> <br><span id="timer_<?= $auction[0]->id ?>" style="color: rgb(172, 172, 172);">' + data.date + '</span></p></div');
                    var winner = spanWinner.html();
                    pWinner.html('Победитель: <span id="login_"' + id + ' style="color: rgb(89, 204, 216);">' + winner + '</span>');
                }
            }
        }
    });
}

function ratesNum(id, returnCount) {
    var count = 0;
    $.ajax({
        type: 'GET',
        url: '/aukcion/ratesNum',
        data: {'id': id},
        success: function(data) {
            if (data) {
                data = JSON.parse(data);
                returnCount(data['COUNT(*)']);
            }
        }
    });
}
