(function(){
    var polo = {
        sell_orders:{
            exibir_total: exibir_total_sell_orders
        },
        coin:{
            gap: coin_gap
        }
    }
    window.polo_control = polo;

    $( document ).ajaxSuccess( trata_requisicoes );

    function exibir_total_sell_orders(){
        $('.sellOrders-clone').remove();
        var clone = $('.sellOrders.mainBox .info').clone();

        clone.css('display', 'block')
             .css('clear', 'both')
             .css('margin-top', '-33px')
             .addClass('sellOrders-clone');

        $('.currency', clone).html( $('.buyOrders .currency').html() );

        $('.sellOrders.mainBox .num').on('DOMSubtreeModified', function(){
            $('.num', clone).html( (parseFloat($('.sellOrders.mainBox .num').html()) * parseFloat($('#hilights .lastPrice .info').html())).toFixed(8) );
        });
    
        clone.appendTo($('.sellOrders.mainBox .info').parent());
    };

    function trata_requisicoes(){
        
    }

    function coin_gap(){
        var ask = orderBookRates["asks"][0];
        var bid = orderBookRates['bids'][0];
        return {
                    diff: ( ask / bid  -1) * 100,
                    size: orderBookCache['asks'][ask].total - orderBookCache['bids'][bid].total,
                    asks: orderBookCache['asks'][ask].total,
                    bids: orderBookCache['bids'][bid].total
                };
    }
})();