<html>
<meta name="csrf-token" content="{{ csrf_token() }}" />
-
-
-
-
-
-
<!-- Validation for 4 fields-->
<div id="validationSignup">{!! $errors->first('txt_spaFullName') !!}</div>
<div id="validationSignup">{!! $errors->first('txt_spaEmail') !!}</div>
<div id="validationSignup">{!! $errors->first('txt_spaPassword') !!}</div>
<div id="validationSignup">{!! $errors->first('txt_spaContactno') !!}</div>



<!-- X-CSRF-TOKEN -->
<script>
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
</script>

<!-- Jquery Ajax for posting values -->
<script>
  $("document").ready(function(){
    $("#form-add-signup-appointment").submit(function(e){
      e.preventDefault();
      var txt_spaFullName  = $('#txt_spaFullName').val();
      var txt_spaEmail     = $('#txt_spaEmail').val();
      var txt_spaPassword  = $('#txt_spaPassword').val();
      var txt_spaContactno = $('#txt_spaContactno').val();
      var token            = $('input[name=_token]').val();
      var dataString       = 'txt_spaFullName='+txt_spaFullName+'&txt_spaEmail='+txt_spaEmail+'&txt_spaPassword='+txt_spaPassword+'&txt_spaContactno='+txt_spaContactno+'&token='+token; 
      $.ajax({
              type: "post",
              url: "http://localhost/laravel/",
              data: dataString,
              success: function(NULL, NULL, jqXHR) {
               if(jqXHR.status === 200 ) {//redirect if  authenticated user.
                $( location ).prop( 'pathname', 'projects' );
                console.log(data);
                }
              },
              error: function(data) {
               if( data.status === 422 ) {
               //process validation errors here.
               var errors = data.responseJSON; 
               errorsHtml = '<div class="alert alert-danger"><ul>';
               $.each( errors , function( key, value ) {
                errorsHtml += '<li>' + value[0] + '</li>'; 
               });
               errorsHtml += '</ul></div>';
               $( '#validationSignup' ).html( errorsHtml ); 
               }
              }
            });
       e.preventDefault();         
      });
   });//end of document ready function
</script>
</html>
