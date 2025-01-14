<?php

namespace IS\CrudMaker\Maker\Crud\Files;

class FactoryFile extends File
{
    const PREFIX_FILE = 'Factory.php';

    const FILE_NAME = 'factory';

    protected function buildClass(): File
    {
        $this->shortcodes->setShortcode('$DEFINITION$', $this->getDefinition());

        return parent::buildClass();
    }

    protected function getDefinition(): string
    {
        $fields = '';

        foreach ($this->fields->getFields() as $key => $field) {
            $fields .= ($key ? PHP_EOL . '            ' : '')
                . '\'' . $field . '\' => \'' . ucfirst($field) . '\',';
        }

        return $fields;
    }
}
