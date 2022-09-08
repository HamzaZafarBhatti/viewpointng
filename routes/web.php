<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\SettingController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/', 'AdminLoginController@index')->name('admin.loginForm');
//     Route::post('/', 'AdminLoginController@authenticate')->name('admin.login');
// });

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
    });
    // //Data Operator Controller
    // Route::get('/data_operators', 'AdminController@data_operators')->name('admin.data_operators');
    // Route::post('/data_operator_store', 'AdminController@data_operator_store')->name('admin.data_operator.store');
    // Route::get('data_operator/{id}', 'AdminController@data_operator_edit')->name('admin.data_operator.edit');
    // Route::post('data_operator', 'AdminController@data_operator_update')->name('admin.data_operator.update');
    // //Blog controller
    // Route::post('/createcategory', 'PostController@CreateCategory');
    // Route::post('/updatecategory', 'PostController@UpdateCategory');
    // Route::get('/post-category', 'PostController@category')->name('admin.cat');
    // Route::get('/unblog/{id}', 'PostController@unblog')->name('blog.unpublish');
    // Route::get('/pblog/{id}', 'PostController@pblog')->name('blog.publish');
    // Route::get('blog', 'PostController@index')->name('admin.blog');
    // Route::get('blog/create', 'PostController@create')->name('blog.create');
    // Route::post('blog/create', 'PostController@store')->name('blog.store');
    // Route::get('blog/delete/{id}', 'PostController@destroy')->name('blog.delete');
    // Route::get('category/delete/{id}', 'PostController@delcategory')->name('blog.delcategory');
    // Route::get('blog/edit/{id}', 'PostController@edit')->name('blog.edit');
    // Route::post('blog-update', 'PostController@updatePost')->name('blog.update');

    // //Web controller
    // Route::post('social-links/update', 'WebController@UpdateSocial')->name('social-links.update');
    // Route::get('social-links', 'WebController@sociallinks')->name('social-links');

    // Route::post('about-us/update', 'WebController@UpdateAbout')->name('about-us.update');
    // Route::get('about-us', 'WebController@aboutus')->name('about-us');

    // Route::post('privacy-policy/update', 'WebController@UpdatePrivacy')->name('privacy-policy.update');
    // Route::get('privacy-policy', 'WebController@privacypolicy')->name('privacy-policy');

    // Route::post('terms/update', 'WebController@UpdateTerms')->name('terms.update');
    // Route::get('terms', 'WebController@terms')->name('admin.terms');

    // Route::post('/createvendors', 'WebController@CreateVendors');
    // //Route::post('/vendors', 'WebController@Vendors');   
    // Route::get('coupons', 'WebController@coupons')->name('admin.coupons');
    // Route::post('/createfaq', 'WebController@CreateFaq');
    // Route::post('faq/update', 'WebController@UpdateFaq')->name('faq.update');
    // Route::get('faq/delete/{id}', 'WebController@DestroyFaq')->name('faq.delete');
    // Route::get('faq', 'WebController@faq')->name('admin.faq');
    // Route::post('vendors/update', 'WebController@UpdateVendors')->name('vendors.update');
    // Route::post('vendors/delete/{id}', 'WebController@DestroyVendors')->name('vendors.delete');
    // Route::get('vendors', 'WebController@vendors')->name('admin.vendors');
    // Route::post('/createcoupons', 'WebController@CreateCoupons');
    // Route::get('coupons/delete/{id}', 'WebController@DestroyCoupons')->name('coupons.delete');
    // Route::post('coupons/update', 'WebController@UpdateCoupons')->name('coupons.update');


    // Route::post('/createservice', 'WebController@CreateService');
    // Route::post('service/update', 'WebController@UpdateService')->name('service.update');
    // Route::get('service/delete/{id}', 'WebController@DestroyService')->name('service.delete');
    // Route::get('service', 'WebController@services')->name('admin.service');

    // Route::post('/createpage', 'WebController@CreatePage');
    // Route::post('page/update', 'WebController@UpdatePage')->name('page.update');
    // Route::get('page/delete/{id}', 'WebController@DestroyPage')->name('page.delete');
    // Route::get('page', 'WebController@page')->name('admin.page');
    // Route::get('/unpage/{id}', 'WebController@unpage')->name('page.unpublish');
    // Route::get('/ppage/{id}', 'WebController@ppage')->name('page.publish');

    // Route::post('/createreview', 'WebController@CreateReview');
    // Route::post('review/update', 'WebController@UpdateReview')->name('review.update');
    // Route::get('review/edit/{id}', 'WebController@EditReview')->name('review.edit');
    // Route::get('review/delete/{id}', 'WebController@DestroyReview')->name('review.delete');
    // Route::get('review', 'WebController@review')->name('admin.review');
    // Route::get('/unreview/{id}', 'WebController@unreview')->name('review.unpublish');
    // Route::get('/preview/{id}', 'WebController@preview')->name('review.publish');

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

    // //Withdrawal controller
    // Route::get('withdraw-log', 'WithdrawController@withdrawlog')->name('admin.withdraw.log');
    // Route::get('withdraw-approved', 'WithdrawController@withdrawapproved')->name('admin.withdraw.approved');
    // Route::get('withdraw-declined', 'WithdrawController@withdrawdeclined')->name('admin.withdraw.declined');
    // Route::get('withdraw-unpaid', 'WithdrawController@withdrawunpaid')->name('admin.withdraw.unpaid');
    // Route::get('withdraw/delete/{id}', 'WithdrawController@DestroyWithdrawal')->name('withdraw.delete');
    // Route::get('approvewithdraw/{id}', 'WithdrawController@approve')->name('withdraw.approve');
    // Route::post('withdraw-approve-multi', 'WithdrawController@approve_multi')->name('admin.withdraw.approve_multi');
    // Route::post('approvewithdrawmine', 'WithdrawController@approvemine')->name('withdraw.approvemine');
    // Route::get('declinewithdraw/{id}', 'WithdrawController@decline')->name('withdraw.declined');
    // //Data Withdrawal controller
    // Route::get('data_withdraw-log', 'WithdrawController@data_withdrawlog')->name('admin.data_withdraw.log');
    // Route::get('data_withdraw-approved', 'WithdrawController@data_withdrawapproved')->name('admin.data_withdraw.approved');
    // Route::get('data_withdraw-declined', 'WithdrawController@data_withdrawdeclined')->name('admin.data_withdraw.declined');
    // Route::get('data_withdraw-unpaid', 'WithdrawController@data_withdrawunpaid')->name('admin.data_withdraw.unpaid');
    // Route::get('data_withdraw/delete/{id}', 'WithdrawController@DestroyDataWithdrawal')->name('data_withdraw.delete');
    // Route::get('approvedata_withdraw/{id}', 'WithdrawController@dataapprove')->name('data_withdraw.approve');
    // Route::post('data_withdraw-approve-multi', 'WithdrawController@dataapprove_multi')->name('admin.data_withdraw.approve_multi');
    // Route::post('approvedata_withdrawmine', 'WithdrawController@dataapprovemine')->name('data_withdraw.approvemine');
    // Route::get('declinedata_withdraw/{id}', 'WithdrawController@datadecline')->name('data_withdraw.declined');
    // //Selfcashout controller
    // Route::get('selfcashout-log', 'SelfcashoutController@selfcashoutlog')->name('admin.selfcashout.log');
    // Route::get('selfcashout-approved', 'SelfcashoutController@selfcashoutapproved')->name('admin.selfcashout.approved');
    // Route::get('selfcashout-declined', 'SelfcashoutController@selfcashoutdeclined')->name('admin.selfcashout.declined');
    // Route::get('selfcashout-unpaid', 'SelfcashoutController@selfcashoutunpaid')->name('admin.selfcashout.unpaid');
    // Route::get('selfcashout/delete/{id}', 'SelfcashoutController@DestroySelfcashout')->name('selfcashout.delete');
    // Route::get('approveselfcashout/{id}', 'SelfcashoutController@approve')->name('selfcashout.approve');
    // Route::post('selfcashout-approve-multi', 'SelfcashoutController@approve_multi')->name('admin.selfcashout.approve_multi');
    // Route::get('declineselfcashout/{id}', 'SelfcashoutController@decline')->name('selfcashout.declined');
    // //Payment Proof controller
    // Route::get('paymentproof-log', 'PaymentProofController@paymentprooflog')->name('admin.paymentproof.log');
    // Route::get('paymentproof-approved', 'PaymentProofController@paymentproofapproved')->name('admin.paymentproof.approved');
    // Route::get('paymentproof-declined', 'PaymentProofController@paymentproofdeclined')->name('admin.paymentproof.declined');
    // Route::get('paymentproof-pending', 'PaymentProofController@paymentproofpending')->name('admin.paymentproof.pending');
    // Route::get('paymentproof/delete/{id}', 'PaymentProofController@DestroyPaymentProof')->name('paymentproof.delete');
    // Route::get('approvepaymentproof/{id}', 'PaymentProofController@approve')->name('paymentproof.approve');
    // Route::post('paymentproof-approve-multi', 'PaymentProofController@approve_multi')->name('admin.paymentproof.approve_multi');
    // Route::get('declinepaymentproof/{id}', 'PaymentProofController@decline')->name('paymentproof.declined');

    // //Deposit controller
    // Route::get('deposit-log', 'DepositController@depositlog')->name('admin.deposit.log');
    // Route::get('deposit-method', 'DepositController@depositmethod')->name('admin.deposit.method');
    // Route::post('storegateway', 'DepositController@store');
    // Route::get('deposit-approved', 'DepositController@depositapproved')->name('admin.deposit.approved');
    // Route::get('deposit-pending', 'DepositController@depositpending')->name('admin.deposit.pending');
    // Route::get('deposit-declined', 'DepositController@depositdeclined')->name('admin.deposit.declined');
    // Route::get('deposit/delete/{id}', 'DepositController@DestroyDeposit')->name('deposit.delete');
    // Route::get('approvedeposit/{id}', 'DepositController@approve')->name('deposit.approve');
    // Route::get('declinedeposit/{id}', 'DepositController@decline')->name('deposit.decline');

    // //Py scheme controller
    // Route::get('py-completed', 'PyschemeController@Completed')->name('admin.py.completed');
    // Route::get('py-pending', 'PyschemeController@Pending')->name('admin.py.pending');
    // Route::get('py-plans', 'PyschemeController@Plans')->name('admin.py.plans');
    // Route::get('py/delete/{id}', 'PyschemeController@Destroy')->name('py.delete');
    // Route::get('py-plan/delete/{id}', 'PyschemeController@PlanDestroy')->name('py.plan.delete');
    // Route::get('py-plan-create', 'PyschemeController@Create')->name('admin.plan.create');
    // Route::post('py-plan-create', 'PyschemeController@Store')->name('admin.plan.store');
    // Route::get('py-plan/{id}', 'PyschemeController@Edit')->name('admin.plan.edit');
    // Route::post('py-plan-edit', 'PyschemeController@Update')->name('admin.plan.update');
    // Route::get('py-generate-plan-coupons', 'PyschemeController@generate_coupons')->name('admin.plan.generate_coupons');
    // Route::get('py-download-plan-coupons', 'PyschemeController@download_codes')->name('admin.plan.download_codes');
    // Route::post('py-generate-plan-coupons', 'PyschemeController@do_generate_coupons')->name('admin.plan.do_generate_coupons');

    // //Setting controller
    // Route::get('settings', 'SettingController@Settings')->name('admin.setting');
    // Route::post('settings', 'SettingController@SettingsUpdate')->name('admin.settings.update');
    // Route::get('email', 'SettingController@Email')->name('admin.email');
    // Route::post('email', 'SettingController@EmailUpdate')->name('admin.email.update');
    // Route::get('sms', 'SettingController@Sms')->name('admin.sms');
    // Route::post('sms', 'SettingController@SmsUpdate')->name('admin.sms.update');
    // Route::post('account', 'SettingController@AccountUpdate')->name('admin.account.update');

    // //Transfer controller
    // Route::get('transfers', 'TransferController@Transfers')->name('admin.transfers');
    // Route::get('referrals', 'TransferController@Referrals')->name('admin.referrals');

    // //User controller
    // Route::get('users', 'AdminController@Users')->name('admin.users');
    // Route::get('messages', 'AdminController@Messages')->name('admin.message');
    // Route::get('unblock-user/{id}', 'AdminController@Unblockuser')->name('user.unblock');
    // Route::get('block-user/{id}', 'AdminController@Blockuser')->name('user.block');
    // Route::get('manage-user/{id}', 'AdminController@Manageuser')->name('user.manage');
    // Route::get('user/delete/{id}', 'AdminController@Destroyuser')->name('user.delete');
    // Route::get('email/{id}/{name}', 'AdminController@Email')->name('user.email');
    // Route::post('email_send', 'AdminController@Sendemail')->name('user.email.send');
    // Route::get('promo', 'AdminController@Promo')->name('user.promo');
    // Route::post('promo', 'AdminController@Sendpromo')->name('user.promo.send');
    // Route::get('message/delete/{id}', 'AdminController@Destroymessage')->name('message.delete');
    // Route::get('ticket', 'AdminController@Ticket')->name('admin.ticket');
    // Route::get('ticket/delete/{id}', 'AdminController@Destroyticket')->name('ticket.delete');
    // Route::get('close-ticket/delete/{id}', 'AdminController@Closeticket')->name('ticket.close');
    // Route::get('manage-ticket/{id}', 'AdminController@Manageticket')->name('ticket.manage');
    // Route::post('reply-ticket', 'AdminController@Replyticket')->name('ticket.reply');
    // Route::post('profile-update', 'AdminController@Profileupdate');
    // Route::post('profile-update-pin', 'AdminController@Profileupdatepin');
    // Route::post('update_bank_details', 'AdminController@UpdateBankDetails');
    // Route::get('approve-kyc/{id}', 'AdminController@Approvekyc')->name('admin.approve.kyc');
    // Route::get('reject-kyc/{id}', 'AdminController@Rejectkyc')->name('admin.reject.kyc');
});
