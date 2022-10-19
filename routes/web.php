<?php

use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MineController;
use App\Http\Controllers\MlmCouponController;
use App\Http\Controllers\MlmPlanController;
use App\Http\Controllers\PaymentProofController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::prefix('viewpointadministration')->name('admin.')->group(function () {
    Route::get('/', [AdminLoginController::class, 'index'])->name('loginForm');
    Route::post('/', [AdminLoginController::class, 'authenticate'])->name('login');

    Route::middleware('auth:admin')->group(function () {

        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('banks', BankController::class);

        Route::resource('settings', SettingController::class);
        Route::get('email', [SettingController::class, 'Email'])->name('email');
        Route::post('email', [SettingController::class, 'EmailUpdate'])->name('email.update');
        Route::get('sms', [SettingController::class, 'Sms'])->name('sms');
        Route::post('sms', [SettingController::class, 'SmsUpdate'])->name('sms.update');
        Route::get('account', [SettingController::class, 'Account'])->name('account');
        Route::post('account', [SettingController::class, 'AccountUpdate'])->name('account.update');

        Route::get('/coupons/download', [CouponController::class, 'coupons_download'])->name('coupons.download');
        Route::resource('coupons', CouponController::class);
        Route::resource('plans', PlanController::class);

        Route::get('/mlm-coupons/download', [MlmCouponController::class, 'coupons_download'])->name('mlm-coupons.download');
        Route::resource('mlm-coupons', MlmCouponController::class);
        Route::resource('mlm-plans', MlmPlanController::class);

        Route::resource('account_types', AccountTypeController::class);

        Route::get('users', [AdminController::class, 'Users'])->name('users');
        Route::get('unblock-user/{id}', [AdminController::class, 'Unblockuser'])->name('users.unblock');
        Route::get('block-user/{id}', [AdminController::class, 'Blockuser'])->name('users.block');
        Route::get('manage-user/{id}', [AdminController::class, 'Manageuser'])->name('users.manage');
        Route::get('user/delete/{id}', [AdminController::class, 'Destroyuser'])->name('users.delete');
        Route::post('profile-update', [AdminController::class, 'profile_update'])->name('users.profile-update');
        Route::post('profile-update-pin', [AdminController::class, 'Profileupdatepin'])->name('users.profile-update-pin');
        Route::post('update_bank_details', [AdminController::class, 'UpdateBankDetails'])->name('users.update_bank_details');

        Route::controller(WithdrawController::class)->group(function () {
            Route::get('withdraw_delete/{id}', 'withdraw_delete')->name('withdraw_delete');
            //Affliate Withdraw
            Route::prefix('affliate')->name('affliate.')->group(function () {
                Route::get('withdraw_log', 'affliate_withdraw_log')->name('withdraw_log');
                Route::get('withdraw_unpaid', 'affliate_withdraw_unpaid')->name('withdraw_unpaid');
                Route::get('withdraw_approved', 'affliate_withdraw_approved')->name('withdraw_approved');
                Route::get('withdraw_declined', 'affliate_withdraw_declined')->name('withdraw_declined');
                Route::get('withdraw_delete/{id}', 'affliate_withdraw_delete')->name('withdraw_delete');
                Route::post('withdraw_approve', 'affliate_withdraw_approve')->name('withdraw_approve');
                Route::post('withdraw_approve_multi', 'affliate_withdraw_approve_multi')->name('withdraw_approve_multi');
                Route::get('withdraw_decline/{id}', 'affliate_withdraw_decline')->name('withdraw_decline');
            });
            //MLM Withdraw
            Route::prefix('mlm')->name('mlm.')->group(function () {
                Route::get('withdraw_log', 'mlm_withdraw_log')->name('withdraw_log');
                Route::get('withdraw_approved', 'mlm_withdraw_approved')->name('withdraw_approved');
                Route::get('withdraw_declined', 'mlm_withdraw_declined')->name('withdraw_declined');
                Route::get('withdraw_unpaid', 'mlm_withdraw_unpaid')->name('withdraw_unpaid');
                Route::get('withdraw_delete/{id}', 'mlm_withdraw_delete')->name('withdraw_delete');
                Route::post('withdraw_approve', 'mlm_withdraw_approve')->name('withdraw_approve');
                Route::post('withdraw_approve_multi', 'mlm_withdraw_approve_multi')->name('withdraw_approve_multi');
                Route::get('withdraw_decline/{id}', 'mlm_withdraw_decline')->name('withdraw_decline');
            });
            //Referral Withdraw
            Route::prefix('referral')->name('ref.')->group(function () {
                Route::get('withdraw_log', 'ref_withdraw_log')->name('withdraw_log');
                Route::get('withdraw_approved', 'ref_withdraw_approved')->name('withdraw_approved');
                Route::get('withdraw_declined', 'ref_withdraw_declined')->name('withdraw_declined');
                Route::get('withdraw_unpaid', 'ref_withdraw_unpaid')->name('withdraw_unpaid');
                Route::get('withdraw_delete/{id}', 'ref_withdraw_delete')->name('withdraw_delete');
                Route::post('withdraw_approve', 'ref_withdraw_approve')->name('withdraw_approve');
                Route::post('withdraw_approve_multi', 'ref_withdraw_approve_multi')->name('withdraw_approve_multi');
                Route::get('withdraw_decline/{id}', 'ref_withdraw_decline')->name('withdraw_decline');
            });
        });
        // //Payment Proof controller
        Route::controller(PaymentProofController::class)->group(function () {
            Route::get('paymentproof-log', 'paymentprooflog')->name('paymentproof.log');
            Route::get('paymentproof-approved', 'paymentproofapproved')->name('paymentproof.approved');
            Route::get('paymentproof-declined', 'paymentproofdeclined')->name('paymentproof.declined');
            Route::get('paymentproof-pending', 'paymentproofpending')->name('paymentproof.pending');
            Route::get('paymentproof/delete/{id}', 'DestroyPaymentProof')->name('paymentproof.delete');
            Route::get('approvepaymentproof/{id}', 'approve')->name('paymentproof.approve');
            Route::post('paymentproof-approve-multi', 'approve_multi')->name('paymentproof.approve_multi');
            Route::get('declinepaymentproof/{id}', 'decline')->name('paymentproof.decline');
        });
        //Blog controller
        Route::controller(BlogController::class)->group(function () {
            Route::get('blog', 'index')->name('blog.index');
            Route::get('blog/create', 'create')->name('blog.create');
            Route::post('blog/create', 'store')->name('blog.store');
            Route::get('/unblog/{id}', 'unblog')->name('blog.unpublish');
            Route::get('/pblog/{id}', 'pblog')->name('blog.publish');
            Route::delete('blog/delete/{id}', 'destroy')->name('blog.destroy');
            Route::get('category/delete/{id}', 'delcategory')->name('blog.delcategory');
            Route::get('blog/edit/{id}', 'edit')->name('blog.edit');
            Route::patch('blog-update/{id}', 'updatePost')->name('blog.update');
        });
        // Web controller
        Route::controller(WebController::class)->group(function () {
            //Review
            Route::get('review', 'review')->name('review');
            Route::post('/createreview', 'CreateReview')->name('createreview');
            Route::post('review/update', 'UpdateReview')->name('review.update');
            Route::get('review/edit/{id}', 'EditReview')->name('review.edit');
            Route::get('review/delete/{id}', 'DestroyReview')->name('review.delete');
            Route::get('/unreview/{id}', 'unreview')->name('review.unpublish');
            Route::get('/preview/{id}', 'preview')->name('review.publish');
            // Terms
            Route::get('terms', 'terms')->name('terms');
            Route::post('terms/update', 'UpdateTerms')->name('update_terms');
            // Privacy Policy
            Route::get('privacy_policy', 'privacypolicy')->name('privacy_policy');
            Route::post('update_privacy_policy', 'UpdatePrivacy')->name('update_privacy_policy');
            // About us
            Route::get('about_us', 'aboutus')->name('about_us');
            Route::post('update_about_us', 'UpdateAbout')->name('update_about_us');
            //FAQ
            Route::get('faq', 'faq')->name('faq');
            Route::post('/createfaq', 'CreateFaq')->name('faq_store');
            Route::put('faq/update', 'UpdateFaq')->name('faq_update');
            Route::delete('faq/delete/{id}', 'DestroyFaq')->name('faq_delete');
            //Social
            Route::post('social-links/update', 'UpdateSocial')->name('social-links.update');
            Route::get('social-links', 'sociallinks')->name('social-links');


            Route::post('/createvendors', 'CreateVendors')->name('vendors.store');
            Route::post('/vendors', 'Vendors')->name('vendors.index');
            // Route::get('coupons', 'coupons')->name('admin.coupons');
            Route::put('vendors/update/{id}', 'UpdateVendors')->name('vendors.update');
            Route::delete('vendors/delete/{id}', 'DestroyVendors')->name('vendors.destroy');
            Route::get('vendors', 'vendors')->name('admin.vendors');
            // Route::post('/createcoupons', 'WebController@CreateCoupons');
            // Route::get('coupons/delete/{id}', 'WebController@DestroyCoupons')->name('coupons.delete');
            // Route::post('coupons/update', 'WebController@UpdateCoupons')->name('coupons.update');


            // Route::post('/createpage', 'WebController@CreatePage');
            // Route::post('page/update', 'WebController@UpdatePage')->name('page.update');
            // Route::get('page/delete/{id}', 'WebController@DestroyPage')->name('page.delete');
            // Route::get('page', 'WebController@page')->name('admin.page');
            // Route::get('/unpage/{id}', 'WebController@unpage')->name('page.unpublish');
            // Route::get('/ppage/{id}', 'WebController@ppage')->name('page.publish');

            // Route::get('currency', 'WebController@currency')->name('admin.currency');
            // Route::get('pcurrency/{id}', 'WebController@pcurrency')->name('blog.publish');

            // Route::get('logo', 'WebController@logo')->name('admin.logo');
            // Route::post('updatelogo', 'WebController@UpdateLogo');
            // Route::post('updatefavicon', 'WebController@UpdateFavicon');

            // Route::get('home-page', 'WebController@homepage')->name('homepage');
            // Route::post('home-page/update', 'WebController@Updatehomepage')->name('homepage.update');
            // Route::post('section1/update', 'WebController@section1');
            // Route::post('section2/update', 'WebController@section2');
            // Route::post('section3/update', 'WebController@section3');
            // Route::post('section4/update', 'WebController@section4');
        });
    });


    // //Setting controller
    // Route::get('settings', 'SettingController@Settings')->name('admin.setting');
    // Route::post('settings', 'SettingController@SettingsUpdate')->name('admin.settings.update');
    // Route::get('email', 'SettingController@Email')->name('admin.email');
    // Route::post('email', 'SettingController@EmailUpdate')->name('admin.email.update');
    // Route::get('sms', 'SettingController@Sms')->name('admin.sms');
    // Route::post('sms', 'SettingController@SmsUpdate')->name('admin.sms.update');
    // Route::post('account', 'SettingController@AccountUpdate')->name('admin.account.update');

    // //User controller
    // Route::get('messages', 'AdminController@Messages')->name('admin.message');
    // Route::get('promo', 'AdminController@Promo')->name('user.promo');
    // Route::post('promo', 'AdminController@Sendpromo')->name('user.promo.send');
    // Route::get('message/delete/{id}', 'AdminController@Destroymessage')->name('message.delete');
    // Route::get('ticket', 'AdminController@Ticket')->name('admin.ticket');
    // Route::get('ticket/delete/{id}', 'AdminController@Destroyticket')->name('ticket.delete');
    // Route::get('close-ticket/delete/{id}', 'AdminController@Closeticket')->name('ticket.close');
    // Route::get('manage-ticket/{id}', 'AdminController@Manageticket')->name('ticket.manage');
    // Route::post('reply-ticket', 'AdminController@Replyticket')->name('ticket.reply');
    // Route::post('update_bank_details', 'AdminController@UpdateBankDetails');
    // Route::get('approve-kyc/{id}', 'AdminController@Approvekyc')->name('admin.approve.kyc');
    // Route::get('reject-kyc/{id}', 'AdminController@Rejectkyc')->name('admin.reject.kyc');
});


