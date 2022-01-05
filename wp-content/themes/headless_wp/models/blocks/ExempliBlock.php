<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

class ExempliBlock extends AbstractBlock {

  protected function defineCustomFields() {
    $group = new FieldsBuilder($this->getTitle() . ' Fields');
    $group
      ->addTextarea('Title');
    return $group;
  }

  protected function defineModel() {
    return [
      'name' => 'exampli-block',
      'title' => __('Exempli Block'),
      'icon' => 'editor-justify',
    ];
  }
}
