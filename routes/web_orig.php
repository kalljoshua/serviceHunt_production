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

Route::get('/services/{id}/details','User\AdsController@trythis')->name('services.details');

//users routes
	//index routes
Route::get('/','User\HomeController@index')->name('home');
Route::get('contact-us','User\HomeController@contact')->name('user.contact');
Route::get('about-us','User\HomeController@about')->name('user.about');
Route::get('terms-and-conditions','User\HomeController@termsofUse')->name('user.termsofUse');
Route::get('Privacy','User\HomeController@privacy')->name('user.privacy');
Route::get('Personal-Safety','User\HomeController@personalsafety')->name('user.personalsafety');
Route::get('Disclaimer','User\HomeController@disclaimer')->name('user.disclaimer');

	//search routes
Route::get('/search','User\SearchController@search')->name('user.search');

	//review routes
Route::post('review','User\ReviewsController@serviceReview')->name('user.review.submit');

	//authentication routes
Route::post('/user/registration','User\RegisterController@registerUser')->name('user.submit');
Route::post('/login','User\LoginController@login')->name('user.login.submit');
Route::post('/logout','User\LoginController@logout')->name('user.logout');
Route::get('/register','User\RegisterController@userRegister')->name('user.register');
Route::get('/login','User\LoginController@userLogin')->name('user.login');

//User blog routes
Route::get('blog','User\UserBlogPostsController@getAllPosts')->name('user.blog.posts');
Route::get('blog/{slug}','User\UserBlogPostsController@showPost')->name('user.show.posts');
Route::post('comment','User\UserBlogPostsController@postComment')->name('user.comment.submit');

//service routes
Route::get('/user/select-package','User\UserCreateServiceController@showSelectPackage')->name('user.select.package');
Route::get('/user/add-new-service','User\UserCreateServiceController@showNewServiceForm')->name('user.create.service');
Route::post('/user/submit-new-service','User\UserCreateServiceController@createService')->name('user.create.service.submit');
Route::get('/user/add-payment','User\UserCreateServiceController@showPaymentForm')->name('user.payment.form');
Route::post('/user/add-payment','User\UserCreateServiceController@addPayment')->name('user.payment.submit');
Route::get('/user/{id}/edit-service','User\UserCreateServiceController@editServiceForm')->name('user.edit.service');
Route::post('/user/edit-service','User\UserCreateServiceController@submitChanges')->name('user.edit.service.submit');
Route::get('/user/{id}/delete-service','User\UserCreateServiceController@deleteService')->name('user.delete.service');
Route::get('/services','User\ServiceController@getAll')->name('services.all');
Route::get('/services/{id}/category','User\ServiceController@getCategory')->name('services.category');
//Route::get('/services/{id}/details','User\AdsController@trythis')->name('services.details');

//user account
Route::get('/user','User\UserProfileController@showUserProfile')->name('user.profile');
Route::get('/user/{userId}/myads','User\AdsController@myAds')->name('user.myads');
Route::get('/user/{userId}/favourites','User\FavouritesController@myFavourites')->name('user.favourites');
Route::get('/user/{userId}/mysearch','User\UserProfileController@mySearch')->name('user.search');
Route::get('/user/{userId}/archived','User\UserProfileController@showArchived')->name('user.archived');
Route::get('/user/{userId}/pending','User\UserProfileController@pendingAds')->name('user.pending');
Route::post('/user_data','User\UserProfileController@addUserProfileData')->name('user.profile_data');
Route::post('/user/edit','User\UserProfileController@userEditSubmit')->name('user.edit.submit');
Route::post('/user/update','User\UserProfileController@userUpdatePassword')->name('user.update.submit');
Route::get('/user/company','User\CompanyController@newCompany')->name('company.create');
Route::post('/user/company','User\CompanyController@postCompany')->name('company.submit');
Route::get('/user/packages','User\PackageSubsriptionController@showPackages')->name('user.package');
Route::post('/user/select-package','User\PackageSubsriptionController@addPackage')->name('user.select.package.submit');



//newsletter routes
Route::post('/subscribe-to-newsletter','User\NewsletterController@subscribe')->name('subscribe.to.newsletter');


//Socialite logins
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//ajax routes
Route::get('submission/getSubCategories/{id}', 'SubmissionController@getSubCategories');
Route::get('loadsubcat/{id}','SubmissionController@secondMethod');

Route::get('ajax-category-subcategory',function(Request $request){

 $cat_id = $request::input(['cat_id']);

 $subcategories=\App\SubCategory::where('category_id','=',$cat_id)->get();

 return Response::json($subcategories);

});

