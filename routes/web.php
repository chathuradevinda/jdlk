<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','PagesController@index');
//Route::get('/index_tp','PagesController@index_tp');
//Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();




Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/home_a', 'HomeController@index_a')->name('home_a');
    Route::resource('expertise','ExpertiseController');
    Route::resource('specialization','SpecializationController');
    Route::resource('servicearea','ServiceAreaController');
  //  Auth::routes();
});

Route::group(['middleware' => ['auth', 'client']], function() {
    Route::get('/home_c', 'HomeController@index_c')->name('home_c');

  //  Auth::routes();
});

Route::group(['middleware' => ['auth', 'tradeperson']], function() {
    Route::get('/home_tp', 'HomeController@index_tp')->name('home_tp');

  //  Auth::routes();
});


Route::resource('profile','ProfileController');
//Route::resource('expertise','ExpertiseController')->middleware(AdminMiddleware::class);

Route::resource('question','QuestionsController');
Route::resource('job','JobsController');
Route::post('job/fetch', 'JobsController@fetch')->name('job.fetch');

Route::get('loadjobdetails/index_assigned', 'LoadJobDetailsController@index_assigned')->name('loadjobdetails.index_assigned');
Route::get('loadjobdetails/index_completed', 'LoadJobDetailsController@index_completed')->name('loadjobdetails.index_completed');
Route::get('loadjobdetails/index_rejected', 'LoadJobDetailsController@index_rejected')->name('loadjobdetails.index_rejected');
Route::get('loadjobdetails/my_jobs', 'LoadJobDetailsController@my_jobs')->name('loadjobdetails.my_jobs');
Route::resource('jobdetails','JobDetailsController');
Route::resource('resource','ResourceController');

Route::resource('loadjobdetails','LoadJobDetailsController');
Route::get('pendingjobs/index_assigned', 'PendingJobsController@index_assigned')->name('pendingjobs.index_assigned');
Route::get('pendingjobs/index_accepted', 'PendingJobsController@index_accepted')->name('pendingjobs.index_accepted');
Route::get('pendingjobs/index_rejected', 'PendingJobsController@index_rejected')->name('pendingjobs.index_rejected');
Route::get('pendingjobs/index_completed', 'PendingJobsController@index_completed')->name('pendingjobs.index_completed');
Route::resource('pendingjobs','PendingJobsController');
Route::get('feedback/{id}/my_jobs_more_info', 'LoadJobDetailsController@my_jobs_more_info')->name('feedback.my_jobs_more_info');
Route::resource('feedback','FeedbackController');
Route::resource('local','FindLocalController');
Route::resource('tradepersonskills','TradepersonSkillsController');
Route::resource('myfeedbacks','MyFeedbacksController');

Route::get('/close_window', function () {
    return view('navs.close_window');
});


//Route::get('loadjobdetails/more_info_job_details', 'LoadJobDetailsController@loadMore')->name('loadjobdetails.loadmore');

//Route::post('job/fetch', 'JobsController@fetch')->name('dynamicdependent.fetch');


/*
Route::get('/about', function () {
    return view('about');
});
*/
//Route::get('/quotation', 'PagesController@quotation');

/*Route::get('http://localhost/jobdone/public/job/create',function(){
    $expertise_id = Input::get('expertise_id');
    $subcategories = Specialization::where('expertise_id','=',$expertise_id)->get();
    return Response::json($subcategories);
});
*/

