<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\NewPasswordController;

use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\RoutineXIController;
use App\Http\Controllers\Admin\RoutineXIIController;


use App\Http\Controllers\Admin\Students\AllStudentsController;
use App\Http\Controllers\Admin\Students\XIStudentsController;
use App\Http\Controllers\Admin\Students\XIIStudentsController;
use App\Http\Controllers\Admin\Students\OldStudentsController;
use App\Http\Controllers\Admin\Students\HscExamineeController;

use App\Http\Controllers\Admin\Exam\ExamController;
use App\Http\Controllers\Admin\Exam\HscController;

use App\Http\Controllers\Admin\Teachers\TeachersController;
use App\Http\Controllers\Admin\Teachers\DeptTeachersController;

use App\Http\Controllers\Admin\Admission\SecurityCodeController;
use App\Http\Controllers\Admin\Admission\AdmissionController;

use App\Http\Controllers\Admin\Download\IDcardController;
use App\Http\Controllers\Admin\Download\TestimonialController;
use App\Http\Controllers\Admin\Download\TransCertController;

use App\Http\Controllers\User\NoticeViewController;

use App\Http\Controllers\User\Posts\PostsController;
use App\Http\Controllers\User\Posts\LikesController;
use App\Http\Controllers\User\Posts\CommentsController;

use App\Http\Controllers\InfoboardController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\UsersRoleController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
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
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');


Route::get('/', function () {
    return view('infoboard.home');
})->name('infoboard/home');

Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function() {
    //__Home routes
    Route::get('/home', [UserController::class, 'index'])->name('home');

    //__Change password
    Route::post('/user_password/update', [NewPasswordController::class, 'password_update'])->name('user_password.update');

    //__User profile routes
    Route::get('profile/{id}', [UserController::class, 'profile'])->name('user.profile');

    //__Notice routes
    Route::get('/notice', [NoticeViewController::class, 'index'])->name('notice.view');

    //__Post routes
    Route::resource('/posts', PostsController::class);
    Route::resource('/posts/like', LikesController::class);
    Route::resource('/posts/comment', CommentsController::class);

    //__Videos route
    Route::get('/videos', [UserController::class, 'videos'])->name('videos');

    //__Routine route
    Route::get('/routines', [UserController::class, 'routines'])->name('routines');
    Route::get('/routines/export/{class}/{dept}', [UserController::class, 'export'])->name('routines.export');

    //__Teachers and students info route
    Route::get('/teacher_student_info', [UserController::class, 'teacher_student_view'])->name('teacher_student_info');

});


// __Admission routes
Route::get('/admission/procedure', function () {
    return view('admission.admission_procedure');
})->name('admission.procedure');

Route::post('/student/admission/store', [AdmissionController::class, 'store'])->name('student.admission.store');
Route::post('/student/admission/verify', [AdmissionController::class, 'verify'])->name('student.admission.verify');

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login')->middleware('guest:admin');
Route::post('/admin/login/store', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

    Route::get('/admin/password/change', [HomeController::class, 'password_change'])->name('admin.password.change');
    Route::post('/admin/password/update', [HomeController::class, 'password_update'])->name('admin.password.update');

    // __Notice routes
    Route::resource('/admin/notice', NoticeController::class);

    // __Routine routes and event calendar crud
    Route::resource('/admin/routines_xi', RoutineXIController::class);
    Route::resource('/admin/routines_xii', RoutineXIIController::class);
 // __event routes
    Route::get('/calendar/event', [CalendarController::class, 'calendar'])->name('calendar.event');

    // __Student routes
    Route::resource('/admin/students', AllStudentsController::class);
    Route::resource('/admin/students_xi', XIStudentsController::class);
    Route::resource('/admin/students_xii', XIIStudentsController::class);
    Route::resource('/admin/students_old', OldStudentsController::class);
    Route::resource('/admin/hsc_examinee', HscExamineeController::class);
    Route::get('/admin/students/transfer-class/{id}', [AllStudentsController::class, 'transfer_class'])->name('students.transfer-class');

    //__HSC routes
    Route::resource('/admin/hsc', HscController::class);
    Route::get('/admin/hsc_prev', [HscController::class, 'index_prev'])->name('hsc.previous');

    //__Exam routes
    Route::post('/admin/students/exam/mt/update/{class}/{id}', [ExamController::class, 'update_mt'])->name('admin.students.exam.mt.update');
    Route::post('/admin/students/exam/hy/update/{class}/{id}', [ExamController::class, 'update_hy'])->name('admin.students.exam.hy.update');
    Route::post('/admin/students/exam/fnl/update/{class}/{id}', [ExamController::class, 'update_fnl'])->name('admin.students.exam.fnl.update');

    // __Teacher routes
    Route::resource('/admin/teachers', TeachersController::class);
    Route::get('/admin/teachers-science', [DeptTeachersController::class, 'science'])->name('admin.teachers-science');
    Route::get('/admin/teachers-humanities', [DeptTeachersController::class, 'humanities'])->name('admin.teachers-humanities');
    Route::get('/admin/teachers-business', [DeptTeachersController::class, 'business'])->name('admin.teachers-business');

    // __Admission routes
    Route::resource('/admin/student/admission', AdmissionController::class);
    Route::resource('/admin/admission/security_code', SecurityCodeController::class);
    Route::get('/admin/admission/confirmation/{id}', [AdmissionController::class, 'confirmation'])->name('admin.admission.confirmation');

    // __Download routes
    Route::get('/admin/students/idcard/generate/{id}', [IDcardController::class, 'generate'])->name('admin.students.idcard.generate');
    Route::get('/admin/teachers/idcard/generate/{id}', [IDcardController::class, 'teachers_id_generate'])->name('admin.teachers.idcard.generate');

    Route::get('/admin/download/testimonial', [TestimonialController::class, 'index'])->name('admin.download.testimonial');
    Route::post('/admin/download/testimonial/generate', [TestimonialController::class, 'generate'])->name('admin.download.testimonial.generate');

    Route::get('/admin/download/tc', [TransCertController::class, 'index'])->name('admin.download.tc');
    Route::post('/admin/download/tc/generate', [TransCertController::class, 'generate'])->name('admin.download.tc.generate');

});
//infovoard route

