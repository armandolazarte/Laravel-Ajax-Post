# Laravel5-Ajax-Post
If the incoming request was an AJAX request, no redirect will be generated in laravel 5. How can we solve this?

If you are trying to submit a form via AJAX post you will get an error 422 Unprocessable Entity, dont worry about that.

I will introduce the file structure firstly.

Create view pages in -> app/resources/views/
Add route in -> app/Http/routes.php
Create controller page in -> app/Http/Controllers
Create Request page in -> app/Http/Requests
Create Model Pages in -> You can create model folder under anywhere in the app. eg: app/Models. 


422 Unprocessable : 

Published on laravel website "If the incoming request was an AJAX request, no redirect will be generated. Instead, an HTTP response with a 422 status code will be returned to the browser containing a JSON representation of the validation errors".

I was actually just struggling with this myself, and the answer is pretty simple actually.

Because Laravel's request responds with a status code of 422, jQuery's success/done functions don't fire, but rather the error function, seeing as it's not 200.

So, in order to get the JSON response from your AJAX request generated from the Request object due to validation failing, you need to define the error handler, in my case i added below section in my index.blade.php.

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


