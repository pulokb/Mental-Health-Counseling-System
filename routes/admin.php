<?php

//admin Login, logout, forget password routes

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\ContactFeedbackController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FrontendCMSController;
use App\Http\Controllers\Admin\LogActivityController;
use App\Http\Controllers\Admin\MultipurposeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\NewTest2Controller;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\UserQueryController;
use App\Http\Controllers\Admin\SymptomsController;
use App\Http\Controllers\Admin\SuggestionsController;
use App\Http\Controllers\Admin\DoctorFeedbackController;
use App\Http\Controllers\Admin\VisitorInfoController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Models\NewTest2;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => config('admin.admin_route_prefix'), 'as' => 'admin.'], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
//show the link request form to reset password
Route::get('password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Send the link - it will use the notification from admin model
Route::post('password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//receive the request from the send email
Route::get('password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('password.reset');
//update password
Route::post('password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('password.update');



Route::group(['middleware' => ['auth', 'preventBackHistory','notUser','localaization']], function () {
    Route::group(['prefix' => config('admin.admin_route_prefix'), 'as' => 'admin.'], function () {

        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        //change password
        Route::get('change-password', [AdminProfileController::class, 'changePasswordView'])->name('change.password');
        Route::post('change-password', [AdminProfileController::class, 'changePassword'])->name('change.password');

        // contact and feedback
        Route::get('contacts', [ContactFeedbackController::class, 'contacts'])->name('contacts');
        Route::get('feedbacks', [ContactFeedbackController::class,'feedbacks'])->name('feedbacks');
        Route::get('contacts/{contactFeedback}', [ContactFeedbackController::class, 'show'])->name('contactFeedback.show');
        Route::delete('contact-feedback-delete/{contactFeedback}', [ContactFeedbackController::class, 'contactFeedbackDelete'])->name('contactFeedback.delete');

        // Icon
        Route::get('rt-icons1', function () {
            return view('admin.others.icons1');
        });
        Route::get('rt-icons2', function () {
            return view('admin.others.icons2');
        });

        // Backups
        Route::resource('backups', BackupController::class)->only(['index', 'store', 'destroy']);
        Route::get('backups/{file_name}', [BackupController::class, 'download'])->name('backups.download');
        Route::delete('backups', [BackupController::class, 'clean'])->name('backups.clean');
        Route::get('backup', [BackupController::class, 'backup'])->name('backup');

        //Resources Routes
        Route::resources(
            [
                'admins' => AdminController::class,
                'users' => UserController::class,
                'roles' => RoleController::class,
                'languages' => LanguageController::class,
                'notifications' => NotificationController::class,

            ]
        );

        // DataTable Delete By Selection
        Route::post('roles-deleteBySelection', [RoleController::class, 'deleteBySelection'])->name('roles.deleteBySelection');
        Route::post('admins-deleteBySelection', [AdminController::class, 'deleteBySelection'])->name('admins.deleteBySelection');
        Route::post('languages-deleteBySelection', [LanguageController::class, 'deleteBySelection'])->name('languages.deleteBySelection');
        Route::post('systemActivityLog-deleteBySelection', [LogActivityController::class, 'deleteBySelection'])->name('systemActivityLog.deleteBySelection');
        Route::post('deleteBySelection', [MultipurposeController::class, 'deleteBySelection'])->name('deleteBySelection');
        //Settings
        Route::resource('settings', SettingController::class)->only(['index', 'store', 'create']);
        Route::post('settings-updateAll', [SettingController::class, 'updateAll'])->name('settings.updateAll');
        Route::get('settings-updateEmailSetting', [SettingController::class, 'updateEmailSettingView'])->name('settings.updateEmailSettingView');
        Route::post('settings-updateEmailSetting', [SettingController::class, 'updateEmailSetting'])->name('settings.updateEmailSetting');
        Route::post('settings-sendMail', [SettingController::class, 'sendMail'])->name('settings.sendMail');
        Route::post('settings-sendTestMail', [SettingController::class, 'sendTestMail'])->name('settings.sendTestMail');
        // Activity Logs
        Route::get('user-login-activity', [LogActivityController::class, 'userLoginActivity'])->name('userLoginActivity');
        Route::get('admin-login-activity', [LogActivityController::class, 'adminLoginActivity'])->name('adminLoginActivity');
        Route::delete('delete-login-activity/{id}', [LogActivityController::class, 'deleteLoginActivity'])->name('deleteLoginActivity');
        Route::delete('delete-user-login-activity', [LogActivityController::class, 'deleteUserLoginActivity'])->name('deleteUserLoginActivity');
        Route::delete('delete-admin-login-activity', [LogActivityController::class, 'deleteAdminLoginActivity'])->name('deleteAdminLoginActivity');
        Route::get('system-activity-log', [LogActivityController::class, 'systemActivityLog'])->name('systemActivityLog');
        Route::delete('delete-system-activity-log/{id}', [LogActivityController::class, 'deleteSystemLogActivity'])->name('deleteSystemLogActivity');
        Route::delete('delete-all-system-activity-log', [LogActivityController::class, 'deleteAllSystemLogActivity'])->name('deleteAllSystemLogActivity');
        Route::post('configure-system-log-activity', [LogActivityController::class, 'configureSystemLogActivity'])->name('configureSystemLogActivity');
        // Visitor Info
        Route::get('visitor-info', [VisitorInfoController::class, 'visitorInfo'])->name('visitorInfo');
        Route::delete('visitor-info-delete/{id}', [VisitorInfoController::class, 'visitorInfoDelete'])->name('visitorInfoDelete');
        Route::delete('visitor-info-delete-all', [VisitorInfoController::class, 'visitorInfoDeleteAll'])->name('visitorInfoDeleteAll');
        Route::get('visitor-block-list', [VisitorInfoController::class, 'visitorBlockList'])->name('visitorBlockList');
        Route::get('visitor-remove-from-block-list/{id}', [VisitorInfoController::class, 'visitorRemoveFromBlockList'])->name('visitorRemoveFromBlockList');
        Route::post('visitor-remove-from-block-list-all', [VisitorInfoController::class, 'visitorRemoveFromBlockListAll'])->name('visitorRemoveFromBlockListAll');
        Route::post('visitor-ip-block', [VisitorInfoController::class, 'visitorIpBlock'])->name('visitorIpBlock');
        //Login as user
        Route::get('login-as-user/{userId}', [UserController::class, 'loginAsUser'])->name('users.loginAsUser');

        // FrontendCMS
        Route::get('frontend-cms/page', [FrontendCMSController::class, 'page'])->name('frontendCMS.page');
        Route::get('frontend-cms/page/{id}', [FrontendCMSController::class, 'pageEdit'])->name('frontendCMS.pageEdit');
        Route::post('frontend-cms/page/{id}', [FrontendCMSController::class, 'pageUpdate'])->name('frontendCMS.pageUpdate');

        Route::get('frontend-cms/content', [FrontendCMSController::class, 'content'])->name('frontendCMS.content');
        Route::post('frontend-cms/content', [FrontendCMSController::class, 'contentUpdate'])->name('frontendCMS.contentUpdate');

        // Maintenence Mode
        Route::get('maintenance-mode', [MultipurposeController::class, 'maintenanceMode'])->name('maintenanceMode');
        Route::post('maintenance-mode', [MultipurposeController::class, 'maintenanceModeUpdate'])->name('maintenanceModeUpdate');

        // Language
        Route::post('language/set-default-language', [LanguageController::class, 'setDefaultLanguage'])->name('languages.setDefaultLanguage');
        Route::get('language/translate/{language}', [LanguageController::class, 'translatePage'])->name('languages.translatePage');
        Route::post('language/translate/{language}', [LanguageController::class, 'translate'])->name('languages.translate');

        //notification
        Route::get('notifications/mark-read/{notification}', [NotificationController::class, 'markRead'])->name('notifications.markRead');
        Route::get('notifications-mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');

         //Application Resources Routes
         Route::resources(
            [
                'new_test2s' => NewTest2Controller::class,
                'userqueries' => UserQueryController::class,
                'doctor_feedbacks' => DoctorFeedbackController::class,
                'symptoms' => SymptomsController::class,
                'suggestions' => SuggestionsController::class,

            ]
        );
    });
});
