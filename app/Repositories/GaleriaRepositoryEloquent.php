<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\galeriaRepository;
use App\Entities\Galeria;
use App\Validators\GaleriaValidator;

/**
 * Class GaleriaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class GaleriaRepositoryEloquent extends BaseRepository implements GaleriaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Galeria::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
