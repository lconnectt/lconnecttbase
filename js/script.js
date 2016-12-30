( function( $ ) {
$( document ).ready(function() {
$('#cssmenu > ul > li > a').click(function() {
  $('#cssmenu li').removeClass('active');
  $(this).closest('li').addClass('active');	
/*  
  var disablelist = 1;
		if (disablelist){
			$("#app_service li").mouseover(function(){
				$(this).css("background", "#666");
    		});
			
			$("#app_service li").mouseout(function(){
				$(this).css("background", "");
    		});	
			$('#app_service li a').click(function(){				
				alert("Service not activated. Please contact us..");
				//$('#app_service li a').attr("href","#");
				$('#app_service li a').removeAttr('href');
			});
			
			}
		else{
			//$('#app_service li a').show([2000]);
			}
*/
  var checkElement = $(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    $(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    $('#cssmenu ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }
  if($(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false;	
  }		
});
	
			//var disablelist = 0;
		/*$("#app_service").click(function(){
			var disablelist = 1;
				if (disablelist){
					//app_service
					$('#app_service').removeClass('active');
					//$(this).closest('li').removeClass('active');	
					}
				else{
					$('#app_service').addClass('active');
					//$('#app_service').addClass('active');
					}
		});*/
			
			
});

} )( jQuery );


