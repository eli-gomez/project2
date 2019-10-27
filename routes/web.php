<?php


Route::get('/', function () {
    return view('home');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/cliente', function () {
    return view('clientes');
});

Route::get('/cliente/recuperar', function () {
    return view('reclientes');
});

Route::get('/empleado', function () {
    return view('empleados');
});

Route::get('/empleado/list', function () {
    return view('list');
});

Route::get('/empleado/agregarfotos', function () {
    return view('agregarfotos');
});


Route::get('/gerente', function () {
    return view('index');
});