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

    var _writeMyOpenOrdersTable = window.writeMyOpenOrdersTable;

    var myOrders = {};
    window.writeMyOpenOrdersTable = function(d){
        var pending = Object.keys( myOrders );
        d.limit.forEach(function(e){
            var index = pending.indexOf( e.orderID );
            if(index != -1) pending.splice(index, 1);
            if( !myOrders[e.orderID] ) myOrders[ e.orderID ] = e;
        });
        if(pending.length){
            notifyMe('Ordem executada');
            pending.forEach(function(e){
                delete myOrders[e];
            })
        }
        console.log(d);
        _writeMyOpenOrdersTable(d);
    }

    function notifyMe(msg) {
        // Let's check if the browser supports notifications
        if (!("Notification" in window)) {
          alert("This browser does not support desktop notification");
        }
      
        // Let's check whether notification permissions have already been granted
        else if (Notification.permission === "granted") {
          // If it's okay let's create a notification
          var notification = new Notification(msg);
        }
      
        // Otherwise, we need to ask the user for permission
        else if (Notification.permission !== 'denied') {
          Notification.requestPermission(function (permission) {
            // If the user accepts, let's create a notification
            if (permission === "granted") {
              var notification = new Notification(msg);
            }
          });
        }}
})();