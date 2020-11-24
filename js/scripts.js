(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		var checking = new TimelineMax({paused: true});
		checking.set(["#checkmark"], {drawSVG:"100% 100%"})
			.to(["#checkmark"], .5, {drawSVG:"14% 95%", delay: 1})
		
		Reveal.addEventListener( 'checking', function() {
			checking.play(0);
		});
		
		//Mute button
		$('#muteaudio').click(function(e) {
			e.preventDefault();
    	$('.hiddenAudio').removeAttr("data-autoplay");
    	Reveal.next();
    	$(this).parents(".reveal")[0].focus();
    });
    $('#playaudio').click(function(e) {
	    e.preventDefault();
	    $('.hiddenAudio').removeAttr("data-paused-by-reveal");
    	$('.hiddenAudio').attr("data-autoplay","true");
    	Reveal.next();
    	$(this).parents(".reveal")[0].focus();
    	console.log("is it focused?")
    });
    
    //Special Case for Warranties
    function playWarranty() {
	    var warrantyClip = document.getElementById("warrantyClip");
	    
	    if ($(warrantyClip).attr('data-autoplay') === "true") {
			  console.log("3 slide is herE!");
				warrantyClip.play();
			}
    }
    
    Reveal.addEventListener( 'warranty', function() {
	    playWarranty();
			
		}, false );
		
		
		var bars = $('.warranty-progress'),
			terms = $('.warranty-terms'),
			avail = $('.warranty-avail');
		var warrantyBars = new TimelineMax({paused: true});
		warrantyBars.set(bars, {width:0})
			.staggerTo(bars, 1, {width:"100%", delay:1, ease:Power2.easeOut}, 0.2, "staggering")
			.staggerTo(terms, 1, {opacity:1, delay:1, ease:Power2.easeOut}, 0.2, "staggering+=0.25")
			.staggerTo(avail, 1, {opacity:1, delay:1, ease:Power2.easeOut}, 0.2, "staggering+=0.75");
		
		Reveal.addEventListener( 'warranty', function() {
			warrantyBars.play(0);
		});
		
		
		var extpro_no_layers = $('#extpro_no .ext_layer'), extpro_no_layers_text = $('#extpro_no .ext_layerText'),
			extpro_yes_layers = $('#extpro_yes .ext_layer'), extpro_yes_layers_text = $('#extpro_yes .ext_layerText'),
			effect1 = $('.effect1'), effect2 = $('.effect2'), effect3 = $('.effect3'), effect4 = $('.effect4'), effect5 = $('.effect5'), effect6 = $('.effect6'), 
			linesBounce = $('#lines-bounce polyline'),
			linesNoBounce = $('#lines-nobounce line');
		
		var lines = new TimelineMax({repeat:-1, repeatDelay:0.5});	
		lines.set([linesBounce, linesNoBounce], {drawSVG:"0%"})
			.staggerTo(linesBounce, 1, {drawSVG:"100%"}, 0.2, "lines")
			.staggerTo(linesNoBounce, 0.8, {drawSVG:"100%"}, 0.2, "lines")
			.staggerTo(linesBounce, 1, {drawSVG:"100% 100%", delay: 1}, 0.2, "lines")
			.staggerTo(linesNoBounce, 0.8, {drawSVG:"100% 100%", delay: .8}, 0.2, "lines");
			
		var effects = new TimelineMax({repeat:-1});	
		effects
			.to(effect1, 0.5, {opacity:1}, "effectStart")
			.to(effect1, 0.5, {opacity:0, delay:2.5 }, "effect2")
			.to(effect2, 0.5, {opacity:1, delay:2.6 }, "effect2")
			.to(effect2, 0.5, {opacity:0, delay:2.5 }, "effect3")
			.to(effect3, 0.5, {opacity:1, delay:2.6 }, "effect3")
			.to(effect3, 0.5, {opacity:0, delay:2.5 }, "effect4")
			.to(effect4, 0.5, {opacity:1, delay:2.6 }, "effect4")
			.to(effect4, 0.5, {opacity:0, delay:2.5 }, "effect5")
			.to(effect5, 0.5, {opacity:1, delay:2.6 }, "effect5")
			.to(effect5, 0.5, {opacity:0, delay:2.5 }, "effect6")
			.to(effect6, 0.5, {opacity:1, delay:2.6 }, "effect6")
			.to(effect6, 0.5, {opacity:0, delay:2.5 }, "effectEnd");
			
			
		var exterior = new TimelineMax({paused: true, onStart: function () { lines.pause(0); effects.pause(0); }, onComplete: function () { lines.play(0); effects.play(0); }});
		exterior
			.set([extpro_no_layers,extpro_yes_layers], {y:-50, opacity:0})
			.set([extpro_no_layers_text,extpro_yes_layers_text], {y:-20, opacity:0})
			.staggerTo(extpro_no_layers, .4, {y:0,opacity:1,delay:1}, 0.3, "staggerIn")
			.staggerTo(extpro_yes_layers, .4, {y:0,opacity:1,delay:1}, 0.3, "staggerIn")
			.staggerTo(extpro_no_layers_text, .4, {y:0,opacity:1,delay:2}, 0.3, "staggerIn")
			.staggerTo(extpro_yes_layers_text, .4, {y:0,opacity:1,delay:2}, 0.3, "staggerIn");
		
		Reveal.addEventListener( 'extproanim', function() {
			exterior.play(0);
		});
		
		
		
		//Discount tool on 'Additional Coverage Package' Slide 
		Dinero();
		Dinero.globalLocale = 'en-EN';
		Dinero.globalFormat = '$0,0.00';

		if( $('#addcov-table').hasClass('discount-cumulative')) {
			var isSingleDiscount = false;
		} else {
			var isSingleDiscount = true;
		}

		function getDiscount(name) {
			if($("#" + name).length !== 0) {
				var element = $("#" + name).data('price');
				var removeDecimal = Math.round(100 * element.toFixed(2));
				var dineroAmount = Dinero({ amount: removeDecimal, currency: 'USD' });
				return dineroAmount;
			} else {
				return false;
			}
		}

		var beforeDiscounts = [];
		beforeDiscounts = [
			getDiscount('price_col1-beforeDiscount'),
			getDiscount('price_col2-beforeDiscount'),
			getDiscount('price_col3-beforeDiscount'),
			getDiscount('price_col4-beforeDiscount'),
		];
			
		function visibilityCheck() {
			if( $("#addcov-buttons .btn.active")[0] ) {
				if( !$("#row-discount, #row-todaysprice").hasClass('makeVisible') ) {
					$("#row-discount, #row-todaysprice").addClass('makeVisible');
				}
			} else {
				$("#row-discount, #row-todaysprice").removeClass('makeVisible');
			}
		}
		
		$('#addcov-buttons .btn').click(function() {
			if( $( this ).hasClass('active') ) {
				$( this ).removeClass('active');
				if(!isSingleDiscount){
					changeDiscount($( this ).data('discount'));
				}
				visibilityCheck();
			} else {
				$( this ).addClass('active');
				if(!isSingleDiscount){
					changeDiscount($( this ).data('discount'));
				}
				visibilityCheck();
			}
			
		});
		
		if ( $( "#additcoverage" ).length ) {
			if(isSingleDiscount){
				var singleDiscount = $( '#row-discount' ).data('discount');
				changeDiscount(singleDiscount);
			}
		}
		
		
		function changeDiscount(discount_amt) {
			console.log(discount_amt);
			if(!isSingleDiscount) {
				var discountsActive = $('.btn.btn-primary.active').map(function() {
					return $(this).data('discount');
				}).toArray();
	
				var discountsActiveNew = $.map( discountsActive, function( value ) {
					var newValue = Math.round(100 * value.toFixed(2));
					return newValue;
				});
	
				var discountReducer = function(a, b) {
					return a + b;
				}
	
				var discountTotal = discountsActiveNew.reduce(discountReducer, 0); 
			} else {
				
				var discount_amt_processed = Math.round(100 * discount_amt.toFixed(2));
				var discountTotal = discount_amt_processed;
			}
			
			$('#price_col1_discount,#price_col2_discount,#price_col3_discount,#price_col4_discount').text( Dinero({amount: discountTotal}).toFormat() );
			
			$.each(beforeDiscounts, function(index,value){
				if(value) {
					var totPrice_todaysprice = value.subtract(Dinero({ amount: discountTotal, currency: 'USD' }));
					$('#price_col'+(index+1)+'_todaysprice').text(totPrice_todaysprice.toFormat());
				}
			})
		}



		//Discount tool on 'Additional Coverage Package with prices 2020' Slide 
		if( $('#addcov_prices-table').hasClass('discount-cumulative')) {
			var isSingleDiscount_prices = false;
		} else {
			var isSingleDiscount_prices = true;
		}

		var beforeDiscounts_prices = [];
		beforeDiscounts_prices = [
			getDiscount('total_price_col1-beforeDiscount'),
			getDiscount('total_price_col2-beforeDiscount'),
			getDiscount('total_price_col3-beforeDiscount'),
			getDiscount('total_price_col4-beforeDiscount'),
		];


		function addcov_prices_visibilityCheck() {
			if( $("#addcov_prices_buttons .btn.active")[0] ) {
				if( !$("#addcov_prices_row-discount, #addcov_prices_row-todaysprice").hasClass('makeVisible') ) {
					$("#addcov_prices_row-discount, #addcov_prices_row-todaysprice").addClass('makeVisible');
				}
			} else {
				$("#addcov_prices_row-discount, #addcov_prices_row-todaysprice").removeClass('makeVisible');
			}
		}

		$('#addcov_prices_buttons .btn').click(function() {
			if( $( this ).hasClass('active') ) {
				$( this ).removeClass('active');
				addcov_prices_visibilityCheck();
				if(!isSingleDiscount_prices){
					console.log(addcov_prices_disc_single.length);
					addcov_prices_changeDiscount($( this ).data('discount'));
				}
				
			} else {
				$( this ).addClass('active');
				addcov_prices_visibilityCheck();
				if(!isSingleDiscount_prices){
					console.log(addcov_prices_disc_single.length);
					addcov_prices_changeDiscount($( this ).data('discount'));
				}
			}

		});

		if ( $( "#addcov_prices_additcoverage" ).length ) {
			if(isSingleDiscount_prices){
				var singleDiscount = $( '#addcov_prices_row-discount' ).data('discount');
				addcov_prices_changeDiscount(singleDiscount);
			}
		}

		function addcov_prices_changeDiscount(discount_amt) {
			
			if(!isSingleDiscount_prices) {
				var discountsActive_Prices = $('.btn.btn-primary.active').map(function() {
					return $(this).data('discount');
				}).toArray();
	
				var discountsActive_PricesNew = $.map( discountsActive_Prices, function( value ) {
					var newValue = Math.round(100 * value.toFixed(2));
					return newValue;
				});
	
				var discountReducer = function(a, b) {
					return a + b;
				}
	
				var discountTotal = discountsActive_PricesNew.reduce(discountReducer, 0);
			} else {
				var discount_amt_processed = Math.round(100 * discount_amt.toFixed(2));
				var discountTotal = discount_amt_processed;
			}
			
			// console.log("total " + discountTotal);
			
			// console.log(discountsActive);
			$('#total_price_col1_discount,#total_price_col2_discount,#total_price_col3_discount,#total_price_col4_discount').text( Dinero({amount: discountTotal}).toFormat() );

			$.each(beforeDiscounts_prices, function(index,value){
				if(value) {
					var totPrice_todaysprice = value.subtract(Dinero({ amount: discountTotal, currency: 'USD' }));
					$('#total_price_col'+(index+1)+'_todaysprice').text(totPrice_todaysprice.toFormat());
				}
			})
		}
			

		
	});
	
})(jQuery, this);
