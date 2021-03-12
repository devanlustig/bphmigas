<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher; 
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)     
    {   
        Paginator::useBootstrap();

        $events->listen(BuildingMenu::class, 
            function (BuildingMenu $event) {             
                $hak_akses = Auth::user()->hak_akses;             
                $event->menu->add('Hak Akses: '.strtoupper($hak_akses));             
                $event->menu->add('MENU');             
                if ($hak_akses=="administrator") {                 
                    $event->menu->add(                     
                        [                        
                        'text' => 'Asosiasi Kapal',  
                        'url'  => 'asosiasikapal',  
                        'icon' => 'fas fa-fw fa-building'  ,
                        //'can' => 'add-blog-post'                   
                        ],

                         [                        
                        'text' => 'Kapal',  
                        'url'  => 'kapal',  
                        'icon' => 'fas fa-fw fa-ship'                     
                        ],

                        [                        
                        'text' => 'Operator',  
                        'url'  => 'operator',  
                        'icon' => 'fas fa-fw fa-desktop'                     
                        ],

                         [                        
                        'text' => 'Pemilik',  
                        'url'  => 'pemilik',  
                        'icon' => 'fas fa-fw fa-user'                     
                        ],

                        [                        
                        'text' => 'Lintasan Operasi',  
                        'url'  => 'lintasan',  
                        'icon' => 'fas fa-fw fa-road'                     
                        ],

                         [                        
                        'text' => 'TBBM',  
                        'url'  => 'tbbm',  
                        'icon' => 'fas fa-fw fa-anchor'                     
                        ],

                         [                        
                        'text' => 'Realisasi Pengisian',  
                        'url'  => 'realisasipengisianbbm',  
                        'icon' => 'fas fa-fw fa-battery-half'                     
                        ],
                    );             
                } else if ($hak_akses=="petugas") {                 
                    $event->menu->add(                     
                        [                         
                            'text' => 'Pembayaran', 
                            'url'  => 'pembayaran', 
                            'icon' => 'fas fa-fw fa-cash-register'                     
                        ],                     
                        [                         
                            'text' => 'History Pembayaran', 
                            'url'  => 'history', 
                            'icon' => 'fas fa-fw fa-history'                     
                        ]                 
                    );             
                } else {                 
                    $event->menu->add(                     
                        [                         
                            'text' => 'History Pembayaran',  
                            'url'  => 'history',  
                            'icon' => 'fas fa-fw fa-history'                     
                        ]                 
                    );             
                }         
            });     
    }                   
    
}
