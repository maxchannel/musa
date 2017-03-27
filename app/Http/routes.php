<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//Guest users
Route::group(['prefix' => 'i', 'middleware' => ['guest']], function () {
    //Login
    Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('/login', ['as' => 'loginSend', 'uses' => 'AuthController@loginSend']);
    //Singup
    Route::get('/signup', ['as' => 'signup', 'uses' => 'AuthController@signup']);
    Route::post('/signup', ['as' => 'signupStore', 'uses' => 'AuthController@signupStore']);
});

//Auth users
Route::group(['prefix' => 'i', 'middleware' => ['auth']], function () {
    //Logout
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

    // ***Panorama***
    Route::get('panorama/{id}', ['as' => 'piece_panorama', 'uses' => 'PieceController@panorama']);
    //Publication
    Route::get('panorama/publications/{id}', ['as' => 'piece_panorama_publications', 'uses' => 'PanoramaController@publications']);
    Route::delete('panorama/destroy/publication/{id}', ['as' => 'piece_publication_destroy', 'uses' => 'PanoramaController@destroy_piece_publication']);
    //Exhibition
    Route::get('panorama/exhibitions/{id}', ['as' => 'piece_panorama_exhibitions', 'uses' => 'PanoramaController@exhibitions']);
    Route::delete('panorama/destroy/exhibition/{id}', ['as' => 'piece_exhibition_destroy', 'uses' => 'PanoramaController@destroy_piece_exhibition']);
    //Loan
    Route::get('panorama/loans/{id}', ['as' => 'piece_panorama_loans', 'uses' => 'PanoramaController@loans']);
    Route::delete('panorama/destroy/loan/{id}', ['as' => 'piece_loan_destroy', 'uses' => 'PanoramaController@destroy_piece_loan']);
    //Intervention
    Route::get('panorama/interventions/{id}', ['as' => 'piece_panorama_interventions', 'uses' => 'PanoramaController@interventions']);
    Route::delete('panorama/destroy/intervention/{id}', ['as' => 'piece_intervention_destroy', 'uses' => 'PanoramaController@destroy_piece_intervention']);

    //Piece
    Route::get('/add/piece', ['as' => 'add_piece', 'uses' => 'PieceController@create']);
    Route::post('/add/piece', ['as' => 'add_piece_store', 'uses' => 'PieceController@store']);
    Route::get('/edit/piece/{id}', ['as' => 'edit_piece', 'uses' => 'PieceController@edit']);
    Route::put('/edit/piece/{id}', ['as' => 'edit_piece_store', 'uses' => 'PieceController@update']);
    Route::get('/list/piece', ['as' => 'piece_list', 'uses' => 'PieceController@tabular']);

    //Intervention
    Route::get('/add/intervention', ['as' => 'add_intervention', 'uses' => 'InterventionController@create']);
    Route::post('/add/intervention', ['as' => 'add_intervention_store', 'uses' => 'InterventionController@store']);

    //Institution
    Route::get('/add/institution', ['as' => 'add_institution', 'uses' => 'InstitutionController@create']);
    Route::post('/add/institution', ['as' => 'add_institution_store', 'uses' => 'InstitutionController@store']);
    Route::get('/edit/institution/{id}', ['as' => 'edit_institution', 'uses' => 'InstitutionController@edit']);
    Route::put('/edit/institution/{id}', ['as' => 'edit_institution_store', 'uses' => 'InstitutionController@update']);
    Route::get('/list/institution', ['as' => 'institution_list', 'uses' => 'InstitutionController@tabular']);

    //Loan
    Route::get('/add/loan', ['as' => 'add_loan', 'uses' => 'PieceController@loan']);
    Route::post('/add/loan', ['as' => 'add_loan_store', 'uses' => 'PieceController@loanStore']);
    Route::get('/edit/loan/{id}', ['as' => 'edit_loan', 'uses' => 'LoanController@edit']);
    Route::put('/edit/loan/{id}', ['as' => 'edit_loan_store', 'uses' => 'LoanController@update']);

    //Exhibition
    Route::get('/add/exhibition', ['as' => 'add_exhibition', 'uses' => 'ExhibitionController@create']);
    Route::post('/add/exhibition', ['as' => 'add_exhibition_store', 'uses' => 'ExhibitionController@store']);
    Route::get('/edit/exhibition/{id}', ['as' => 'edit_exhibition', 'uses' => 'ExhibitionController@edit']);
    Route::put('/edit/exhibition/{id}', ['as' => 'edit_exhibition_store', 'uses' => 'ExhibitionController@update']);
    Route::get('/list/exhibition', ['as' => 'exhibition_list', 'uses' => 'ExhibitionController@tabular']);
    Route::get('/add/asoc/exhibition', ['as' => 'add_asoc_exhibition', 'uses' => 'ExhibitionController@asoc']);
    Route::post('/add/asoc/exhibition', ['as' => 'add_asoc_exhibition_store', 'uses' => 'ExhibitionController@asocStore']);

    //Publication
    Route::get('/add/publication', ['as' => 'add_publication', 'uses' => 'PublicationController@create']);
    Route::post('/add/publication', ['as' => 'add_publication_store', 'uses' => 'PublicationController@store']);
    Route::get('/edit/publication/{id}', ['as' => 'edit_publication', 'uses' => 'PublicationController@edit']);
    Route::put('/edit/publication/{id}', ['as' => 'edit_publication_store', 'uses' => 'PublicationController@update']);
    Route::get('/list/publication', ['as' => 'publication_list', 'uses' => 'PublicationController@tabular']);
    Route::get('/add/asoc/publication', ['as' => 'add_asoc_publication', 'uses' => 'PublicationController@asoc']);
    Route::post('/add/asoc/publication', ['as' => 'add_asoc_publication_store', 'uses' => 'PublicationController@asocStore']);

    //Author
    Route::get('/add/author', ['as' => 'add_author', 'uses' => 'AuthorController@create']);
    Route::post('/add/author', ['as' => 'add_author_store', 'uses' => 'AuthorController@store']);
    Route::get('/edit/author/{id}', ['as' => 'edit_author', 'uses' => 'AuthorController@edit']);
    Route::put('/edit/author/{id}', ['as' => 'edit_author_store', 'uses' => 'AuthorController@update']);
    Route::get('/list/author', ['as' => 'author_list', 'uses' => 'AuthorController@tabular']);

    //Perfiles
    Route::get('/profile/piece/{id}', ['as' => 'piece_profile', 'uses' => 'PieceController@profile']);
    Route::get('/search', ['as' => 'command_line', 'uses' => 'SearchController@search']);

    //Notifications
    Route::get('/notifications', ['as' => 'notifications', 'uses' => 'PublicController@notifications']);
    Route::delete('/notifications/destroy/{id}', ['as' => 'destroy_not', 'uses' => 'PublicController@destroy_not']);

    //Statics
    Route::get('/statistic/basic', ['as' => 'statistic_basic', 'uses' => 'StatisticController@basic']);

    //Settings
    Route::get('/settings', ['as' => 'settings', 'uses' => 'SettingController@settings']);
    Route::put('/settings', ['as' => 'settings_store', 'uses' => 'SettingController@settings_store']);

    Route::get('/settings/pass', ['as' => 'settings_pass', 'uses' => 'SettingController@settings_pass']);
    Route::post('/settings/pass', ['as' => 'settings_pass_store', 'uses' => 'SettingController@settings_pass_store']);

    Route::get('/pdf/piece/{id}', ['as' => 'pdf_piece', 'uses' => 'PDFController@index']);
});



// Download Route
Route::get('download/{filename}', function($filename)
{
    // Check if file exists in app/storage/file folder
    $file_path = storage_path().'/file/'.$filename;
    if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        // Error
        exit('Requested file does not exist on our server!');
    }
})->where('filename', '[A-Za-z0-9\-\_\.]+');
