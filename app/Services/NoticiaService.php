<?php
/**
 * Created by PhpStorm.
 * User: leleuvilela
 * Date: 23/03/17
 * Time: 14:15
 */

namespace App\Services;


use App\Repositories\FotoRepository;
use App\Repositories\NoticiaRepository;
use App\Validators\NoticiaValidator;
use Prettus\Validator\Exceptions\ValidatorException;

use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;

class NoticiaService
{
    /**
     * @var NoticiaRepository
     */
    protected  $repository;
    /**
     * @var NoticiaValidator
     */
    private $validator;
    /**
     * @var FotoRepository
     */
    private $fotoRepository;

    public function __construct(NoticiaRepository $repository, NoticiaValidator $validator, FotoRepository $fotoRepository, Filesystem $filesystem, Storage $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->fotoRepository = $fotoRepository;
        $this->filesystem = $filesystem;
        $this->storage = $storage;

    }

    public function create(array $data)
    {

        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        } catch (ValidatorException $e){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }

    }

    public function update(array $data, $id)
    {
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        } catch (ValidatorException $e){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }
    public function createFile(array $data)
    {
        $foto = $this->fotoRepository->create($data);

        $this->storage->put($foto->id.".".$data['ext'], $this->filesystem->get($data['file']));

        return $foto->id;
    }

    public function getFilePath($id){
        $file = $this->fotoRepository->find($id);
        return $this->getBaseUrl($file);
    }

    public function getBaseUrl($file){
        switch ($this->storage->getDefaultDriver()){
            case 'local':
                return $this->storage->getDriver()->getAdapter()->getPathPrefix().'/'.$file->id.'.'.$file->ext;
        }
    }
}