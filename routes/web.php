<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'name' => 'Khalifa',
    ]);
});

Route::get('/blade-guide', function () {
    return view('blade-guide', [
        'userName' => 'Khalifa',
        'highlightedNote' => '<span class="text-emerald-600 font-bold">Safe & verified content</span>',
        'userRole' => 'admin',
        'isVerified' => true,
        'notificationCount' => 3,
        'skills' => [
            ['name' => 'Laravel Blade', 'level' => 'Advanced', 'category' => 'Backend', 'badge' => 'green'],
            ['name' => 'Tailwind CSS', 'level' => 'Intermediate', 'category' => 'Frontend', 'badge' => 'blue'],
            ['name' => 'PHP 8.5', 'level' => 'Expert', 'category' => 'Language', 'badge' => 'purple'],
            ['name' => 'Vite Tooling', 'level' => 'Intermediate', 'category' => 'Build Tool', 'badge' => 'amber'],
        ],
        'emptyProjectsList' => [],
    ]);
});
