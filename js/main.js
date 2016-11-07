jQuery(document).ready(function($){

	//open/close lateral filter
	$('.cd-filter-trigger').on('click', function(){
		triggerFilter(true);
	});
	$('.cd-filter .cd-close').on('click', function(){
		triggerFilter(false);
	});




	function triggerFilter($bool) {
		var elementsToTrigger = $([$('.cd-filter-trigger'), $('.cd-filter'), $('.cd-tab-filter'), $('.cd-gallery')]);
		elementsToTrigger.each(function(){
			$(this).toggleClass('filter-is-visible', $bool);
		});
	}



	//mobile version - detect click event on filters tab
	var filter_tab_placeholder = $('.cd-tab-filter .placeholder a'),
		filter_tab_placeholder_default_value = 'Select',
		filter_tab_placeholder_text = filter_tab_placeholder.text();

	$('.cd-tab-filter li').on('click', function(event){
		//detect which tab filter item was selected
		var selected_filter = $(event.target).data('type');

		//check if user has clicked the placeholder item
		if( $(event.target).is(filter_tab_placeholder) ) {
			(filter_tab_placeholder_default_value == filter_tab_placeholder.text()) ? filter_tab_placeholder.text(filter_tab_placeholder_text) : filter_tab_placeholder.text(filter_tab_placeholder_default_value) ;
			$('.cd-tab-filter').toggleClass('is-open');

			//check if user has clicked a filter already selected
		} else if( filter_tab_placeholder.data('type') == selected_filter ) {
			filter_tab_placeholder.text($(event.target).text());
			$('.cd-tab-filter').removeClass('is-open');

		} else {
			//close the dropdown and change placeholder text/data-type value
			$('.cd-tab-filter').removeClass('is-open');
			filter_tab_placeholder.text($(event.target).text()).data('type', selected_filter);
			filter_tab_placeholder_text = $(event.target).text();

			//add class selected to the selected filter item
			$('.cd-tab-filter .selected').removeClass('selected');
			$(event.target).addClass('selected');
		}
	});

	//close filter dropdown inside lateral .cd-filter
	$('.cd-filter-block h4').on('click', function(){
		$(this).toggleClass('closed').siblings('.cd-filter-content').slideToggle(300);
	})

	//fix lateral filter and gallery on scrolling
	$(window).on('scroll', function(){
		(!window.requestAnimationFrame) ? fixGallery() : window.requestAnimationFrame(fixGallery);
	});

	$( function() {
			$( "#slider-range" ).slider({
				range: true,
				min: 0,
				max: 12,
				values: [ 0, 12 ],
				slide: function( event, ui ) {
					$( "#amount" ).val( ui.values[ 0 ] + "h - " + ui.values[ 1 ] + "h");
				}
			});
			$( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
				"h - " + $( "#slider-range" ).slider( "values", 1 ) + "h");
		}

	);

	$( function() {
		$( "#datepicker" ).datepicker({
			dateFormat: "yy-mm-dd"
		});
	});



	function fixGallery() {
		var offsetTop = $('.cd-main-content').offset().top,
			scrollTop = $(window).scrollTop();
		( scrollTop >= offsetTop ) ? $('.cd-main-content').addClass('is-fixed') : $('.cd-main-content').removeClass('is-fixed');
	}

	/************************************
	 MitItUp filter settings
	 More details:
	 https://mixitup.kunkalabs.com/
	 or:
	 http://codepen.io/patrickkunka/
	 *************************************/

	buttonFilter.init();
	$('.cd-gallery ul').mixItUp({
		controls: {
			enable: false
		},
		callbacks: {
			onMixStart: function(){
				$('.cd-fail-message').fadeOut(200);
			},
			onMixFail: function(){
				$('.cd-fail-message').fadeIn(200);
			}
		}
	});

	//search filtering
	//credits http://codepen.io/edprats/pen/pzAdg
	var inputText;
	var $matching = $();

	var delay = (function(){
		var timer = 0;
		return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
		};
	})();

	$(".cd-filter-content input[type='search']").keyup(function(){
		// Delay function invoked to make sure user stopped typing
		delay(function(){
			inputText = $(".cd-filter-content input[type='search']").val().toLowerCase();
			// Check to see if input field is empty
			if ((inputText.length) > 0) {
				$('.mix').each(function() {
					var $this = $(this);

					// add item to be filtered out if input text matches items inside the title
					if($this.attr('class').toLowerCase().match(inputText)) {
						$matching = $matching.add(this);
					} else {
						// removes any previously matched item
						$matching = $matching.not(this);
					}
				});
				$('.cd-gallery ul').mixItUp('filter', $matching);
			} else {
				// resets the filter to show all item if input is empty
				$('.cd-gallery ul').mixItUp('filter', 'all');
			}
		}, 200 );
	});


});