// Front routes
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/payment_proof', [FrontendController::class, 'payment_proof'])->name('payment_proof');
Route::get('/upload_proof', [FrontendController::class, 'upload_proof'])->name('upload.proof');
Route::post('/do_upload_proof', [FrontendController::class, 'do_upload_proof'])->name('do_upload_proof');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/terms', [FrontendController::class, 'terms'])->name('terms');
Route::get('/coupon', [FrontendController::class, 'coupon'])->name('code_dispatcher');
Route::get('/topearners', [FrontendController::class, 'topearners'])->name('topearners');
Route::get('/privacy', [FrontendController::class, 'privacy'])->name('privacy');
Route::get('/page/{id}', [FrontendController::class, 'page']);
Route::get('/single/{id}/{slug}', [FrontendController::class, 'article']);
Route::get('/cat/{id}/{slug}', [FrontendController::class, 'category']);
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'contactSubmit']);
Route::post('/about', [FrontendController::class, 'subscribe'])->name('subscribe');
Route::get('/verify/pin', [FrontendController::class, 'verify_pin'])->name('verify_pin');
Route::post('/verify/pin', [FrontendController::class, 'do_verify_pin'])->name('do_verify_pin');

//User Routes

// Route::get('/register', [RegisterController::class, 'register'])->name('register');
// Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::name('user.')->group(function () {
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'do_register'])->name('do_register');
    Route::get('/referral/{username}', [RegisterController::class, 'onboarding'])->name('onboarding');
    Route::post('/referral', [RegisterController::class, 'do_onboarding'])->name('do_onboarding');
    Route::get('/user/verify_email', [UserController::class, 'verify_email'])->name('verify_email');
    Route::get('/user/resend_code', [UserController::class, 'resend_code'])->name('resend_code');
    Route::post('/user/verify_email', [UserController::class, 'do_verify_email'])->name('do_verify_email');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'do_login'])->name('do_login');
    Route::get('/user/account_suspended', [UserController::class, 'account_suspended'])->name('account_suspended');

    Route::get('user/password/reset', [HomeController::class, 'showLinkRequestForm'])->name('password.reset');
    Route::post('user/password/email', [HomeController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('user/password/reset/{token}', [HomeController::class, 'showResetForm'])->name('password.reset_token');
    Route::post('user/password/reset', [HomeController::class, 'reset'])->name('password.do_reset');
    // , 'checkBlockStatus'
    Route::prefix('user')->middleware(['auth:web', 'checkStatus', 'checkBlockStatus'])->group(function () {
        Route::post('blog/earn', [BlogController::class, 'earn'])->name('blog.earn');
        Route::controller(UserController::class)->group(function () {
            Route::get('logout', 'logout')->name('logout');
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::get('profile/edit', 'profile_edit')->name('profile_edit');
            Route::post('profile/update_basic', 'profile_update_basic')->name('profile.update_basic');
            // Route::post('profile/update_avatar', 'profile_update_avatar')->name('profile.update_avatar');
            Route::post('profile/update_bank', 'update_bank_details')->name('profile.update_bank');
            // Route::get('plan/upgrade', 'upgrade_plan')->name('plan.upgrade');
            // Route::post('plan/upgrade', 'do_upgrade_plan')->name('plan.do_upgrade');
            Route::get('password', 'changePassword')->name('password');
            Route::post('password', 'submitPassword')->name('change_password');
            Route::get('digitalskillscourses', 'digitalskillscourses')->name('digitalskillscourses');
            Route::get('latest_sponsored_task', 'latest_sponsored_post')->name('latest_sponsored_post');
            //Withdraw
            Route::get('withdraws', 'withdraw')->name('withdraw');
            Route::post('withdraws', 'withdraw_submit')->name('withdraw_submit');
            //MLM Withdraw
            Route::get('withdraws_ref', 'withdraw_ref')->name('withdraw_ref');
            Route::post('withdraws_ref', 'withdraw_ref_submit')->name('withdraw_ref_submit');
            //MLM Withdraw
            Route::get('withdraws_mlm', 'withdraw_mlm')->name('withdraw_mlm');
            Route::post('withdraws_mlm', 'withdraw_mlm_submit')->name('withdraw_mlm_submit');
            //change pin
            Route::get('pin', 'changePin')->name('pin');
            Route::post('pin', 'submitPin')->name('change_pin');
            //Credit Referral
            Route::post('creditReferralAmount', 'creditReferralAmount')->name('creditReferralAmount');
            //Direct Referrals
            Route::get('/referrals', 'referrals')->name('referral');
        });
        Route::resource('login_logs', LoginLogController::class);
        //Mining
        Route::controller(MineController::class)->group(function () {
            Route::get('/watch-video/page', 'mining_page')->name('mining.page');
            Route::get('/mining/start', 'mining_start')->name('mining.start');
            Route::get('/mining/thankyou', 'mining_thankyou')->name('mining.thankyou');
        });

        Route::post('reactivate_plan', [UserController::class, 'reactivate_plan'])->name('reactivate_plan');

        //Referral
        Route::controller(ReferralController::class)->group(function () {
            // Route::get('/referrals/earning/history', 'earning_history')->name('referrals.earning_history');
            // Route::get('/referrals/convert', 'convert')->name('referrals.convert');
            // Route::post('/referrals/do_convert', 'do_convert')->name('referrals.do_convert');
        });
        //Indirect Referral
        Route::controller(IndirectReferralController::class)->group(function () {
            Route::get('/indirect_referrals', 'index')->name('indirect_referrals.index');
            // Route::get('/indirect_referrals/earning/history', 'earning_history')->name('indirect_referrals.earning_history');
            // Route::get('/indirect_referrals/convert', 'convert')->name('indirect_referrals.convert');
            // Route::post('/indirect_referrals/do_convert', 'do_convert')->name('indirect_referrals.do_convert');
        });
    });
});