// Route::get('/infoboard/home', [InfoboardController::class, 'infoboard'])->name('infoboard.home');
Route::get('/Login', function () {
    return view('welcome');
})->name('welcome');

//final event calendar
Route::get('/calendar/event', [CalendarController::class, 'calendar'])->name('calendar.event');
Route::get('/calendar/admin', [RoutineXIController::class, 'CalendarAdmin'])->name('calendar.admin');
Route::get('/add/event', [RoutineXIController::class, 'AddEvent'])->name('add.event');
Route::get('/event/destroy/{id}', [RoutineXIController::class, 'alis'])->name('event.destroy');
Route::post('/store/event', [RoutineXIController::class, 'StoreEvent'])->name('store.event');
Route::post('/update/event', [RoutineXIController::class, 'UpdateEvent'])->name('update.event');


//admin announcement route
Route::get('/home/announcement', [NoticeController::class, 'index'])->name('home.announcement');
Route::get('/announcement/edit/{id}', [AnnouncementController::class, 'edit']);
Route::put('/announcement/update/{id}', [AnnouncementController::class, 'update']);
Route::get('/announcement', [AnnouncementController::class, 'show']);
Route::get('/announcement/create', [NoticeController::class, 'create'])->name('notices.create');
Route::post('/update/announcement', [NoticeController::class, 'UpdateAnnouncement'])->name('update.announcement');
Route::post('/announcement/store', [NoticeController::class, 'store'])->name('store.announcement');
Route::get('/announcement/trash', [NoticeController::class, 'trash'])->name('announcement.trash');
Route::get('/announcement/delete/{id}', [NoticeController::class, 'destroy'])->name('announcement.delete');
Route::get('/announcement/restore/{id}', [NoticeController::class, 'restoreTrash'])->name('announcement.restore');
Route::get('/announcement/archive/{id}', [NoticeController::class, 'archive'])->name('announcement.archive');


//admin learning route
Route::get('/home/learning', [AdmissionController::class, 'index'])->name('home.learning');
Route::get('/learning/create', [LearningController::class, 'create'])->name('learning.create');
Route::post('/learning/insert', [LearningController::class, 'insert'])->name('insert.video');
Route::get('/learning/edit/{id}', [LearningController::class, 'edit']);
Route::post('/learning/update', [AdmissionController::class, 'UpdateLearning'])->name('update.learning');
Route::get('/learning/destroy/{id}', [LearningController::class, 'delete']);
Route::get('/learningvideo', [LearningController::class, 'show']);


//admin Users route
Route::get('/admin/user', [UsersRoleController::class, 'index'])->name('users.index');
Route::get('/admin/user/role', [UsersRoleController::class, 'role'])->name('role.index');
Route::get('/admin/user/admin', [UsersRoleController::class, 'admin'])->name('admin.index');
Route::post('/admin/insert/admin', [UsersRoleController::class, 'AdminInsert'])->name('admin.insert');
Route::get('/admin/trash', [UsersRoleController::class, 'trash'])->name('admin.trash');
Route::get('/admin/restore/{id}', [UsersRoleController::class, 'restoreTrash'])->name('admin.restore');
Route::get('/admin/archive/{id}', [UsersRoleController::class, 'archive'])->name('admin.archive');

