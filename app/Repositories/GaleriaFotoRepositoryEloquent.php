<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\galeria_fotoRepository;
use App\Entities\GaleriaFoto;
use App\Validators\GaleriaFotoValidator;

/**
 * Class GaleriaFotoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class GaleriaFotoRepositoryEloquent extends BaseRepository implements GaleriaFotoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return GaleriaFoto::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
