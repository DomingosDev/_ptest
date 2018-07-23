(function(){
	var channels = {};
	var currencies = getCurrencies();
	var ws;
	refresh()
	
	channels['1002'] = [ updateCoin ]

	var base = 0.5;
	var self = {
		'USDT_BTC' : { value: 0, qtd: 0.00133158,    usdt_value:0, quota: 0, diff: 0 },
		'BTC_DOGE' : { value: 0, qtd: 2815.99751021, usdt_value:0, quota: 0, diff: 0 },
	};

	window.self = self;

	function refresh(){
		setTimeout(function(){
			ws = new WebSocket("wss://api2.poloniex.com");
				ws.onmessage = onMessage;
				ws.onopen = onConnect;
				ws.onerror = refresh;	
		}, 100);
	}

	function onConnect(){
		ws.send(JSON.stringify({ "command": "subscribe", "channel": "1002" }));
	}

	function updateUI(data){
		if( [ parseInt(currencies["USDT_BTC"]), parseInt(currencies["BTC_DOGE"]) ].indexOf(data[0]) == -1 ) return;
	}

	function updateCoin( data ){
		if(data[1] == 1) return;
		var data = data[2];
		
		var index = data[0];
		var name = currencies[index];

		if( !self[name] ) return;
		self[ name ].value = parseFloat( data[1] );

		var prefix = name.split('_')[0];
		var suffix = name.split('_')[1];

		if( prefix != 'USDT' && !self[ 'USDT_' + prefix ].value ) return console.log( 'unable to convert values for '+ name );
		if( prefix != 'USDT' ) self[ name ].value = self[ 'USDT_' + prefix ].value * data[1];


		var ref = Object.keys(self).map(function(el){ self[el].key = el; return self[el]; });
		
		var total = 0;
		self = ref
				.map(function(el){ 
					el.usdt_value = el.qtd * el.value; 
					total += el.usdt_value;
					return el;
				})
				.map(function(el){
					el.quota = el.usdt_value / total;
					el.diff = ( el.quota - ( 1/ref.length ) ) * 100;
					return el;
				})
				.reduce(function(carry, el){
					carry[el.key] = el;
					return carry;
				}, {});

		updateUI(data);
		/*
		
		[
		    <currency pair id>,
		    "<last trade price>",
		    "<lowest ask>",
		    "<highest bid>",
		    "<percent change in last 24 hours>",
		    "<base currency volume in last 24 hours>",
		    "<quote currency volume in last 24 hours>",
		    <is frozen>,
		    "<highest trade price in last 24 hours>",
		    "<lowest trade price in last 24 hours>"
		  ]
		  */
	}

	function onMessage (event) {
		if(event.data == '[1010]') return; // heartbeat
		var data = JSON.parse( event.data);
		if( channels[data[0]] ) channels[data[0]].forEach(function(e){ if( !e || !isFunction(e)) return; e(data); });
	}
	function getCurrencies(){
		return {
			'7':'BTC_BCN'     , '8':'BTC_BELA'    , '10':'BTC_BLK'    , '12':'BTC_BTCD'  , '13':'BTC_BTM'   , '14':'BTC_BTS'    ,
			'15':'BTC_BURST'  , '20':'BTC_CLAM'   , '24':'BTC_DASH'   , '25':'BTC_DGB'   , '27':'BTC_DOGE'  , '28':'BTC_EMC2'   ,
			'31':'BTC_FLDC'   , '32':'BTC_FLO'    , '38':'BTC_GAME'   , '40':'BTC_GRC'   , '43':'BTC_HUC'   , '50':'BTC_LTC'    ,
			'51':'BTC_MAID'   , '58':'BTC_OMNI'   , '61':'BTC_NAV'    , '63':'BTC_NEOS'  , '64':'BTC_NMC'   , '69':'BTC_NXT'    ,
			'73':'BTC_PINK'   , '74':'BTC_POT'    , '75':'BTC_PPC'    , '83':'BTC_RIC'   , '89':'BTC_STR'   , '92':'BTC_SYS'    ,
			'97':'BTC_VIA'    , '98':'BTC_XVC'    , '99':'BTC_VRC'    , '100':'BTC_VTC'  , '104':'BTC_XBC'  , '108':'BTC_XCP'   ,
			'112':'BTC_XEM'   , '114':'BTC_XMR'   , '116':'BTC_XPM'   , '117':'BTC_XRP'  , '121':'USDT_BTC' , '122':'USDT_DASH' ,
			'123':'USDT_LTC'  , '124':'USDT_NXT'  , '125':'USDT_STR'  , '126':'USDT_XMR' , '127':'USDT_XRP' , '129':'XMR_BCN'   ,
			'130':'XMR_BLK'   , '131':'XMR_BTCD'  , '132':'XMR_DASH'  , '137':'XMR_LTC'  , '138':'XMR_MAID' , '140':'XMR_NXT'   ,
			'148':'BTC_ETH'   , '149':'USDT_ETH'  , '150':'BTC_SC'    , '151':'BTC_BCY'  , '153':'BTC_EXP'  , '155':'BTC_FCT'   ,
			'158':'BTC_RADS'  , '160':'BTC_AMP'   , '162':'BTC_DCR'   , '163':'BTC_LSK'  , '166':'ETH_LSK'  , '167':'BTC_LBC'   ,
			'168':'BTC_STEEM' , '169':'ETH_STEEM' , '170':'BTC_SBD'   , '171':'BTC_ETC'  , '172':'ETH_ETC'  , '173':'USDT_ETC'  ,
			'174':'BTC_REP'   , '175':'USDT_REP'  , '176':'ETH_REP'   , '177':'BTC_ARDR' , '178':'BTC_ZEC'  , '179':'ETH_ZEC'   ,
			'180':'USDT_ZEC'  , '181':'XMR_ZEC'   , '182':'BTC_STRAT' , '183':'BTC_NXC'  , '184':'BTC_PASC' , '185':'BTC_GNT'   ,
			'186':'ETH_GNT'   , '187':'BTC_GNO'   , '188':'ETH_GNO'   , '189':'BTC_BCH'  , '190':'ETH_BCH'  , '191':'USDT_BCH'  ,
			'192':'BTC_ZRX'   , '193':'ETH_ZRX'   , '194':'BTC_CVC'   , '195':'ETH_CVC'  , '196':'BTC_OMG'  , '197':'ETH_OMG'   ,
			'198':'BTC_GAS'   , '199':'ETH_GAS'   , '200':'BTC_STORJ' ,

			'BTC_BCN':'7'     , 'BTC_BELA':'8'    , 'BTC_BLK':'10'    , 'BTC_BTCD':'12'  , 'BTC_BTM':'13'   , 'BTC_BTS':'14'    ,
			'BTC_BURST':'15'  , 'BTC_CLAM':'20'   , 'BTC_DASH':'24'   , 'BTC_DGB':'25'   , 'BTC_DOGE':'27'  , 'BTC_EMC2':'28'   ,
			'BTC_FLDC':'31'   , 'BTC_FLO':'32'    , 'BTC_GAME':'38'   , 'BTC_GRC':'40'   , 'BTC_HUC':'43'   , 'BTC_LTC':'50'    ,
			'BTC_MAID':'51'   , 'BTC_OMNI':'58'   , 'BTC_NAV':'61'    , 'BTC_NEOS':'63'  , 'BTC_NMC':'64'   , 'BTC_NXT':'69'    ,
			'BTC_PINK':'73'   , 'BTC_POT':'74'    , 'BTC_PPC':'75'    , 'BTC_RIC':'83'   , 'BTC_STR':'89'   , 'BTC_SYS':'92'    ,
			'BTC_VIA':'97'    , 'BTC_XVC':'98'    , 'BTC_VRC':'99'    , 'BTC_VTC':'100'  , 'BTC_XBC':'104'  , 'BTC_XCP':'108'   ,
			'BTC_XEM':'112'   , 'BTC_XMR':'114'   , 'BTC_XPM':'116'   , 'BTC_XRP':'117'  , 'USDT_BTC':'121' , 'USDT_DASH':'122' ,
			'USDT_LTC':'123'  , 'USDT_NXT':'124'  , 'USDT_STR':'125'  , 'USDT_XMR':'126' , 'USDT_XRP':'127' , 'XMR_BCN':'129'   ,
			'XMR_BLK':'130'   , 'XMR_BTCD':'131'  , 'XMR_DASH':'132'  , 'XMR_LTC':'137'  , 'XMR_MAID':'138' , 'XMR_NXT':'140'   ,
			'BTC_ETH':'148'   , 'USDT_ETH':'149'  , 'BTC_SC':'150'    , 'BTC_BCY':'151'  , 'BTC_EXP':'153'  , 'BTC_FCT':'155'   ,
			'BTC_RADS':'158'  , 'BTC_AMP':'160'   , 'BTC_DCR':'162'   , 'BTC_LSK':'163'  , 'ETH_LSK':'166'  , 'BTC_LBC':'167'   ,
			'BTC_STEEM':'168' , 'ETH_STEEM':'169' , 'BTC_SBD':'170'   , 'BTC_ETC':'171'  , 'ETH_ETC':'172'  , 'USDT_ETC':'173'  ,
			'BTC_REP':'174'   , 'USDT_REP':'175'  , 'ETH_REP':'176'   , 'BTC_ARDR':'177' , 'BTC_ZEC':'178'  , 'ETH_ZEC':'179'   ,
			'USDT_ZEC':'180'  , 'XMR_ZEC':'181'   , 'BTC_STRAT':'182' , 'BTC_NXC':'183'  , 'BTC_PASC':'184' , 'BTC_GNT':'185'   ,
			'ETH_GNT':'186'   , 'BTC_GNO':'187'   , 'ETH_GNO':'188'   , 'BTC_BCH':'189'  , 'ETH_BCH':'190'  , 'USDT_BCH':'191'  ,
			'BTC_ZRX':'192'   , 'ETH_ZRX':'193'   , 'BTC_CVC':'194'   , 'ETH_CVC':'195'  , 'BTC_OMG':'196'  , 'ETH_OMG':'197'   ,
			'BTC_GAS':'198'   , 'ETH_GAS':'199'   , 'BTC_STORJ':'200'
		};
	}
	function isFunction(functionToCheck) {
	 return functionToCheck && {}.toString.call(functionToCheck) === '[object Function]';
	}
})();
