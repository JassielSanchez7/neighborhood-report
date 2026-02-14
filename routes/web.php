<?php

use App\Livewire\IncidenceDetails;
use App\Livewire\IncidenceHistory;
use App\Livewire\NeighborDashboard;
use App\Livewire\Profile;
use App\Livewire\RateIncidence;
use App\Livewire\RatingListing;
use App\Livewire\RegisterIncidence;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


//Rutas Protegidas para el cliente
Route::middleware('auth:neighbor')->group(function(){

    Route::get('/my-account',NeighborDashboard::class)->name('neighbor.dashboard');
    
    //Cerrar Sesion
    Route::post('/logout',function(){
        auth('neighbor')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');

    Route::get('/register-incidence',RegisterIncidence::class)->name('neighbor.incidence');
    Route::get('/history-incidence',IncidenceHistory::class)->name('neighbor.incidences');
    Route::get('/detail-incidence/{id}',IncidenceDetails::class)->name('neighbor.incidences.show');
    Route::get('/rate-incidence/{id}',RateIncidence::class)->name('neighbor.rating');
    Route::get('/ratings',RatingListing::class)->name('neighbor.ratings');
    Route::get('/perfil',Profile::class)->name('neighbor.profile');


});



require __DIR__.'/settings.php';
