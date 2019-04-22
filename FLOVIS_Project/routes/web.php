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

/*トップ*/
Route::get('flovis/','MainController@flovis')->name('home');


/*問い合わせ*/
/*入力フォーム*/
Route::get('flovis/contact/','ContactController@form')->name('contact.form');
/*送信完了画面*/
Route::post('flovis/contact/finish','ContactController@store')->name('contact.store');


/*パスワードリセット*/
Route::get('password_reset','MainController@password_reset')->name('password_reset');



Route::get('contact_finish','MainController@contact_finish');

/*FAQ*/
Route::get('flovis/FAQ','MainController@FAQ')->name('FAQ');



//ログイン
Route::get('flovis/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('flovis/login', 'Auth\LoginController@login');
Route::post('flovis/logout', 'Auth\LoginController@logout')->name('logout');

//新規会員登録
Route::get('flovis/register', 'Auth\RegisterController@showRegistrationForm')->name('registerForm');
Route::post('flovis/register/Confirm','Auth\RegisterController@confirmRegister')->name('registerConfirm');
Route::post('flovis/register', 'Auth\RegisterController@register')->name('register');

//パスワード再設定
Route::get('flovis/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('flovis/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('flovis/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('flovis/password/reset', 'Auth\ResetPasswordController@reset');



/*商品一覧*/
Route::get('flovis/productList/','ShowController@sort')->name('sort');
//Route::get('flovis/productList/','ShowController@list');

/*商品詳細*/
Route::get('flovis/productList/{id}','ShowController@detail');


Route::group(['middleware' => 'auth'], function() {

    /*商品レビュー*/
    Route::post('flovis/productList/store','CommentController@comments')->name('comment');
});




/*プロフィール編集*/
Route::group(['middleware' => 'auth'], function() {

    /*住所登録*/
    Route::get('flovis/profile/address/registerForm/','AddressController@form')->name('address.form');
    Route::post('flovis/profile/address/confirm/','AddressController@confirm')->name('address.confirm');
    Route::post('flovis/profile/address/register','AddressController@store')->name('address.store');




    /*プロフィール表示*/
    Route::get('flovis/profile/','UpdateProfileController@showProfile')->name('profile');

    /*プロフィール編集form*/
    Route::get('flovis/profile/updateForm/','UpdateProfileController@updateform')->name('loginUpdate.form');

    /*プロフィールconfirm*/
    Route::post(



        'flovis/profile/updateConfirm/','UpdateProfileController@accountConfirm')->name('loginUpdate.confirm');

    /*プロフィール登録処理*/
//    Route::post('flovis/profile/update/','UpdateProfileController@store')->name('profile.update');

    Route::post('flovis/profile/pass','UpdateProfileController@passUpdate')->name('pass');

    Route::post('flovis/profile/update/','UpdateProfileController@profileUpdate')->name('update');

    /*プロフィールfinish*/
    Route::post('flovis/profile/update/finish','UpdateProfileController@accountStore')->name('loginUpdate.finish');

    /*登録住所編集form*/
    Route::get('flovis/profile/addressUpdateForm/','UpdateProfileController@addressUpdateForm')->name('addressUpdate.form');

    /*登録住所確認*/
    Route::post('flovis/profile/addressUpdateConfirm','UpdateProfileController@addressUpdateConfirm')->name('addressUpdate.confirm');

    /*登録住所変更完了*/
    Route::post('flovis/profile/addressUpdateFinish','UpdateProfileController@addressUpdateFinish')->name('addressUpdate.finish');

    /*退会*/
    Route::get('/flovis/profile/delete', 'UpdateProfileController@delete')->name('profile.delete');

});





/*カート*/
Route::get('flovis/cart/','CartController@cart')->name('cart');
/*カート追加*/
Route::post('flovis/productList/{id}/','CartController@store')->name('cart.store');
/*カート削除*/
Route::post('flovis/cart/','CartController@delete')->name('cart.delete');
/*カート数量変更*/
Route::get('flovis/cart/update','CartController@update')->name('cart.update');

/*お会計*/
Route::group(['middleware' => 'auth'], function() {



    /*商品レビュー*/
//    Route::post('flovis/productList/{id}','ShowController@productComments')->name('comments');


    /*注文履歴*/
    Route::get('flovis/history','OrderController@index')->name('orderhistory');


    /*決済*/
    /*ユーザ情報確認*/
    Route::get('flovis/cart/buy/','TreasurerController@userconfirm')->name('buy.user.zip');
    Route::post('flovis/cart/buy/addressRegister','TreasurerController@Store')->name('buy.user.info');

    /*住所登録*/
    Route::post('flovis/cart/buy/addrStore','TreasurerController@addrStore')->name('buy.user.addrStore');
    /*クレカ登録*/
    Route::post('flovis/cart/buy/creditStore','TreasurerController@creditStore')->name('buy.user.creditStore');



    /*カード情報確認*/
    Route::post('flovis/cart/buy/cardConfirm','TreasurerController@card')->name('buy.user.card');

    /*注文情報最終確認*/
    Route::post('flovis/cart/buy/orderconfirm','TreasurerController@lastconfirm')->name('buy.user.lastconfirm');

    /*商品削除*/
    Route::post('flovis/cart/buy/orderconfirm/delete','TreasurerController@delete')->name('product.delete');

    /*数量変更*/
    Route::post('flovis/cart/buy/orderconfirm/update','TreasurerController@update')->name('product.update');

    /*注文完了*/
    Route::post('flovis/cart/buy/orderconfirm/finish','TreasurerController@orderfinish')->name('buy.user.finish');


    /*クレジットカード*/
    Route::get('flovis/creditcard/','CreditcardController@cardInfo')->name('card');

    Route::get('flovis/creditcard/register/','CreditcardController@registerForm')->name('creditcard.form');
    Route::post('flovis/creditcard/register/','CreditcardController@store')->name('card.store');
    Route::post('flovis/creditcard/confirm/','CreditcardController@confirm')->name('card.confirm');
    Route::post('flovis/creditcard/register/fin','CreditcardController@fin')->name('card.fin');

    /*クレジットカード削除*/
    Route::get('flovis/creditcard/destroy','CreditcardController@destroy')->name('card.delete');


    /*アップデートフォーム*/
    Route::get('flovis/creditcard/change/','CreditcardController@change')->name('card.update.form');
    /*セッション保存*/
    Route::post('flovis/creditcard/change/store','CreditcardController@updateStore')->name('card.update.store');
    /*確認ページ*/
    Route::post('flovis/creditcard/change/confirm','CreditcardController@updateConfirm')->name('card.update.confirm');
    /*アップデート処理*/
    Route::post('flovis/creditcard/change/','CreditcardController@update')->name('card.update.complete');

});


Route::get('flovis/search/','SearchController@getindex')->name('index');



