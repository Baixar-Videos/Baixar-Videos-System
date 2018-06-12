/*
* Bootstrap Choices
*
* @version v1.0 (12/2014)
*
* Copyright 2014, Brian S. Reed
* Released under the MIT license.
* http://iambriansreed.github.com/bootstrap-choices/LICENSE
*
* Homepage:
*   http://iambriansreed.github.com/bootstrap-choices/
*
* Authors:
*   Brian S. Reed
*
* Maintainer:
*   Brian S. Reed - Twitter: @iambriansreed
*
* Dependencies:
*   jQuery 1.11+
*   Bootstrap 3+
*	Font Awesome 4+
*
* Optional:
*   jQuery UI Sortable
*
*/
(function ( $ ) {
  
	$.fn.bs_choices = function() {
		
	    var
	    choice_input_html = '\
		<div class="input-group">\
		  {handle}\
	      <input type="text" class="form-control" value="">\
	      <span class="input-group-btn">\
	        <button class="btn btn-default remove" type="button"><span class="text-danger"><i class="fa fa-times"></i></span></button>\
	      </span>\
	    </div>',
	    choices_html = '\
	    <div class="choice-inputs">\
	    </div>\
	    <div class="btn-group bs-choice-btn-group" role="group">\
		    <button class="btn btn-default add" type="button"><i class="fa fa-plus-circle"></i> Add</button>\
		    <button class="btn btn-default sort" type="button">\
		    	<span class="asc"><i class="fa fa-sort-alpha-asc"></i></span>\
				<span class="desc"><i class="fa fa-sort-alpha-desc"></i></span> Sort\
			</button>\
	    </div>';
		
		choice_input_html = choice_input_html.replace('{handle}', 
			$.fn.sortable === undefined ? '' : '<span class="input-group-addon handle"><i class="fa fa-bars"></i></span>'
			);
	    
		window.bs_choices = bs_choices in window ? window.bs_choices || [];
					
	    if(window.bs_choices.length == 0)
	    {
	    	$('head').append('<style>\
	    	.bs-choices > div { margin-bottom: 1em; }\
	    	.bs-choices .choice-inputs > div { margin-bottom: 0.5em; }\
	    	.bs-choices .choice-inputs .handle { cursor: pointer; }\
	    	.bs-choices .btn:active, .bs-choices .btn:focus { outline: none; }\
	    	.bs-choices > textarea, .bs-choices .btn.sort span { display: none; }\
	    	.bs-choices .btn.sort.asc .asc, .bs-choices .btn.sort.desc .desc { display: inline-block; }\
	    	</style>');
	    }
	    
		function bs_choices_group(element)
		{					
			var group = this;
			
			this.form_group = $(element);
			
			if(!this.form_group.hasClass('form-group'))
				this.form_group = this.form_group.closest('.form-group');
							
			if(this.form_group.length < 1)
			{	
				console.log('fail');
				console.log(element);
				console.log(this.form_group);
				group = null;
				return;
			}
			
			this.form_group.addClass('bs-choices').append(choices_html);
												
			this.inputs = $('.choice-inputs', this.form_group);
			this.textarea = $('textarea', this.form_group);
								
			group.values = this.textarea.val().split(/[\s^\r\n]*\r+[\s^\r\n]*|[\s^\r\n]*\n+[\s^\r\n]*/);
			// split on new lines or carriage return and trim each line
			
			this.keyup_timeout = false;
			
			this.btn_sort = $('.sort', this.form_group);
									    	
			this.btn_sort.click( function(){
		    	
		    	var btn = $(this);
			    	
		    	if(btn.hasClass('asc') || btn.hasClass('desc'))
		    		btn.toggleClass('asc desc');
		    	else
		    		btn.addClass('asc');
		    	
		    	if(btn.hasClass('asc'))
		    		group.sort(true);
		    	else
		    		group.sort(false);
		    	
	    	});
	    	
	    	this.form_group.on('click', '.add', function(){
		    	
		    	var group = $(this).closest('.bs-choices').data('bs_choices');
			    
				group.inputs.append(choice_input_html);
				
				$('input', group.inputs).last().focus();
		    });
		    			    
	    	this.form_group.on('click', '.remove', function(){
		    	
		    	$(this).closest('.input-group').remove();
		    	
		    	group.from_inputs();
		    	
		    });
		    
	    	this.form_group.on('keyup', 'input', function(){
		    	
		    	if( group.keyup_timeout ) clearTimeout(group.keyup_timeout);
		    			    	
		    	group.keyup_timeout = setTimeout(function(){
			    	group.from_inputs();
			    }, 2000);
	    	});
								
			group.to_inputs = function() // builds values to input html
			{							
				var new_choice_inputs_html = '';
				
			    $.each(group.values, function(index, value){
				    new_choice_inputs_html += choice_input_html.replace('value=""', 'value="' + value + '"');
			    });
			    
			    this.inputs.html(new_choice_inputs_html);
			    group.to_textarea();
			}
			
			group.to_textarea = function() // saves values to textarea
			{
				group.textarea.val(group.values.join('\r\n'));
			}
			
			group.from_inputs = function() // update values from inputs call to_textarea
			{
				group.values = [];
				$('input', this.inputs).each(function(i, e){
					group.values.push(e.value);
				});
				group.to_textarea();
			}
			
			group.sort = function(asc) // sorts values then updates html and textarea 
			{
				group.from_inputs();
				
				group.values = group.values.sort();
				if(!asc)
					group.values = group.values.reverse();
									
				group.to_inputs();
				group.to_textarea();
			}
								
			group.submit = function()
			{
				group.from_inputs();
			}
			
	    	group.to_inputs();
	    	
	    	if($.fn.sortable !== undefined)
	    		this.inputs.sortable({ 'stop' : function(){
		    		group.from_inputs();
		    		group.btn_sort.removeClass('asc desc');
		    }, 'axis' : 'y' });
	    	
	    	this.form_group.closest('form').submit(this.submit());
		}
	    
	    $(this).each(function(index, element){
		
			var new_bs_choices_group = new bs_choices_group(element);
		
			if(new_bs_choices_group == null)
				return;
				
			new_bs_choices_group.form_group.data('bs_choices',new_bs_choices_group);
			bs_choices.push(new_bs_choices_group);
			
	    });
	    	
		return this;
	};

}( jQuery ));