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
    $('#login_submit_btn').on('click', function () {
        let form=$('#login-form').serializeArray();
        console.log(form);
        $('.l_fields').each(function () {
            if ($(this).val() == "") {
                error = true;
                $(this).next('p').removeClass('hidden');
            } else {
                error = false;
            }
        });
        let rezex = /^\b[A-Z0-9-_.]+@[A-Z0-9]+\.[A-Z]{2,4}\b$/i
        let email = $('#loginemail').val();
        //console.log(rezex.test(email));
        if (rezex.test(email) == false) {
            $('.l_email_error').css('display', 'block');
            error = true;
        } else {
            error = false;
        }
        let password = $('#loginPassword').val();
        if (password.length < 6) {
            $('.l_password_error').text('Paasword Must Be Of Six Character');
            $('.l_password_error').css('display', 'block');
            error = true;
        } else {
            error = false;
        }
        if (error == false) {
            let login_url = url+"auth/signin";
            $.ajax({
                method: 'post',
                url: login_url,
                data: {
                    _token: token,
                    data: { email: email, password: password, lat: lat, lng: lng }
                },
                success: function (response) {
                    console.log(response);
                    if (response.code == '200') {
                        if(response.role=='3'){
                            window.location.href=url+'admin/dashboard';
                        }else{
                           window.location.reload();  
                        }
                       
                    }
                    if (response.code == '201') {
                        if (response.type == "email") {
                            $('.l_email_error').text(response.error);
                            $('.l_email_error').css('display', 'block');;
                        }
                        if (response.type == "password") {
                            $('.l_password_error').text(response.error);
                            $('.l_password_error').css('display', 'block');;
                        }

                    }
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }
    });
});
