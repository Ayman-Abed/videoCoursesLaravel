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

Route::get('/', "UIController@index")->name("UI.index");
Route::get('/category/{id}', "UIController@category")->name("UI.category");
Route::get('/skill/{id}', "UIController@skill")->name("UI.skill");
Route::get('/video/{id}', "UIController@video")->name("UI.video");
Route::get('/tag/{id}', "UIController@tag")->name("UI.tag");
Route::get('/{slug}', "UIController@page")->name("UI.page");

Route::POST('/search', "UIController@search")->name("UI.search");

Route::get('/profile/{email}', "ProfileController@profile")->name("UI.profile");
Route::POST('/updateProfile/{email}', "ProfileController@updateProfile")->name("UI.updateProfile");



Route::group(['prefix' => 'admin', 'moddleware' => 'auth'], function () {



    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get("dashboard", "DashboardController@index")->name("dashboard.index");

    // Users
    Route::get("user/users", "userController@index")->name("users.index");
    Route::get("user/addUser", "userController@create")->name("users.addUser");
    Route::POST("user/store", "userController@store")->name("users.store");
    Route::get("user/editUser/{id}", "userController@edit")->name("users.edit");
    Route::POST("user/update/{id}", "userController@update")->name("users.update");


    // For store All student Deleted
    Route::get('user/trashed', 'UserController@trashed')->name('user.trashed');
    // For Restor student
    Route::get('user/restore/{id}', 'UserController@restore')->name('user.restore');
    // For Final Delete student
    Route::get('user/hdelete/{id}', 'UserController@hdelete')->name('user.hdelete');
    Route::get('user/deleteUser/{id}', 'UserController@destroy')->name('user.deleteUser');





    // Category

    Route::get("category/categories", "CategoryController@index")->name("category.index");
    Route::get("category/addCategory", "CategoryController@create")->name("category.addCategory");
    Route::POST("category/storeCategory", "CategoryController@store")->name("category.store");
    Route::get("category/editCategory/{id}", "CategoryController@edit")->name("category.edit");
    Route::POST("category/updateCategory/{id}", "CategoryController@update")->name("category.update");
    // For store All student Deleted
    Route::get('category/trashed', 'CategoryController@trashed')->name('category.trashed');
    // For Restor student
    Route::get('category/restore/{id}', 'CategoryController@restore')->name('category.restore');
    // For Final Delete student
    Route::get('category/hdelete/{id}', 'CategoryController@hdelete')->name('category.hdelete');
    Route::get('category/deleteCategory/{id}', 'CategoryController@destroy')->name('category.deleteCategory');









    // Skills

    Route::get("skill/skills", "SkillController@index")->name("skill.index");
    Route::get("skill/addSkill", "SkillController@create")->name("skill.addSkill");
    Route::POST("skill/storeSkill", "SkillController@store")->name("skill.store");
    Route::get("skill/editSkill/{id}", "SkillController@edit")->name("skill.edit");
    Route::POST("skill/updateSkill/{id}", "SkillController@update")->name("skill.update");
    // For store All student Deleted
    Route::get('skill/trashed', 'SkillController@trashed')->name('skill.trashed');
    // For Restor student
    Route::get('skill/restore/{id}', 'SkillController@restore')->name('skill.restore');
    // For Final Delete student
    Route::get('skill/hdelete/{id}', 'SkillController@hdelete')->name('skill.hdelete');
    Route::get('skill/deleteSkill/{id}', 'SkillController@destroy')->name('skill.deleteSkill');






    // Tags

    Route::get("tag/tags", "TagController@index")->name("tag.index");
    Route::get("tag/addTag", "TagController@create")->name("tag.addTag");
    Route::POST("tag/storeTag", "TagController@store")->name("tag.store");
    Route::get("tag/editTag/{id}", "TagController@edit")->name("tag.edit");
    Route::POST("tag/updateTag/{id}", "TagController@update")->name("tag.update");
    // For store All student Deleted
    Route::get('tag/trashed', 'TagController@trashed')->name('tag.trashed');
    // For Restor student
    Route::get('tag/restore/{id}', 'TagController@restore')->name('tag.restore');
    // For Final Delete student
    Route::get('tag/hdelete/{id}', 'TagController@hdelete')->name('tag.hdelete');
    Route::get('tag/deleteTag/{id}', 'TagController@destroy')->name('tag.deleteTag');



    // Pages

    Route::get("page/pages", "PageController@index")->name("page.index");
    Route::get("page/addPage", "PageController@create")->name("page.addPage");
    Route::POST("page/storePage", "PageController@store")->name("page.store");
    Route::get("page/editPage/{id}", "PageController@edit")->name("page.edit");
    Route::POST("page/updatePage/{id}", "PageController@update")->name("page.update");
    // For store All student Deleted
    Route::get('page/trashed', 'PageController@trashed')->name('page.trashed');
    // For Restor student
    Route::get('page/restore/{id}', 'PageController@restore')->name('page.restore');
    // For Final Delete student
    Route::get('page/hdelete/{id}', 'PageController@hdelete')->name('page.hdelete');
    Route::get('page/deletePage/{id}', 'PageController@destroy')->name('page.deletePage');





    // Videos

    Route::get("video/videos", "VideoController@index")->name("video.index");
    Route::get("video/addVideo", "VideoController@create")->name("video.addVideo");
    Route::POST("video/storeVideo", "VideoController@store")->name("video.store");
    Route::get("video/editVideo/{id}", "VideoController@edit")->name("video.edit");
    Route::POST("video/updateVideo/{id}", "VideoController@update")->name("video.update");
    // For store All student Deleted
    Route::get('video/trashed', 'VideoController@trashed')->name('video.trashed');
    // For Restor student
    Route::get('video/restore/{id}', 'VideoController@restore')->name('video.restore');
    // For Final Delete student
    Route::get('video/hdelete/{id}', 'VideoController@hdelete')->name('video.hdelete');
    Route::get('video/deleteVideo/{id}', 'VideoController@destroy')->name('video.deleteVideo');


    Route::get("video/published/{id}", "VideoController@published")->name("video.published");
    Route::get("video/notPublished/{id}", "VideoController@notPublished")->name("video.notPublished");





    // comments

    Route::get("comment/comments", "CommentController@index")->name("comment.index");
    // For store All student Deleted


    Route::POST('comment/store', 'CommentController@store')->name('comment.store');

    Route::get('comment/trashed', 'CommentController@trashed')->name('comment.trashed');
    // For Restor student
    Route::get('comment/restore/{id}', 'CommentController@restore')->name('comment.restore');
    // For Final Delete student
    Route::get('comment/hdelete/{id}', 'CommentController@hdelete')->name('comment.hdelete');
    Route::get('comment/deleteComment/{id}', 'CommentController@destroy')->name('comment.deleteComment');






    // Messages

    Route::get("message/message", "MessageController@index")->name("message.index");
    Route::get("message/addMessage", "MessageController@create")->name("message.addMessage");
    Route::POST("message/storeMessage", "MessageController@store")->name("message.store");
    Route::get("message/editMessage/{id}", "MessageController@edit")->name("message.edit");

    Route::POST("message/replayMessage/{id}", "MessageController@replay")->name("message.replay");

    Route::get('message/deleteMessage/{id}', 'MessageController@destroy')->name('message.deleteMessage');









    // settings
    Route::get("setting/settings", "settingController@index")->name("setting.index");
    Route::get("setting/addSetting", "settingController@create")->name("setting.addSetting");
    Route::POST("setting/store", "settingController@store")->name("setting.store");
    Route::get("setting/editSetting/{id}", "settingController@edit")->name("setting.edit");
    Route::POST("setting/update/{id}", "settingController@update")->name("setting.update");

    Route::get('setting/deleteSetting/{id}', 'settingController@destroy')->name('setting.deleteSetting');
});
