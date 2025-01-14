<?php

namespace IS\CrudMaker\Maker\Crud\Files;

class ResourceFile extends File
{
    const PREFIX_FILE = 'Resource.php';

    const FILE_NAME = 'resource';

    public function setSettings($settings): File
    {
        $this->patch = $settings['path'] . '/' . ucfirst($this->propertyContainer->getProperty('entity'));
        $this->namespace = $settings['namespace'] . '\\' . ucfirst($this->propertyContainer->getProperty('entity'));

        return parent::setSettings($settings);
    }

    protected function buildClass(): File
    {
        $this->shortcodes->setShortcode('$FIELDS$', $this->getFields());

        return parent::buildClass();
    }

    protected function getFields(): string
    {
        $rules = '';

        foreach ($this->fields->getFields(false) as $key => $field) {
            $rules .= ($key ? PHP_EOL . '            ' : '') . '\''
                . $field . '\' => $this->' . $field . ',';
        }

        return $rules;
    }
}
