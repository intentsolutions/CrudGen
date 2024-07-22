<?php

namespace IS\CrudMaker\Maker;

use IS\CrudMaker\Maker\Crud\Files\ControllerFile;
use IS\CrudMaker\Maker\Crud\Files\FactoryFile;
use IS\CrudMaker\Maker\Crud\Files\ModelFile;
use IS\CrudMaker\Maker\Crud\Files\RepositoryFile;
use IS\CrudMaker\Maker\Crud\Files\RequestFile;
use IS\CrudMaker\Maker\Crud\Files\ResourceCollectionFile;
use IS\CrudMaker\Maker\Crud\Files\ResourceFile;
use IS\CrudMaker\Maker\Crud\Files\ServiceFile;
use IS\CrudMaker\Maker\Crud\Files\TestFile;
use IS\CrudMaker\Maker\Crud\Files\ViewFormFile;
use IS\CrudMaker\Maker\Crud\Files\ViewListFile;
use IS\CrudMaker\Maker\Crud\Files\ViewShowFile;
use IS\CrudMaker\Maker\Interfaces\MakerFactoryInterface;
use Illuminate\Support\Facades\App;

class MakerFactory implements MakerFactoryInterface
{
    public function makeController(): mixed
    {
        return App::make(ControllerFile::class);
    }

    public function makeModel(): mixed
    {
        return App::make(ModelFile::class);
    }

    public function makeRepository(): mixed
    {
        return App::make(RepositoryFile::class);
    }

    public function makeRequest(): mixed
    {
        return App::make(RequestFile::class);
    }

    public function makeResource(): mixed
    {
        return App::make(ResourceFile::class);
    }

    public function makeResourceCollection(): mixed
    {
        return App::make(ResourceCollectionFile::class);
    }

    public function makeViewList(): mixed
    {
        return App::make(ViewListFile::class);
    }

    public function makeViewForm(): mixed
    {
        return App::make(ViewFormFile::class);
    }

    public function makeViewShow(): mixed
    {
        return App::make(ViewShowFile::class);
    }

    public function makeTest(): mixed
    {
        return App::make(TestFile::class);
    }

    public function makeFactory(): mixed
    {
        return App::make(FactoryFile::class);
    }

    public function makeService(): mixed
    {
        return App::make(ServiceFile::class);
    }
}
