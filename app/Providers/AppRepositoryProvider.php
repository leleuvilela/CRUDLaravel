<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\ClientRepository::class, \App\Repositories\ClientRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProjectRepository::class, \App\Repositories\ProjectRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProjectNoteRepository::class, \App\Repositories\ProjectNoteRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProjectTaskRepository::class, \App\Repositories\ProjectTaskRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProjectMemberRepository::class, \App\Repositories\ProjectMemberRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NoticiaRepository::class, \App\Repositories\NoticiaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AgendaRepository::class, \App\Repositories\AgendaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ConfigRepository::class, \App\Repositories\ConfigRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\DicaRepository::class, \App\Repositories\DicaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FotoRepository::class, \App\Repositories\FotoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\GaleriaFotoRepository::class, \App\Repositories\GaleriaFotoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\GaleriaRepository::class, \App\Repositories\GaleriaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MedicoRepository::class, \App\Repositories\MedicoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NewsletterRepository::class, \App\Repositories\NewsletterRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ParceiroRepository::class, \App\Repositories\ParceiroRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TextoRepository::class, \App\Repositories\TextoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VideoRepository::class, \App\Repositories\VideoRepositoryEloquent::class);
    }
}
