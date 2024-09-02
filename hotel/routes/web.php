<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hotel', function () {
    return view('hotel');
});

Route::get('/f1', function () {
    return view('f1');
})->name('f1name');

Route::get('/f2', function () {
    return view('f2');
})->name('f2name');

Route::get('/f3', function () {
    return view('f3');
})->name('f3name');


Route::get('/cars', function () {
    return view('car.index');
})->name('cars.index');

Route::get('/cars_create', function () {
    return view('car.create');
})->name('cars.create');

Route::get('/car_edit', function () {
    return view('car.edit');
})->name('cars.edit');

Route::get('/dogs', function () {
    return view('dog.index');
})->name('dogs.index');

Route::get('/dogs_create', function () {
    return view('dog.create');
})->name('dogs.create');

Route::get('/dogs_edit', function () {
    return view('dog.edit');
})->name('dogs.edit');


Route::get('/k3', function () {
    $url = route('K3');
    dd($url);
})->name('K3');


//localhos/user/123
//id = 123
Route::get('/user/{id}', function (string $id) {
    return 'User ' . $id;
});

// locahost/posts/111/comment/222
//postID = 111
// commentID = 222

Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
    $text = "postId=>$postId , commentId=>$commentId";
    dd($text);
});

// http://localhost/num1/100/num2/50
Route::get('/num1/{num1}/num2/{num2}', function (string $num1, string $num2) {
    //    echo "$num1 , $num2";

    // view('view',[變數])
    // 方法一 每個都傳
    $sum = $num1 + $num2;
    // return view('sum', ['num1' => $num1 , 'num2' => $num2,'sum' => $sum]);

    // 方法二 打包一包
    $data = [
        'num1' => $num1,
        'num2' => $num2,
        'sum' => $sum
    ];
    // dd($data);
    return view('sum', ['data' => $data]);
});

