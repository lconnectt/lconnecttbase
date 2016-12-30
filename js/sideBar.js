$(document).ready(function(){
			$('#btnSave').click(function(){
				var eihost = $('#eihost').val();
				var eiport = $('#eiport').val();
				var eohost = $('#eohost').val();
				var eoport = $('#eoport').val();
				
				var datastring = 'eihost='+eihost+'&eiport='+eiport+'&eohost='+eohost+'&eoport='+eoport;
				
				$.ajax({
					type : 'POST',
					url : 'add_email_settings.php',
					data : datastring,
					cache : false,
					success : function(data){
						location.reload();
					}
				});
			});
		});