/*****************************************************
 MixItUp - Define a single object literal
 to contain all filter custom functionality
 *****************************************************/
var rangeFilterValues;
var checkBoxes;
var datePick;
var buttonFilter = {
	// Declare any variables we will need as properties of the object
	$filters: null,
	groups: [],
	outputArray: [],
	outputString: '',



	// The "init" method will run on document ready and cache any jQuery objects we will need.
	init: function(){
		var self = this; // As a best practice, in each method we will asign "this" to the variable "self" so that it remains scope-agnostic. We will use it to refer to the parent "buttonFilter" object so that we can share methods and properties between all parts of the object.

		self.$filters = $('.cd-main-content');
		self.$container = $('.cd-gallery ul');

		self.$filters.find('.cd-filters').each(function(){
			var $this = $(this);

			self.groups.push({
				$inputs: $this.find('.filter'),
				active: '',
				tracker: false
			});
		});

		self.bindHandlers();
	},

	// The "bindHandlers" method will listen for whenever a button is clicked.
	bindHandlers: function(){
		var self = this;

		self.$filters.on('click', 'a', function(e){
			self.parseFilters();
		});
		self.$filters.on('change', function(){
			self.parseFilters();
		});

		self.$filters.on('slidechange', function(event, ui){
			rangeFilterValues = [];
			var rangevalues = ui.values;
			minValue = rangevalues[0];
			maxValue = rangevalues[1];
			for (i = minValue; i <= maxValue; i += 1) {
				rangeFilterValues.push(".duration" + i);
			}
			//alert(rangeFilterValues.join("\n"));
			self.parseFilters();

		});



	},

	parseFilters: function(){
		var self = this;
		checkBoxes = [];
		// loop through each filter group and grap the active filter from each one.
		for(var i = 0, group; group = self.groups[i]; i++){
			group.active = [];
			group.$inputs.each(function(){
				var $this = $(this);
				if($this.is('input[type="radio"]')) {
					if($this.is(':checked') ) {
						group.active.push($this.attr('data-filter'));
					}
				} else if ($this.is('input[type="checkbox"]')){
					if($this.is(':checked') ) {
						checkBoxes.push($this.attr('data-filter'));
						alert(checkBoxes.length);
					}
				}
				else if($this.is('select')){
					group.active.push($this.val());
				} else if( $this.find('.selected').length > 0 ) {
					group.active.push($this.attr('data-filter'));
				}
			});
		}
		self.concatenate();
	},

	concatenate: function(){
		var self = this;
		datePick = "";
		if($( "#datepicker" ).val().length > 0){
			datePick = ".datepick" + $( "#datepicker" ).val();
		}

		self.outputString = ''; // Reset output string


		if(rangeFilterValues != null){
			for(var r = 0; r < rangeFilterValues.length; r++){
				if (r > 0){
					self.outputString += ",";
				}
				self.outputString += rangeFilterValues[r];
				if(checkBoxes.length > 0){
					for(var c = 0; c < checkBoxes.length; c++){
						if (c > 0){
							self.outputString += ",";
							self.outputString += rangeFilterValues[r];
						}

						self.outputString += checkBoxes[c];

						for(var i = 0, group; group = self.groups[i]; i++){
							self.outputString += group.active;
						}
						if(datePick.trim()){
							self.outputString += datePick;
						}

					}
				} else {
					for(var i = 0, group; group = self.groups[i]; i++){
						self.outputString += group.active;
					}
					if(datePick.trim()){
						self.outputString += datePick;
					}
				}
			}

		} else if(checkBoxes.length > 0){
			for(var c = 0; c < checkBoxes.length; c++){
				if (c > 0){
					self.outputString += ",";
				}
				self.outputString += checkBoxes[c];
				for(var i = 0, group; group = self.groups[i]; i++){
					self.outputString += group.active;
				}
				if(datePick.trim()){
					self.outputString += datePick;
				}

			}
		} else {
			for(var i = 0, group; group = self.groups[i]; i++){
				self.outputString += group.active;
			}
			if(datePick.trim()){
				self.outputString += datePick;
			}
		}

		// If the output string is empty, show all rather than none:
		!self.outputString.length && (self.outputString = 'all');

		// Send the output string to MixItUp via the 'filter' method:
		if(self.$container.mixItUp('isLoaded')){
			self.$container.mixItUp('filter', self.outputString)
		}
	}
};