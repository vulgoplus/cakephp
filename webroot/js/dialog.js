$(document).ready(function(){
	$("#close").click(function(){
		$("#dialog").hide();
	});

	$('.shop').click(function(e){
		$('.off').hide();
		$("#box").show();
		e.preventDefault();
		var x = $(this);
		var name = x.siblings('.name').html();
		//Get image
		$('#image').attr('src',x.siblings('.pic').find('img').attr('src'));
		//Get name to form
		$('#name').html(name);
		$('#popup input[name="name"]').val(name);
		//Get id
		$('#popup input[name="id"]').val(x.siblings('input[name="id"]').val());
		//Description
		$("#content").html(x.siblings('input[name="desc"]').val());
		//Get price
		var price = x.siblings('.price').find('.sale').html();
		$("#price").html(price);
		$('#popup input[name="price"]').val(price)
		//Get color
		$('#color').css('background-color', x.siblings('input[name="color"]').val());

		if(x.siblings('.size').find('select').html()!=''){
			$('#size').html(x.siblings('.size').html());
		}
		$("#dialog").show();

	});
});