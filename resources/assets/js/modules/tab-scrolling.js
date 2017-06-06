window.tabScrolling = {
	scrollBarWidths: 40,
	widthOfTab: function () {
		var listsWidth =  0;
		$('.list-item').each( function() {
			var listWidth =  $(this).outerWidth();
			listsWidth += listWidth;
		});
		return listsWidth;
	},
	widthOfHidden: function () {
		return (($('.lists').outerWidth()) - this.widthOfTab() - this.getLeftPosition()) - this.scrollBarWidths;
	},
	getLeftPosition: function () {
		return $('.tab-lists').position().left;
	},
	reAdjustPosition: function ()  {
		if (($('.lists').outerWidth()) < this.widthOfTab()) {
			$('.arrow-right').show();
		} else {
			$('.arrow-right').hide();
		}

		if (this.getLeftPosition < 0) {
			$('.arrow-left').show();
		} else {
			$('.list-item').animate({ left: "-=" +this.getLeftPosition()+ "px" },'slow');
			$('.arrow-left').hide();
		}
	},
	arrowRightAction: function () {
		var widthOfHidden = this.widthOfHidden();
		$('.arrow-right').on('click', function(e) {
			e.preventDefault();

			$('.arrow-left').fadeIn('slow');
			$('.arrow-right').fadeOut('slow');
			$('.tab-lists').animate({left: "+=" +widthOfHidden+ "px" },'slow',function(){
			});
		});
	},
	arrowLeftAction: function () {
		var widthOfHidden = this.widthOfHidden();
		$('.arrow-left').on('click', function(e) {
			$('.arrow-right').fadeIn('slow');
			$('.arrow-left').fadeOut('slow');
			$('.tab-lists').animate({left: "-=" +widthOfHidden+ "px" },'slow',function(){
			});
		});
	},
	windowResize: function () {
		var reAdjustPosition = this.reAdjustPosition();
		$(window).resize( function() {
			reAdjustPosition;
		});
	},
	init: function () {
		this.reAdjustPosition();
		this.arrowLeftAction();
		this.arrowRightAction();
		this.windowResize();
	}
}
$(document).ready( function() {
	window.tabScrolling.init();
});