<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Mail\ForgotPasswordMail;
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



Route::get('/web', function () {
    return view('welcome');
});

Auth::routes();



Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    });
    // user
    Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.all');
    Route::post('/users/edit', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.edit');
    Route::get('/users/status/{id}', [App\Http\Controllers\Admin\UserController::class, 'changeStatus'])->name('users.status');
    Route::get('/profile', [App\Http\Controllers\Admin\UserController::class, 'userProfileUI'])->name('profile');
    Route::post('/users/changePassword', [App\Http\Controllers\Admin\UserController::class, 'changeUserPassword'])->name('users.changePassword');
    Route::post('/permissions', [App\Http\Controllers\Admin\PermissionController::class, 'updateUserPermissions'])->name('permissions.edit');
    Route::get('/permissions/add-new', [App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('permissions.addNew');
    Route::post('/permissions/create', [App\Http\Controllers\Admin\PermissionController::class, 'createPermissions'])->name('permissions.create');
    Route::get('/permissions/delete/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'deletePermissions'])->name('permissions.delete');
    Route::post('/permissions/update', [App\Http\Controllers\Admin\PermissionController::class, 'updatePermissions'])->name('permissions.update');
    Route::get('/subscribes', [App\Http\Controllers\Admin\UserController::class, 'subscribesUI'])->name('subscribes.all');
    Route::get('/export-subscriptions', [App\Http\Controllers\Admin\UserController::class, 'exportSubscriptions'])->name('subscribes.export');

    //categories
    Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories.all');
    Route::post('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('categories.create');

    Route::post('/categories/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('categories.edit');
    Route::get('/categories/remove/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'remove'])->name('categories.remove');
    Route::get('/sub-categories', [App\Http\Controllers\Admin\CategoryController::class, 'allSubCategories'])->name('subCategories.all');
    Route::post('/sub-categories/update', [App\Http\Controllers\Admin\CategoryController::class, 'updateSubCategory'])->name('subCategories.edit');
    Route::get('/sub-categories/remove/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'removeSubCategory'])->name('subCategories.remove');

    //tags
    Route::get('/tags', [App\Http\Controllers\Admin\TagController::class, 'index'])->name('tags.all');
    Route::post('/tags', [App\Http\Controllers\Admin\TagController::class, 'store'])->name('tags.create');
    Route::post('/tags/update', [App\Http\Controllers\Admin\TagController::class, 'update'])->name('tags.edit');
    Route::get('/tags/remove/{id}', [App\Http\Controllers\Admin\TagController::class, 'deleteTag'])->name('tags.delete');

    //posts
    Route::get('/events', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('events.all');
    Route::get('/news', [App\Http\Controllers\Admin\PostController::class, 'newsAll'])->name('news.all');
    Route::post('/posts', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('posts.create');
    Route::get('/posts/new', [App\Http\Controllers\Admin\PostController::class, 'newPostUI'])->name('posts.new');
    Route::get('/posts/update/{id}', [App\Http\Controllers\Admin\PostController::class, 'editPostUI'])->name('posts.edit');
    Route::post('/posts/update', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/change-status/{id}', [App\Http\Controllers\Admin\PostController::class, 'changeStatus'])->name('posts.status');
    Route::get('/posts/approve/{id}', [App\Http\Controllers\Admin\PostController::class, 'approvePost'])->name('posts.approve');
    Route::get('/posts/delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'deletePost'])->name('posts.delete');
    Route::get('/posts/pending-approval', [App\Http\Controllers\Admin\PostController::class, 'postsToApproveUI'])->name('posts.approval');

    //forms
    Route::get('/forms', [App\Http\Controllers\Admin\FormController::class, 'index'])->name('forms.all');
    Route::post('/forms/add', [App\Http\Controllers\Admin\FormController::class, 'store'])->name('forms.create');
    Route::post('/forms/update/{id}', [App\Http\Controllers\Admin\FormController::class, 'update'])->name('forms.edit');
    Route::get('/forms/remove/{id}', [App\Http\Controllers\Admin\FormController::class, 'delete'])->name('forms.delete');

    //resources
    Route::get('/resources', [App\Http\Controllers\Admin\ResourceController::class, 'index'])->name('resources.all');
    Route::post('/resources/add', [App\Http\Controllers\Admin\ResourceController::class, 'store'])->name('resources.create');
    Route::post('/resources/update/{id}', [App\Http\Controllers\Admin\ResourceController::class, 'update'])->name('resources.edit');
    Route::get('/resources/remove/{id}', [App\Http\Controllers\Admin\ResourceController::class, 'delete'])->name('resources.delete');

    //comments
    Route::get('/posts/comments/{id}', [App\Http\Controllers\Admin\CommentController::class, 'commentsForPost'])->name('posts.comments');
    Route::post('/posts/comments/reply', [App\Http\Controllers\Admin\CommentController::class, 'replyForComment'])->name('comments.reply');
    Route::post('/posts/add-comments',[App\Http\Controllers\Admin\CommentController::class, 'addPostComment'])->name('comments.add');
    Route::post('/posts/add-comments',[App\Http\Controllers\Admin\CommentController::class, 'addPostComment'])->name('comments.add');
    Route::get('/comments/all',[App\Http\Controllers\Admin\CommentController::class, 'allPostComments'])->name('postComments.all');
    Route::get('/comments/approve/{id}',[App\Http\Controllers\Admin\CommentController::class, 'approveComment'])->name('comments.approve');
    Route::get('/comments/delete/{id}',[App\Http\Controllers\Admin\CommentController::class, 'deleteComment'])->name('comments.delete');
    Route::get('/comments/status/{id}',[App\Http\Controllers\Admin\CommentController::class, 'changeCommentStatus'])->name('comments.status');
    Route::post('/comments/update',[App\Http\Controllers\Admin\CommentController::class, 'editComment'])->name('comments.update');

    // pages
    Route::get('/pages',[App\Http\Controllers\Admin\PageController::class, 'index'])->name('webpages.all');
    Route::get('/pages/create',[App\Http\Controllers\Admin\PageController::class, 'createPageUI'])->name('webpages.new');
    Route::post('/pages/create',[App\Http\Controllers\Admin\PageController::class, 'store'])->name('webpages.create');
    Route::get('/pages/update/{id}',[App\Http\Controllers\Admin\PageController::class, 'editPageUI'])->name('webpages.view');
    Route::post('/pages/update',[App\Http\Controllers\Admin\PageController::class, 'update'])->name('webpages.update');
    Route::get('/pages/visible/{id}',[App\Http\Controllers\Admin\PageController::class, 'changePageVisibility'])->name('webpages.visible');
    Route::get('/pages/delete/{id}',[App\Http\Controllers\Admin\PageController::class, 'deletePage'])->name('webpages.delete');
    Route::post('/pages/sort',[App\Http\Controllers\Admin\PageController::class, 'sortPages'])->name('webpages.sort');

    //settings
    Route::get('/settings/header',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'uploadSliderImagesUI'])->name('settings.header');
    Route::post('/settings/header',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'uploadSliderImages'])->name('settings.headerCreate');
    Route::post('/settings/header-update',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateSliderImages'])->name('settings.headerUpdate');
    Route::get('/settings/slider-delete/{id}',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'removeSliderImages'])->name('settings.sliderDelete');


    Route::get('/settings/analytics',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateAnalyticsUI'])->name('settings.analytics');
    Route::post('/settings/analytics',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateAnalytics'])->name('settings.analyticsUpdate');
    Route::get('/settings/site-settings',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'siteSettingsUI'])->name('settings.siteSettings');
    Route::post('/settings/site-settings',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateSiteSettings'])->name('settings.siteSettingsUpdate');
    Route::post('/settings/site-params',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateSiteParameters'])->name('settings.updateSiteParams');
    Route::get('/settings/site-settings',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'siteSettingsUI'])->name('settings.siteSettings');
    Route::post('/settings/site-settings/get-template',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'getTemplateForTemplateNumber'])->name('settings.getTemplateImg');
    Route::get('/settings/site-settings/active',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'getAllActiveTemplates'])->name('settings.activeTemplates');




    Route::get('/settings/templates',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'getAllTemplates'])->name('settings.templates');
    Route::post('/settings/add-template',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'addNewTemplate'])->name('settings.addTemplate');
    Route::post('/settings/update-template',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateTemplate'])->name('settings.updateTemplate');
    Route::post('/settings/remove-template',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'removeTemplate'])->name('settings.removeTemplate');
    Route::get('/settings/email-settings',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'emailSettings'])->name('settings.emailSettings');
    Route::post('/settings/remove-email',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'removeEmailConfig'])->name('settings.removeEmail');
    Route::post('/settings/add-email',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'addEmailConfig'])->name('settings.addEmailConfig');
    Route::post('/settings/update-email',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateEmailConfig'])->name('settings.updateEmailConfig');
    Route::post('/settings/update-social',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateSocialLinks'])->name('settings.updateSocialLinks');

    // sponsor
    Route::get('/sponsors',[App\Http\Controllers\Admin\SponsorController::class, 'index'])->name('sponsors.all');
    Route::get('/sponsors/create',[App\Http\Controllers\Admin\SponsorController::class, 'createSponsorsUI'])->name('sponsors.new');
    Route::post('/sponsors_store', [App\Http\Controllers\Admin\SponsorController::class, 'store'])->name('sponsors.create');
    Route::get('/sponsors/delete/{id}', [App\Http\Controllers\Admin\SponsorController::class, 'deleteSponsors'])->name('sponsors.delete');
    Route::post('/sponsors/update/{id}', [App\Http\Controllers\Admin\SponsorController::class, 'updateSponsors'])->name('sponsors.update');


    // club contacts
    Route::get('/club-contacts',[App\Http\Controllers\Admin\ClubContactController::class, 'index'])->name('club_contacts.all');
    Route::get('/club-contacts/create',[App\Http\Controllers\Admin\ClubContactController::class, 'createClubContactUI'])->name('club_contacts.new');
    Route::post('/club-contacts', [App\Http\Controllers\Admin\ClubContactController::class, 'store'])->name('club_contacts.create');
    Route::get('/club-contacts/delete/{id}', [App\Http\Controllers\Admin\ClubContactController::class, 'deleteClubContact'])->name('club-contacts.delete');
    Route::get('/club-contacts/updateUI/{id}',[App\Http\Controllers\Admin\ClubContactController::class, 'updateClubContactUI'])->name('club_contacts.updateUI');
    Route::post('/club-contacts/update/{id}', [App\Http\Controllers\Admin\ClubContactController::class, 'updateClubContact'])->name('club_contacts.update');
    Route::get('/club-contacts/export',[App\Http\Controllers\Admin\ClubContactController::class, 'exportClubContacts'])->name('club_contacts.export');
    Route::post('/club-contacts/import',[App\Http\Controllers\Admin\ClubContactController::class, 'importClubContacts'])->name('club_contacts.import');
    

    // rules
    Route::get('/rules',[App\Http\Controllers\Admin\RuleController::class, 'index'])->name('rules.all');
    Route::get('/rules/create',[App\Http\Controllers\Admin\RuleController::class, 'createRulesUI'])->name('rules.new');
    Route::post('/rules_store', [App\Http\Controllers\Admin\RuleController::class, 'store'])->name('rules.create');
    Route::get('/rules/delete/{id}', [App\Http\Controllers\Admin\RuleController::class, 'deleteRules'])->name('rules.delete');
    Route::post('/rules/update/{id}', [App\Http\Controllers\Admin\RuleController::class, 'updateRules'])->name('rules.update');


      // gallery
      Route::get('/galleries',[App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('gallery.all');
      Route::get('/galleries/create',[App\Http\Controllers\Admin\GalleryController::class, 'createGalleryUI'])->name('gallery.new');
      Route::post('/galleries', [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('gallery.create');
      Route::get('/galleries/delete/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'deleteGallery'])->name('gallery.delete');
      Route::post('/galleries/update/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'updateGallery'])->name('gallery.update');
      Route::post('/galleries/bulk/delete', [App\Http\Controllers\Admin\GalleryController::class, 'bulkDeleteImages'])->name('gallery.bulk.delete');
      


    //logs
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->middleware(['auth']);


    //errors
    Route::get('/not_allowed', function () {
        return view('admin.errors.not_allowed');
    });

    Route::get('/email', function () {
        return new ForgotPasswordMail();
    });
});
