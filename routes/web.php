<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ('hello-world');
});

Route::get('/about', function () {
    return ('ini adalah project faiz');
});

Route::get('/home', function () {
    return ('selamat datang di halaman home');
});

// ini adalah lanjutan modul 2
Route::get('/profile', function () {
    echo '<h1>Profil</h1>';
    return '<p>Jurusan Teknologi Informasi-Politeknik Negeri Padang </p>';
});

Route::get('/mahasiswa/ti/udin', function () {
    echo "<p style='font-size:  40; color: orange;'>Jurusan Teknologi Informasi</p>";
    echo '<h1>Selamat datang faiz...</h1>';
    echo '<hr>';
    echo '<p>Lore ipsum dolor sit amet, consectetur adipiscing elit.</p>';
});

// route parameter
Route::get('/mahasiswa', function () {
    $nama = 'Taylor Otwell';
    $nim = '2022180001';
    $total_nilai = 100;

    return view('akademik.nilai_mahasiswa', compact('nama', 'nim', 'total_nilai'));
});

// route dengan optional parameter
Route::get('/mahasiswa/{nama}/{nim}/{kelas}', function ($nama, $nim,$kelas) {
    return '<p>Ketua HIMA jurusan Ti adalah <b>' . $nama . '</b> dengan NIM = <b>' . $nim . '</b></p>';
});

Route::get('/dosen/{nama?}/{nip?}', function ($a='admin', $b='2411083022') {
    return '<p>Dosen pembina HIMA jurusan Ti adalah <b>' . $a . '</b> dengan NIP = ' . $b . '</p>';
});

// route parameter dengan regular expression
Route::get('/user/{id}', function ($id) {
    return '<p>User admin memiliki id = <b>' . $id . '</b></p>';
})->where('id', '[0-9]+');

// route redirect
Route::get('/buku tamu', function () {
    return '<h2>buku tamu</h2>';
});
Route::redirect('/guest-book', '/buku tamu');

// route group
Route::prefix('/login')-> group(function(){
    Route::get('/super_admin', function(){
        return '<h2>Login Haikal</h2>';
    });

    Route::get('/admin', function(){
        return '<h2>Login Rafi</h2>';
    });

    Route::get('/umkm', function(){
        return '<h2>Login Patra</h2>';
    });
});

Route::get('/perulangan', function () {
    $nama = 'Patra';
    $nim = '2411083022';
    $total_nilai = [80,90,10,70,35];
    return view('akademik.perulangan', compact('nama', 'nim', 'total_nilai'));
});

Route::get('/mahasiswa', function () {
    $mahasiswa = [
        [
            'nama' => 'Taylor Otwell',
            'nim' => '2022180001',
            'uts' => 50,
            'uas' => 60 ,
        ],
        [
            'nama' => 'Faiz Altamis',
            'nim' => '2311083016',
            'uts' => 90,
            'uas' => 95,
        ],
    ];

    return view('akademik.nilai_mahasiswa', compact('mahasiswa'));
});


// route fallback
Route::fallback(function () {
    return '<h2>tidak ditemukan</h2>';
});