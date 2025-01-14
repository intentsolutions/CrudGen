<?php

namespace IS\CrudMaker\Maker\Crud\Files;

class ResourceCollectionFile extends File
{
    const PREFIX_FILE = 'Collection.php';

    const FILE_NAME = 'resourceCollection';

    public function setSettings($settings): File
    {
        $this->patch = $settings['path'] . '/' . ucfirst($this->propertyContainer->getProperty('entity'));
        $this->namespace = $settings['namespace'] . '\\' . ucfirst($this->propertyContainer->getProperty('entity'));

        return parent::setSettings($settings);
    }
}
