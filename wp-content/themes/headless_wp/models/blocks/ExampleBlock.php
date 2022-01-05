<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

class ExampleBlock extends AbstractBlock {

  protected function defineCustomFields() {
    $group = new FieldsBuilder($this->getTitle() . ' Fields');
    $group
    ->addText('Title');
    return $group;
  }

  protected function defineModel() {
    return [
      'name' => 'example-block',
      'title' => __('Example Block'),
      'icon' => 'editor-justify',
    ];
  }
}
