<html>
    <head>
        <style>
            .heading:{
                margin-top:30px !important;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr >
                    <th>
                    Hi,
                </th> 
                </tr>
                <tr class="heading">
                     <th> You have a new inquiry from avrt.com. Details are mentioned below:</th>
                </tr>
               
            </thead>
            <tbody>
                 @if(!empty($email))
                 <tr>
                  <td>Email:{{$email}} </td>
               
                 </tr>
                @endif
                 @if(!empty($heading))
               <tr>
                 <td>Subject:{{$heading}}</td>
               </tr>
                 @endif
                  @if(!empty($messages))
                  <tr>
                 <td>Message:{{$messages}}</td>
               </tr>
               @endif
             <tr>
                 <td>Thanks</td>
             </tr>
            </tbody>
            
        </table>
    </body>
</html>