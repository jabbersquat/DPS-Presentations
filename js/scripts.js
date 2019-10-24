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
		var rowDiscount = $('#row-discount'),
			rowTodaysPrice = $('#row-todaysprice'),
			price_col1_beforeDiscount = $("#price_col1-beforeDiscount").text(),
			price_col2_beforeDiscount = $("#price_col2-beforeDiscount").text(),
			price_col3_beforeDiscount = $("#price_col3-beforeDiscount").text(),
			price_col4_beforeDiscount = $("#price_col4-beforeDiscount").text(),
			price_currentDiscount = 0;
			
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
				if(disc_single.length === 0){
					decreaseDiscount($( this ).data('discount'));
				}
				visibilityCheck();
			} else {
				$( this ).addClass('active');
				if(disc_single.length === 0){
					increaseDiscount($( this ).data('discount'));
				}
				visibilityCheck();
			}
			
		});
		
		if ( $( "#additcoverage" ).length ) {
			if(disc_single.length > 0){
				$('#price_col1_discount, #price_col2_discount, #price_col3_discount, #price_col4_discount').text(disc_single);
				$('#price_col1_todaysprice').text(price_col1_beforeDiscount - disc_single);
				$('#price_col2_todaysprice').text(price_col2_beforeDiscount - disc_single);
				$('#price_col3_todaysprice').text(price_col3_beforeDiscount - disc_single);
				$('#price_col4_todaysprice').text(price_col4_beforeDiscount - disc_single);
			}
		}
		
		function increaseDiscount(discAmt) {
			var scope = {
			    a: price_currentDiscount,
			    b: discAmt
			};
			var scope2 = {};
			price_currentDiscount = math.eval('a + b', scope); 
			$('#price_col1_discount,#price_col2_discount,#price_col3_discount,#price_col4_discount').text(price_currentDiscount);
			
			scope2 = {
			    a: price_currentDiscount,
			    b: price_col1_beforeDiscount,
			    c: price_col2_beforeDiscount,
			    d: price_col3_beforeDiscount,
			    e: price_col4_beforeDiscount
			};
			var pricecol1_todaysprice = math.eval('b - a', scope2).toFixed(2);
			var pricecol2_todaysprice = math.eval('c - a', scope2).toFixed(2);
			var pricecol3_todaysprice = math.eval('d - a', scope2).toFixed(2);
			var pricecol4_todaysprice = math.eval('e - a', scope2).toFixed(2);
			$('#price_col1_todaysprice').text(pricecol1_todaysprice);
			$('#price_col2_todaysprice').text(pricecol2_todaysprice);
			$('#price_col3_todaysprice').text(pricecol3_todaysprice);
			$('#price_col4_todaysprice').text(pricecol4_todaysprice);
		}
		
		function decreaseDiscount(discAmt) {
			var scope = {
			    a: price_currentDiscount,
			    b: discAmt
			};
			var scope2 = {};
			price_currentDiscount = math.eval('a - b', scope); 
			$('#price_col1_discount,#price_col2_discount,#price_col3_discount,#price_col4_discount').text(price_currentDiscount);
			
			scope2 = {
			    a: price_currentDiscount,
			    b: price_col1_beforeDiscount,
			    c: price_col2_beforeDiscount,
			    d: price_col3_beforeDiscount,
			    e: price_col4_beforeDiscount
			};
			var pricecol1_todaysprice = math.eval('b - a', scope2).toFixed(2);
			var pricecol2_todaysprice = math.eval('c - a', scope2).toFixed(2);
			var pricecol3_todaysprice = math.eval('d - a', scope2).toFixed(2);
			var pricecol4_todaysprice = math.eval('e - a', scope2).toFixed(2);
			$('#price_col1_todaysprice').text(pricecol1_todaysprice);
			$('#price_col2_todaysprice').text(pricecol2_todaysprice);
			$('#price_col3_todaysprice').text(pricecol3_todaysprice);
			$('#price_col4_todaysprice').text(pricecol4_todaysprice);
		}
			

		
	});
	
})(jQuery, this);
