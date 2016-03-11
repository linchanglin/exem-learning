<?php


Route::group(['middleware' => 'web'], function ()
{
    Route::group(['middleware' => 'auth'], function ()
    {

        Route::get('/', function ()
        {
            return view('app');
        });

        Route::resource('courses', 'coursesController');
        Route::resource('exams', 'examsController');


        Route::get('lessons', 'lessonController@lesson');
        Route::get('lessons-done', 'lessonController@lessonDone');
        Route::get('lessons-overdue', 'lessonController@lessonOver');

        Route::group(['prefix' => 'lessons/{id}'], function ()
        {
            Route::get('exam', 'lessonController@exam');
            Route::get('examDone', 'lessonController@examDone');
            Route::post('store', 'lessonController@store');
        });


        Route::group(['prefix' => 'exams/{id}'], function ()
        {
            Route::resource('combinate', 'examCombinateController');
        });

        Route::group(['prefix' => 'exams/{id}'], function ()
        {
            Route::get('teacher', 'examTeacherController@index');
            Route::post('teacher/store', 'examTeacherController@store');
            Route::post('teacher/update', 'examTeacherController@update');
        });

        Route::group(['prefix' => 'exams/{id}'], function ()
        {
            Route::get('student', 'examStudentController@index');
            Route::post('student/store', 'examStudentController@store');
            Route::post('student/update', 'examStudentController@update');
        });

        Route::group(['prefix' => 'exams/{id}'], function ()
        {
            Route::get('mark', 'examMarkController@index');
            Route::group(['prefix' => 'mark/{grade_id}'], function ()
            {
                Route::get('show', 'examMarkController@show');
                Route::post('show/store', 'examMarkController@store');
            });

        });

        Route::group(['prefix' => 'exams/{id}'], function ()
        {
            Route::get('preview', 'examPreviewController@index');
        });

        Route::group(['prefix' => 'exams/{id}'], function ()
        {
            Route::get('delete', 'examDeleteController@index');
            Route::post('delete/destroy', 'examDeleteController@destroy');
        });


        Route::resource('questionBanks', 'questionBanksController');

        Route::group(['prefix' => 'questionBanks/{id}'], function ()
        {
            Route::resource('questions', 'questionsController');
        });

        Route::resource('evaluations', 'evaluationsController');


    });



    //Excel

    //Route::get('excel/export','ExcelController@export');
    //Route::get('excel/import','ExcelController@import');



    Route::auth();




});


