$.fn.bloco_list = function () {
	var $this = $(this);
	$.ajax({
		url:'bloco/list_itens'
	}).done(function(response){
		$.each(response.data, function(i, v){
			var $option = $('<option/>').val(v.id).text('('+v.id+') '+v.nom);
			$this.append($option);
		});
	}).fail(function(error){
		console.log(error);
	});
};