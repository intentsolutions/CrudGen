<?php

namespace IS\CrudMaker\Maker;

use IS\CrudMaker\Maker\Interfaces\MakerFactoryInterface;
use IS\CrudMaker\Maker\Interfaces\PropertyContainerInterface;
use Illuminate\Support\Facades\App;

class Maker
{
    public function __construct(private PropertyContainerInterface $propertyContainer)
    {
    }

    public function make(): void
    {
        $builderFactory = App::make(MakerFactoryInterface::class);

        foreach ($this->getTemplateConfig() as $file => $settings) {

            $methodName = 'make' . ucfirst($file);

            if (method_exists($builderFactory, $methodName)) {
                $builderFactory->$methodName()->setSettings($settings)->make();
            }
        }
    }

    private function getTemplateConfig(): array
    {
        return config('crudMaker.templates')[strtolower($this->propertyContainer->getProperty('templateName'))] ?? [];
    }
}
