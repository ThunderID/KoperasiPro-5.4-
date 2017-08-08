<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\PjaxMiddleware::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'pjax' =>  \App\Http\Middleware\PjaxMiddleware::class,
        'authenticated' =>  \App\Http\Middleware\AuthenticatedMiddleware::class,
        'tapi' =>  \App\Http\Middleware\API\TApiMiddleware::class,

        'modifikasi_koperasi'   =>  \App\Http\Middleware\ACL\ModifikasiKoperasiMiddleware::class,
        'pengajuan_kredit'      =>  \App\Http\Middleware\ACL\PengajuanKreditMiddleware::class,
        'survei_kredit'         =>  \App\Http\Middleware\ACL\SurveiKreditMiddleware::class,
        'setujui_kredit'        =>  \App\Http\Middleware\ACL\SetujuiKreditMiddleware::class,
        'realisasi_kredit'      =>  \App\Http\Middleware\ACL\RealisasiKreditMiddleware::class,
        'kas_harian'            =>  \App\Http\Middleware\ACL\KasHarianMiddleware::class,
        'transaksi_harian'      =>  \App\Http\Middleware\ACL\TransaksiHarianMiddleware::class,
        'atur_akses'            =>  \App\Http\Middleware\ACL\AturAksesMiddleware::class,
    ];
}
