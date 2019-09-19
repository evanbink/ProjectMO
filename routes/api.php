<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Issues
    Route::apiResource('issues', 'IssueApiController');

    // Timeworktypes
    Route::apiResource('time-work-types', 'TimeWorkTypeApiController');

    // Timeprojects
    Route::apiResource('time-projects', 'TimeProjectApiController');

    // Timeentries
    Route::apiResource('time-entries', 'TimeEntryApiController');

    // Timereports
    Route::apiResource('time-reports', 'TimeReportApiController');

    // Clients
    Route::apiResource('clients', 'ClientApiController');

    // Bugsrepos
    Route::post('bugs-repos/media', 'BugsRepoApiController@storeMedia')->name('bugs-repos.storeMedia');
    Route::apiResource('bugs-repos', 'BugsRepoApiController');

    // Testcases
    Route::apiResource('test-cases', 'TestCaseApiController');

    // Tasks
    Route::apiResource('tasks', 'TaskApiController');
});