//multiple file upload with dropzone routes
Route::get('/multi-upload','User\UserCreateServiceController@multi_upload_form')->name('post.upload.form');
Route::post('/multi-pload','User\UserCreateServiceController@post_upload')->name('post.upload');
Route::post('/multi-upld','User\UserCreateServiceController@upld')->name('post.upld');



/*
* Begining of Admin routes
*/
	//login routes
Route::get('/admin', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin','Admin\AdminLoginController@login')->name('admin.login.submit');
Route::post('/admin/logout','Admin\AdminLoginController@logout')->name('admin.logout');

	//dashboard routes
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', 'Admin\AdminDashboard@index')->name('admin.dashboard');
    Route::get('/admin/users', 'Admin\AdminUsersController@getAllUsers')->name('admin.user.list');
    Route::get('/admin/users/{id}', 'Admin\AdminUsersController@showUser')->name('admin.user');
    Route::get('/admin/users/{id}/edit', 'Admin\AdminUsersController@editUser')->name('admin.user.edit.form');
    Route::post('/admin/users/save', 'Admin\AdminUsersController@save')->name('admin.user.edit.submit');
    Route::get('/admin/users/{id}/delete', 'Admin\AdminUsersController@delete')->name('admin.user.delete');
    Route::post('/admin/users/delete', 'Admin\AdminUsersController@destroy')->name('admin.user.destroy');

    //servises routes
    Route::get('/admin/services', 'Admin\AdminServicesController@showAll')->name('admin.all.services');
    Route::get('/admin/suspended/services', 'Admin\AdminServicesController@suspended')->name('admin.suspended.services');
    Route::get('/admin/pending/services', 'Admin\AdminServicesController@pending')->name('admin.pending.services');
    Route::get('/admin/service/{id}/approve','Admin\AdminServicesController@approveService')->name('admin.service.approve');
    Route::get('/admin/service/{id}','Admin\AdminServicesController@getService')->name('admin.service.show');
    Route::get('/admin/service/{id}/delete','Admin\AdminServicesController@delete')->name('admin.service.delete');
    Route::post('/admin/service/delete','Admin\AdminServicesController@destroy')->name('admin.service.destroy');

    //types routes
    Route::get('/admin/types', 'Admin\AdminTypesController@showAll')->name('admin.all.types');
    Route::get('/admin/type/new', 'Admin\AdminTypesController@typeForm')->name('admin.new.type');
    Route::post('/admin/type', 'Admin\AdminTypesController@submitType')->name('admin.new.type.submit');
    Route::get('/admin/type/{id}/edit','Admin\AdminTypesController@edit')->name('admin.type.edit');
    Route::post('/admin/type/edit','Admin\AdminTypesController@editSubmit')->name('admin.type.edit.submit');
    Route::get('/admin/type/{id}/delete','Admin\AdminTypesController@delete')->name('admin.type.delete');
    Route::post('/admin/type/delete','Admin\AdminTypesController@destroy')->name('admin.type.destroy');

    //Admin news letter routes
    Route::get('/admin/news-letters','Admin\AdminNewsLetterController@createNewsLetter')->name('admin.create.news.letter.form');
    Route::post('/admin/news-letters','Admin\AdminNewsLetterController@saveNewsLetter')->name('admin.create.news.letter.submit');
    Route::get('/admin/subscribers','Admin\AdminNewsLetterSubscribersController@getSubscribers')->name('admin.subscribers.listings');

    //Categories routes
    Route::get('/admin/all-categories', 'Admin\AdminCategoriesController@showAll')->name('admin.all.categories');
    Route::get('/admin/categories', 'Admin\AdminCategoriesController@categoriesForm')->name('admin.new.category');
    Route::post('/admin/categories', 'Admin\AdminCategoriesController@submitCategory')->name('admin.new.category.submit');
    Route::get('/admin/category/{id}/edit','Admin\AdminCategoriesController@edit')->name('admin.category.edit');
    Route::post('/admin/category/edit','Admin\AdminCategoriesController@editSubmit')->name('admin.category.edit.submit');
    Route::get('/admin/category/{id}/delete','Admin\AdminCategoriesController@delete')->name('admin.category.delete');
    Route::post('/admin/category/delete','Admin\AdminCategoriesController@destroy')->name('admin.category.destroy');

    //Sub-Categories routes
    Route::get('/admin/all-sub-categories', 'Admin\AdminSubCategoriesController@showAll')->name('admin.all.subcategories');
    Route::get('/admin/sub-categories', 'Admin\AdminSubCategoriesController@subcategoriesForm')->name('admin.new.subcategory');
    Route::post('/admin/sub-categories', 'Admin\AdminSubCategoriesController@submitCategory')->name('admin.new.subcategory.submit');
    Route::get('/admin/sub-category/{id}/edit','Admin\AdminSubCategoriesController@edit')->name('admin.subcategory.edit');
    Route::post('/admin/sub-category/edit','Admin\AdminSubCategoriesController@editSubmit')->name('admin.subcategory.edit.submit');
    Route::get('/admin/sub-category/{id}/delete','Admin\AdminSubCategoriesController@delete')->name('admin.subcategory.delete');
    Route::post('/admin/sub-category/delete','Admin\AdminSubCategoriesController@destroy')->name('admin.subcategory.destroy');

    //Suspend service
    Route::get('/admin/suspend-service','Admin\AdminSuspendServicesController@suspendService')->name('suspend.service');
    Route::get('/admin/get-suspended-services','Admin\AdminSuspendServicesController@getSuspendedServices')->name('suspended.services');
    Route::get('/admin/service/{id}/unsuspend','Admin\AdminSuspendServicesController@unsuspendService')->name('admin.service.unsuspend');

    //Feature Service
    Route::get('/admin/feature-service','Admin\AdminFeatureServicesController@featureService')->name('feature.service');
    Route::get('/admin/get-featured-services','Admin\AdminFeatureServicesController@getFeatured')->name('featured.services');





    //image resize handling method
    Route::get('/resize-service', function()
{

    ini_set('memory_limit','256M');
    ini_set('max_execution_time', 600);
    for($i = 1;$i<=20;$i++){
        $image_path = public_path().'/uploads/h'.$i.'.jpeg';

        Image::make($image_path)
            ->resize(99, 99)
            ->save(public_path().'/images/services/bottom_slider_99x99/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(370, 202)
            ->save(public_path().'/images/services/featured_slider_370x202/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(355, 240)
            ->save(public_path().'/images/services/latest_home_and_best_services_355x240/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(50, 50)
            ->save(public_path().'/images/services/latest_reviews_50x50/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(100, 75)
            ->save(public_path().'/images/services/others_100x75/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(370, 370)
            ->save(public_path().'/images/services/our_location_370x370/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(770, 370)
            ->save(public_path().'/images/services/our_location_770x370/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(2000, 440)
            ->save(public_path().'/images/services/parallax_banner_2000x1440/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(364, 244)
            ->save(public_path().'/images/services/service_listing_364x244/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(1170, 600)
            ->save(public_path().'/images/services/single_service_1170x600/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(150, 110)
            ->save(public_path().'/images/services/user_services_150x110/h'.$i.'.jpeg');

    }

});


Route::get('/resize-user', function()
{

    ini_set('memory_limit','256M');
    ini_set('max_execution_time', 600);
    for($i = 1;$i<=20;$i++){
        $image_path = public_path().'/uploads/users/a'.$i.'.jpg';

        Image::make($image_path)
            ->resize(239, 239)
            ->save(public_path().'/images/users/all_user_239x239/a'.$i.'.jpg');

        Image::make($image_path)
            ->resize(74, 74)
            ->save(public_path().'/images/users/contact_user_74x74/a'.$i.'.jpg');

        Image::make($image_path)
            ->resize(71, 71)
            ->save(public_path().'/images/users/home_71x71/a'.$i.'.jpg');

        Image::make($image_path)
            ->resize(330, 330)
            ->save(public_path().'/images/users/profile_330x330/a'.$i.'.jpg');

    }

});

Route::get('/resize-misc', function()
{

    ini_set('memory_limit','256M');
    ini_set('max_execution_time', 600);
    for($i = 1;$i<=5;$i++){
        $image_path = public_path().'/uploads/locations/l'.$i.'.jpeg';

        Image::make($image_path)
            ->resize(770, 370)
            ->save(public_path().'/images/misc/locations/loc_770x370/l'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(370, 370)
            ->save(public_path().'/images/misc/locations/loc_370x370/l'.$i.'.jpeg');

    }

});

Route::get('/resize-banner', function()
{

    ini_set('memory_limit','256M');
    ini_set('max_execution_time', 600);
    for($i = 1;$i<=5;$i++){
        $image_path = public_path().'/uploads/banner/b'.$i.'.jpeg';

        Image::make($image_path)
            ->resize(1423, 603)
            ->save(public_path().'/images/banner/banner_1423x603/b'.$i.'.jpeg');

    }

});

});
