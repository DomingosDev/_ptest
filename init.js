(function(){
    var myOrders = {};
    var _writeMyOpenOrdersTable = window.writeMyOpenOrdersTable;
    var _writeTradeHistoryTable = window.writeTradeHistoryTable;
    var _processMarketEvent = window.processMarketEvent;

    window.writeMyOpenOrdersTable = writeMyOpenOrdersTableModified;
    window.writeTradeHistoryTable = writeTradeHistoryTableModified;
    window.processMarketEvent = processMarketEventModified;

    function processMarketEventModified(args){
       // console.log(args);
        _processMarketEvent(args);
    }

    var polo = {
        sell_orders:{
            exibir_total: exibir_total_sell_orders
        },
        coin:{
            gap: coin_gap,
            notify: notifyMe
        },
        vars: {
            myOrders: myOrders
        },
        selfUpdate: selfUpdate,
        getTime: getTime
    }
    window.polo_control = polo;

    $( document ).ajaxSuccess( trata_requisicoes );

    function selfUpdate(){
        window.writeMyOpenOrdersTable = _writeMyOpenOrdersTable;
        window.writeTradeHistoryTable = _writeTradeHistoryTable;
        window.processMarketEvent = _processMarketEvent;
        delete polo;
        delete window.polo_control;
        $.get('https://raw.githubusercontent.com/DomingosDev/_ptest/master/init.js?v=' + new Date().getTime(),eval );
    }

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

    function getTime(date){
        var d = date.getUTCDate() -1;
        var h = date.getUTCHours();
        var m = date.getUTCMinutes();
        var s = date.getUTCSeconds();

        var text = (d)? d+"d. " : ""; 
        text+=  (h)? h+"h. " : "";
        text+=  (m)? m+"m. " : "";
        text+=  (s)? s+"s. " : "";

        return text;

    }

    

    function writeMyOpenOrdersTableModified(d){
        var pending = Object.keys( myOrders );
        d.limit.forEach(function(e){
            var index = pending.indexOf( e.orderID );
            if(index != -1) pending.splice(index, 1);
            if( !myOrders[e.orderID] ) myOrders[ e.orderID ] = e;
        });
        if(pending.length){
            
            pending.forEach(function(e){
               
                var order = myOrders[e];
                var DIFF = new Date(new Date() - new Date(e.date));
                var text = (order.type == "buy")? "&#10548;?" :  "&#10549;";
                text += " " + order.amount + " in ";
                text += getTime(DIFF);
                notifyMe(text);
                delete myOrders[e];
            })
        }
        _writeMyOpenOrdersTable(d);
    }
    function writeTradeHistoryTableModified(d){

        polo.vars.tradehistory = d;

        _writeTradeHistoryTable(d);

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