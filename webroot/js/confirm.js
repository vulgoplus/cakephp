$(document).ready(function(){
	/**
	 * Jquery confirm dialog
	 */
	$( "#dialog-confirm" ).dialog({
		//Properties
	  	resizable: false,
	  	autoOpen: false,
	  	height: "auto",
	  	width: 400,
	  	modal: true,
	  	show: {effect: 'scale', duration: 250},
	  	//Buttons
	  	buttons: {
	    	"Xóa mục đã chọn": function() {
	    		//Get all id checked
	    		var x =[];
	    		$('.select:checked').each(function(){
	    			x.push($(this).val());
	    		});

		    	// Ajax request
		    	if(x.length>0){
		    		$("#screen").show();
		    		$.ajax({
		    			url: $('#multi_delete').val(),
		    			method: "POST",
		    			data: {
		    				ids: x
		    			},
		    			success: function(msg){
		    				$('.select:checked').each(function(){
		    					$(this).parent().parent().remove();
		    				})
		    				$("#screen").hide();
		    			},
		    			error: function(){
		    				$("#screen").hide();
		    				$("#connect-error").show();
		    			}
		    		});
		    	}
		    	// Close diaglog
		      	$( this ).dialog( "close" );
		    },
		    "Hủy": function() {
		      $( this ).dialog( "close" );
		    }
		}
	});

	/**
	 * Click and open dialog
	 */
	$("#delAll").click(function(){
		$("#dialog-confirm").dialog("open");
	});



	/**
	 * Confirm Delte a product
	 */
	function deleteItem(value,x){
		$("#delete-product-confirm").html('<p>Bạn có thật sự muốn xóa?</p>').dialog({
			resizable: false,
			height: "auto",
			width: 400,
			modal: true,
			show: {effect: 'scale', duration: 250},
			buttons:{
				"Xóa":function(){
					$(this).dialog("close");
					callback(value,x);
				},
				"Hủy":function(){
					$(this).dialog("close");
				}
			}
		});
	}

	$(".delete-product").click(function(e){
		e.preventDefault();
		var x = $(this);
		deleteItem($(this).attr('href'),x);
	});

	$("#delete-items").click(function(){
		var x =[];
		$('.select:checked').each(function(){
			x.push($(this).val());
		});
		if(x.length==0){
			alert('Bạn chưa chọn bản ghi nào!');
		}else{
			deleteItem(x,true);
		}
	});

	function callback(value,x){
		$("#screen").show();	
		if($.isArray(value)){
			$.ajax({
				url: $('#multi_delete').val(),
				method: "POST",
				data: {
					ids: value
				},
				success: function(msg){
					$('.select:checked').each(function(){
						$(this).parent().parent().remove();
					})
					$("#screen").hide();
				},
				error: function(){
					$("#screen").hide();
					$("#connect-error").show();
				}
			});
		}else{
			$.ajax({
				url: value,
				post: "POST",
				success: function(){
					$("#screen").hide();
					x.parent().parent().remove();
				},
				error: function(){
					$("#screen").hide();
					$("#connect-error").show();
				}
			});
		}
	}


});
