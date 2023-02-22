<html>
    <head>
        <title>Avrt</title>
        <style>
        body{
            display:flex;
          
           justify-content:center;
           align-items:center;
           font-family:serif;
           background:#787778;;
          }
            .logo{
                height:100px;
                width:200px;
                margin:5px;
                background:white;
                text-align:center;
                 
            }
            .logo img{
                height:100%;
                width:100%;
            }
            .content{
                height:400px;
                width:600px;
                background:white;
                 margin:5px;
                 display:flex;
                flex-direction:column;
                align-items:center;
            } 
            .content .heading{
                 margin:5px;
            }
              .content .heading span{
                font-size:23px;
                font-weight:bolder;

            }
            .content .message{
                 margin:5px;
             }
             .content .message span{
                 margin:5px;
                 color:#787778;
                 line-height:30px;
             }
                .button{
                display:flex;
                justify-content:center;
                align-items:center;
             }
             .button a{
                 padding:20px 60px 20px 60px;
                 background:#80bf2e;
                 border:none;
                 border-radius:8px;
                 color:white;
                 font-size:20px;
                 font-weight:bolder;
                 
             }
        </style>
    </head>
    <body  style=" display:flex;
          
           justify-content:center;
           align-items:center;
           font-family:serif;
           background:#787778;">
     
        <div class="content" style="height:400px;
                width:600px;
                background:white;
                 margin:5px;
                 display:flex;
                flex-direction:column;
                align-items:center;">
              <div class="logo" style="  height:100px;
                width:200px;
                margin:5px;
                background:white;
                text-align:center;">
            <img src="https://avrt.com/public/img/Logo.png" alt="image"  style=" height:100%;
                width:100%;"/>
              </div>
            <div class="heading" style="margin:5px;">
                <span style=" font-size:23px;
                font-weight:bolder;">Welcome to AVRT[Active Voice Recoznigation Techinque]</span>
            </div>
            <div class="message" style="margin:5px;">
                <span style="  margin:5px;
                 color:#787778;
                 line-height:30px;
                  font-size:17px;
                font-weight:bolder;">{{$user->name}},Hi There,thankyou for being a valued user to AVRT.Sorry to hear that you forgert your password.Dont worry,
                we provide a link attched to button given below,that will lead you to a page where you can reset your password</span>
                <span
                style="  margin:5px;
                 color:#787778;
                 line-height:30px;
                  font-size:17px;
                font-weight:bolder;">Please click the button provided below to reset your password.The url is a signed url that why your every data is secured.Link is only valid for 15 minute.</span>
            </div>
            
            <div class="button" style="  display:flex;
                justify-content:center;
                align-items:center;">
                <a style="padding:20px 60px 20px 60px;
                 background:#80bf2e;
                 border:none;
                 border-radius:8px;
                 color:white;
                 font-size:20px;
                 font-weight:bolder;
                 text-decoration:none;" href="{{$signed_link}}">Reset Password</a>
            </div>
            <div style="margin:5px;">
                <span style=" font-size:17px;
                font-weight:bolder;">All the credentials are confidentials and will not be shared outside AVRT.</span>
            </div>
            
        </div>
    </body>
</html>