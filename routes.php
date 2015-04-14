
<!-- Route to controller -->

Route::post('/', array(
    'before'  => 'csrf',
    'as'      => 'bookAppointmentSignUp',
    'uses'    => 'HomeController@signupBookAppointment'
));
