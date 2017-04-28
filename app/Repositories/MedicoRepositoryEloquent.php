<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\medicoRepository;
use App\Entities\Medico;
use App\Validators\MedicoValidator;

/**
 * Class MedicoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class MedicoRepositoryEloquent extends BaseRepository implements MedicoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Medico::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
