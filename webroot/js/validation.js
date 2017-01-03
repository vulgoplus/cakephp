/**
 * Validate form
 */

$(document).ready(function(){

	/**
	 * Validate edit-form
	 */
	$.validator.addMethod("isImage",function(value,element){
		return this.optional(element) || value.match(/(?:gif|jpg|png|bmp|jpeg)$/);
	},"");


	/**
	 * Validate Category Form
	 */
	$('#edit-form').validate({
		rules: {
			TenNhomsp: {
				required : true,
				maxlength: 100
			},
			image: {
				isImage: true
			}
		},
		messages: {
			TenNhomsp: {
				required : 'Trường này là bắt buộc!',
				maxlength : 'Độ dài không dược quá 100 ký tự!'
			}
		}
	});

	$('#product-form').validate({
		rules: {
			TenSanPham: {
				required: true,
				maxlength: 70
			},
			'MoTa': {
				required: true,
				maxlength: 150
			},
			image: {
				required: true
			},
			DonGia: {
				required: true
			}
		},
		messages: {
			TenSanPham: {
				required: "Bạn phải nhập tên cho SP",
				maxlength: "Tên sản phẩm không dược dài hơn 100 ký tụ!"
			},
			MoTa: {
				required: "Bạn phải nhập mô tả cho sản phẩm!",
				maxlength: "Độ dài không được quá 150 ký tự!"
			},
			image: "Bạn phải nhập ảnh cho SP!",
			DonGia: "Sản phẩm phải có giá!"
		}
	});

	$('#product-form-update').validate({
		rules: {
			p_name: {
				required: true,
				maxlength: 70
			},
			'short-desc': {
				required: true,
				maxlength: 150
			},
			price: {
				required: true
			}
		},
		messages: {
			p_name: {
				required: "Bạn phải nhập tên cho SP",
				maxlength: "Tên sản phẩm không dược dài hơn 100 ký tụ!"
			},
			'short-desc': {
				required: "Bạn phải nhập mô tả cho sản phẩm!",
				maxlength: "Độ dài không được quá 150 ký tự!"
			},
			price: "Sản phẩm phải có giá!"
		}
	});

	$('#user-form').validate({
		rules: {
			username: {
				required: true,
				maxlength: 30,
				minlength: 4
			},
			password: {
				required: true,
				maxlength: 32,
				minlength: 6
			},
			re_password: {
				required: true,
				equalTo: "input[name='password']"
			},
			email: {
				email: true,
				required: true
			}
		},
		messages: {
			username: {
				required: "Bạn phải nhập tên người dùng!",
				minlength: "Tên người dùng có độ dài 4-30 ký tự!",
				maxlength: "Tên người dùng có độ dài 4-30 ký tự!"
			},
			password: {
				required: "Bạn phải nhập mật khẩu!",
				maxlength: "Độ dài phải từ 6-32 ký tự!",
				minlength: "Độ dài phải từ 6-32 ký tự!"
			},
			email: {
				email: "Email không đúng định dạng!",
				required: 'Không được bỏ trống!'
			},
			re_password:{
				required: "Không dược bỏ trống!",
				equalTo: "Mật khẩu không khớp!"
			}
		}
	});

	$('#banner-add').validate({
		rules:{
			image: {
				required: true,
				isImage: true
			},
			link: 'required'
		},
		messages: {
			image: {
				required: "Bạn phải tải ảnh lên!",
				isImage : "Ảnh không hợp lệ!"
			},
			link: 'Bạn phải có liên kết cho ảnh!'
		}
	});

	$('#banner-edit').validate({
		rules:{
			image: {
				isImage: true
			},
			link: 'required'
		},
		messages: {
			image: {
				isImage : "Ảnh không hợp lệ!"
			},
			link: 'Bạn phải nhập liên kết cho ảnh'
		}
	});

	var x= true;

	/**
	$("input[name='username']").focusout(function(){
		var value = $(this).val();
		if( value.length > 3 && value.length < 31){
			$("#username").html('<i class="fa fa-spinner fa-pulse success"></i>');
			$.ajax({
				url: $("input[name='check_url']").val(),
				method: "POST",
				data: {
					username: value
				},
				success: function(data){
					if(data==0){
						$("#username").html('<span class="success">Tài khoản này có thể sử dụng!</span>');
						x = true;
					}else{
						$("#username").html('<span class="error">Tài khoản này đã tồn tại!</span>');
						x = false;
					}
				},
				error: function(){
					$("#connect-error").show();
				}
			});
		}
	});
	*/
	/*
	$('#user-form').on('submit',function(e){
		if(!x){
			$("input[name='username']").focus();
			e.preventDefault();
		}
	});
	*/

	$("input[name='username']").keydown(function(){
		$("#username").html('');
	});

	$("#check-out").validate({
		rules: {
			cus_name:{
				required: true,
				minlength: 5,
				maxlength: 40
			},
			cus_phone:{
				required: true,
				minlength: 9,
				maxlength: 11
			},
			cus_mail:{
				required: true,
				email: true
			},
			cus_address: {
				required: true,
				maxlength: 100
			}
		},
		messages:{
			cus_name: {
				required: 'Vụi lòng nhập họ tên của bạn!',
				minlength: 'Tên của bạn quá ngắn!',
				maxlength: 'Tên bạn quá dài'
			},
			cus_phone:{
				required: 'Vui lòng nhập SĐT!',
				minlength: 'Độ dài không hợp lệ!',
				maxlength: 'Độ dài không hợp lệ!'
			},
			cus_mail:{
				required: 'Bạn phải nhập email!',
				email: 'E-mail bạn nhập không đúng!'
			},
			cus_address: {
				required: "Vui lòng nhập địa chỉ nhận hàng!",
				maxlength: "Vui lòng viết địa chỉ ngắn gọn"
			}
		}
	});

	$('#feedback-form').validate({
		rules:{
			name:{
				required: true,
				maxlength: 30
			},
			feedback: {
				required: true,
				maxlength: 200
			}
		},
		messages:{
			name: {
				required: 'Bạn phải nhập tên!',
				maxlength: 'Tên bạn quá dài'
			},
			feedback: {
				required: 'Bạn phải nhập nội dung!',
				maxlength: 'Bạn nhập bình luận quá dài'
			}
		}
	});

});