Route::get('/user/trash', [UsersRoleController::class, 'UserTrash'])->name('user.trash');
Route::get('/user/restore/{id}', [UsersRoleController::class, 'UserRestoreTrash'])->name('user.restore');
Route::get('/user/archive/{id}', [UsersRoleController::class, 'UserArchive'])->name('user.archive');

Route::get('/admin/edit/{id}', [UsersRoleController::class, 'EditAdmin'])->name('admin.edit');
Route::post('/update/admin', [UsersRoleController::class, 'UpdateAdmin'])->name('update.admin');
Route::post('/admin/insert/user', [UsersRoleController::class, 'UserInsert'])->name('user.insert');
Route::get('/user/edit/{id}', [UsersRoleController::class, 'EditUser'])->name('user.edit');
Route::post('/update/user', [UsersRoleController::class, 'UpdateUser'])->name('update.user');

Route::post('/Profile/Update', [UsersRoleController::class, 'ProfileUpdate'])->name('profile.update');

//top story
Route::get('/story/index', [StoryController::class, 'index'])->name('topstoryslider.index');
Route::get('/story/create', [StoryController::class, 'create'])->name('topstoryslider.create');
Route::post('/story/store', [StoryController::class, 'store'])->name('store.story');
Route::get('/story/show', [StoryController::class, 'show'])->name('topstoryslider.show');
Route::put('/story/update',[StoryController::class, 'update'])->name('update.story');
Route::get('/story/edit/{id}', [StoryController::class, 'edit'])->name('topstoryslider.edit');
Route::get('/story/destroy/{id}', [StoryController::class, 'Destroy'])->name('story.delete');
//Route::post('/story/update', [StoryController::class, 'UpdateStory'])->name('update.story');
Route::resource('stories', StoryController::class);
Route::get('/story/trash', [StoryController::class, 'trash'])->name('story.trash');
Route::get('/story/restore/{id}', [StoryController::class, 'restoreTrash'])->name('story.restore');
Route::get('/story/archive/{id}', [StoryController::class, 'archive'])->name('story.archive');

//slider
Route::get('/home/slider', [SliderController::class, 'index'])->name('home.slider');
Route::get('/add/slider', [SliderController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [SliderController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [SliderController::class, 'Edit']);
Route::put('/slider/update/{id}', [SliderController::class, 'Update']);
Route::get('/slider/trash', [SliderController::class, 'trash'])->name('slider.trash');
Route::get('/slider/destroy/{id}', [SliderController::class, 'Destroy'])->name('slider.delete');
Route::get('/slider/restore/{id}', [SliderController::class, 'restoreTrash'])->name('slider.restore');
Route::get('/Slider/archive/{id}', [SliderController::class, 'archive'])->name('slider.archive');

Route::get('/infoboard/privacy', function () {
    return view('privacy');
})->name('infoboard.privacy');

Route::get('/infoboard/terms', function () {
    return view('terms');
})->name('infoboard.terms');

Route::post('/infoboard/contact', [ContactController::class, 'store'])->name('store.contact');
Route::get('/mail/index', [ContactController::class, 'index'])->name('mailbox.index');
Route::get('/mail/destroy/{id}', [ContactController::class, 'destroy'])->name('destroy.mail');

Route::post('/student/import', [AllStudentsController::class, 'import'])->name('students.import');
Route::post('/teacher/import', [TeachersController::class, 'import'])->name('teachers.import');

Route::get('/group', [App\Http\Controllers\HomeController::class, 'index'])->name('groups');

Route::post('gcmessage', 'App\Http\Controllers\HomeController@sendMessage');  // 
Route::get('/gcmessage/{id}', 'App\Http\Controllers\HomeController@getMessage')->name('gcmessage'); 
Route::get('/ShowgcMassage/{id}', 'App\Http\Controllers\HomeController@ShowMassage'); 
Route::get('/gcmessag/{id}', 'App\Http\Controllers\HomeController@getMessag')->name('gcmessages'); 
Route::get('/subscribe', 'App\Http\Controllers\HomeController@subscribe');
Route::delete('/unFollow/{id}', 'App\Http\Controllers\HomeController@remove_user'); 
/////////////////////  
Route::get('/group/create', 'App\Http\Controllers\GroupController@create_form');
Route::post('/group/create', 'App\Http\Controllers\GroupController@create');
Route::get('/group/join', 'App\Http\Controllers\GroupController@join_form');
Route::post('/group/join', 'App\Http\Controllers\GroupController@join');

Route::get('/group/edit/{id}', 'App\Http\Controllers\GroupController@edit');

Route::post('/group/update/{id}', 'App\Http\Controllers\GroupController@update');

Route::delete('/group/delete/{id}', 'App\Http\Controllers\GroupController@deleteGroup');

Route::get('/group/members_list/{id}', 'App\Http\Controllers\GroupController@members_list');

Route::get('/remove_user/{id}/{user_id}', 'App\Http\Controllers\GroupController@remove_user');