$(function () {
    let lat = "";
    let lng = "";
    navigator.geolocation.getCurrentPosition(function (position) {
        console.log(position.coords);
        lat = position.coords.latitude;
        lng = position.coords.longitude;
    });
    $(document).on('keyup', 'input', function () {
        $(this).next('p').css('display', 'none');
    });
    $('#register_submit_btn').on('click', function () {
         let form=$('#register_form').serializeArray();
         console.log(form);
        $('.r_fields').each(function () {
            if ($(this).val() == "") {
                error = true;
                $(this).next('p').removeClass('hidden');
            } else {
                error = false;
            }
        });
        let phone = $('#registerphone').val();
        if (phone.length != 10) {
            $('.r_phone_error').text('Phone Number Must Between 10 or 11 Character Only');
            $('.r_phone_error').css('display', 'block');
        } else {
            error = false;
        }
        let name = $('#Name').val();
        let email = $('#registeremail').val();
        let image=$('#image').prop('files')[0];
              let password = $('#registerPassword').val();
        console.log(password.length);
       
        console.log(image);
        let rezex = /^\b[A-Z0-9-_.]+@[A-Z0-9]+\.[A-Z]{2,4}\b$/i
        console.log(rezex.test(email));
        if (rezex.test(email) == false) {
            $('.r_email_error').css('display', 'block');
            error = true;
        } else {
             if (password.length < 6) {
            $('.r_password_error').text('Paasword Must Be Of Six Character');
            $('.r_password_error').css('display', 'block');
            error = true;
        } else {
            error = false;
        }
        }
  
        if (error == false) {
            let register_url = url+"auth/signup";
            let form_data=new FormData();
            form_data.append('name',name);
            form_data.append('email',email);
            form_data.append('phone',phone);
            form_data.append('password',password);
            form_data.append('lat',lat);
            form_data.append('lng',lng);
            form_data.append('image',image);
            form_data.append('_token',token);
            console.log(form_data);
            $.ajax({
                method: 'post',
                contentType:'multipart/form-data',
                cache:false,
                contentType:false,
                processData:false,
                url: register_url,
                data:form_data,
                success: function (response) {
                    console.log(response);
                    if (response.code == '200') {
                        $('#register').modal('hide');
                        $('#loginemail').val(response.data);
                        $('#exampleModal').modal('toggle');

                    }
                    if (response.code == '201') {
                        $('.r_email_error').text(response.error);
                        $('.r_email_error').css('display', 'block');
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }
    })
});
