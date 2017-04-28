<?php

namespace App\Http\Controllers;

use App\Repositories\NoticiaRepository;
use App\Services\NoticiaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    /**
     * @var NoticiaRepository
     */

    private $repository;
    /**
     * @var NoticiaService
     */
    private $service;

    public function __construct(NoticiaRepository $repository, NoticiaService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');

        $extension = $file->getClientOriginalExtension();
        $nome = $file->getClientOriginalName();

        $data['file'] = $file;
        $data['nome'] = $nome;
        $data['ext'] = $extension;

        $foto = $this->service->createFile($data);

        $request->request->add(['foto_id' => $foto]);

        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return $this->repository->find($id);
        } catch (QueryException $e) {
            return ['error'=>true, 'não pode ser exibido.'];
        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'não encontrado.'];
        } catch (\Exception $e) {
            return ['error'=>true, 'Ocorreu algum erro ao mostrar.'];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->service->update($request->all(), $id);
            return ['success'=>true, 'editado com sucesso!'];
        } catch (QueryException $e) {
            return ['error'=>true, 'não pode ser editado.'];
        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'não encontrado.'];
        } catch (\Exception $e) {
            return ['error'=>true, 'Ocorreu algum erro ao editar.'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->repository->find($id)->delete();
            return ['success'=>true, 'deletado com sucesso!'];
        } catch (QueryException $e) {
            return ['error'=>true, 'não pode ser apagado.'];
        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'não encontrado.'];
        } catch (\Exception $e) {
            return ['error'=>true, 'Ocorreu algum erro ao excluir.'];
        }

    }
}