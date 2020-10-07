$(document).ready(function() {

	$('.assignbook').click(function(e){
			e.preventDefault();
       $.get('create',function(data){
			$('#assignbook').modal('show')
		 		.find('#assignbookContent')
		 		.html(data);
        });
	});


	$('.returnbook').click(function(e){
			e.preventDefault();
			var id = $(this).attr("val");
       $.get('returnbook?id='+id,function(data){
			$('returnbook').modal('show')
		 		.find('returnbookContent')
			//.load($(this).attr('value'));
		 		.html(data);
        });
	});
	$('.borrow').click(function(e){
			e.preventDefault();
			 $.get('borrow',function(data){
			$('#borrow').modal('show')
				.find('#borrowContent')
				.html(data);
				});
	});


	$('.addauthor').click(function(e){
			e.preventDefault();
       $.get('addauthor',function(data){
			$('#addauthor').modal('show')
		 		.find('#addauthorContent')
		 		.html(data);
        });
	});
});
