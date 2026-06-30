(function(){
  "use strict";

jQuery(document).ready(function($) { 

   
$(document).ready(function(){

 $(window).load(function() {



		$('.animated').appear(function() {
		 $(this).each(function(){ 
		    $(this).css('visibility','visible');
		    $(this).addClass($(this).data('fx'));
		   });
		},{accY: -100});
						



});	

});


});
 })();