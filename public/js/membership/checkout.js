$(function(){
    $(document).on('click','#checkout',function(){
          let email=$('#check_email').val();
          let name=$('#check_name').val();
          let type;
          let pay_method;
          let error=false;
          console.log($('.type').is(':checked'));
           console.log($('.type:checked').val());
         if($('.type').is(':checked')==false){
             error=true;
             $('#member_type').text('Please select A MemberShip Type');
             $('#member_type').css('display','block');
         }else{
             $('#member_type').css('display','none');;
             console.log($('.type:checked').val());
             type=$('.type:Checked').val();
              if($('.payment').is(':checked')==false){
             error=true;
              $('#payment_method').text('Please select A Payment Method');
             $('#payment_method').css('display','block');
         }else{
             $('#payment_method').css('display','none');
             console.log($('.payment:checked').val())
             pay_method=$('.payment:checked').val();
             console.log(name.length);
              
              if(name.length==0)
         {
             console.log(name);
             error=true;
             $('#name_error').text('Please Fill Name Field');
             $('#name_error').css('display','block');
         }
         }
         }
         let path=window.location.pathname.split('/');
         let path_len=path.length-1;
         let slug=path[path_len];
         let  stripe_array="";
         console.log(slug);
         if(pay_method=="stripe"){
              $('#stripemodal').modal('toggle');
             stripe_array=validateStripe();
             console.log(stripe_array);
             if(stripe_array==true){
                 error=true;
             }
         }
         console.log(stripe_array);
         if(error==false){
              $('#stripemodal').modal('hide'); 
             console.log(stripe_form);
             let checkoutdata=new FormData();
             checkoutdata.append('name',name);
             checkoutdata.append('email',email);
             checkoutdata.append('type',type);
             checkoutdata.append('pay_method',pay_method);
             checkoutdata.append('slug',slug);
             checkoutdata.append('_token',token);
             checkoutdata.append('stripe_name',stripe_array.s_name);
             checkoutdata.append('stripe_number',stripe_array.s_card);
             checkoutdata.append('stripe_month',stripe_array.s_month);
             checkoutdata.append('stripe_year',stripe_array.s_year);
             checkoutdata.append('stripe_cvv',stripe_array.s_cvv);
             $.ajax({
                 method:'post',
                 url:url+'membership/subscribe',
                 data:checkoutdata,
                 cache:false,
                 contentType:false,
                 processData:false,
                 success:function(response){
                    console.log(response); 
    
                    if(response.code==200){
                        console.log(response.method);
                        console.log(response.status);
                        if(response.response.method=='stripe'){
                            if(response.response.status=='succeeded'){
                                window.location.href=url+'arena/post/'+slug;
                            }
                            
                              if(response.response.status=='failed'){
                                $('#stripemodal').modal('toggle');
                                   $('#card_error').css('display','block');
                                    $('#card_error').text(response.response.error);
                                
                            }
                            
                        }
                        if(response.response.method=='paypal'){
                         if(response.response.url){
                            window.location.href=response.response.url;
                          }    
                        }
                       
                     //window.location.href=url+'arena/post/'+slug;
                    }
                    if(response.response.code==201){
                        if(response.response.type=="auth"){
                            Swal.fire({
        title:"Welcome To The AVRT速 Arena (AA):Where Your Addictive Voice (AV) Meets Your Right Mind", 
        text:'You Can Login To Arena With Your Email And New Password,Password Must Be Of Six Character.',
        imageUrl:'',
        imageWidth:400,
        imageHeight:200,
        imageAlt:'Arean Image',
        showCancelButton:true,
        confirmButtonText:'Arena Login'
      }).then((result)=>{
         $('#exampleModal').modal('toggle');
      });
                        }
                        
                    }
                 },
                 error:function(error){
                     
                 }
             })
         }
        
        
     });
     
     function validateStripe(){
          let error=false;
       let name=$('#card_name').val();
       let number=$('#card_number').val();
       let month=$('#month').val();
       let year=$('#year').val();
       let cvv=$('#cvv').val();
       let rezex=/^\b[0-9]{16,20}\b$/i

       if(name==""){
           $('#name_error').text('Name field required');
           error=true;
           return error;
       }
       console.log(number);
       if(number==""){
           $('#card_error').text('Card Number Field is required');
            error=true;
             return error;
       }
      if(rezex.test(number)==false){
            $('#card_error').text('Valid Card Number  is required');
          error=true;
          return error;   
      }
       if(month==""){
             $('#month_error').text('Month Field is required');
              error=true;
              return error;
       }else{
            $('#month_error').text("");
       }
       if(year==""){
             $('#year_error').text('Year Field is required');
             error=true;
             return error;
       }else{
            $('#year_error').text('');
       }
        if(cvv==""){
             $('#csv_error').text('CSV Field is required');
             error=true;
             return error;
       }else{
          $('#csv_error').text('');  
       }
           let strip_array={'s_name':name,'s_card':number,'s_month':month,'s_year':year,'s_cvv':cvv};
       return strip_array;
     }
     
    
})