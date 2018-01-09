(function(){
    var polo = {
        sell_orders:{
            exibir_total: exibir_total_sell_orders
        }
    }
    window.polo_control = polo;

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
})();