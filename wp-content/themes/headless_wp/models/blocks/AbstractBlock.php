<?php

use StoutLogic\AcfBuilder\FieldsBuilder;


/**
 * Table of Contents Block
 *
 * @author       Dalton McGee
 * @since        0.0.1
 **/

abstract class AbstractBlock {

  private $_model;

  function __construct() {
    $this->_model = array_merge($this->defineModelDefaults(), $this->defineModel());
    $_fields = $this->defineCustomFields();
    $_fields
    ->setLocation('block', '==', 'acf/' . $this->_model['name']);

    // Create block
    if (function_exists('acf_register_block_type')) {
      add_action('acf/init', [$this, 'registerBlock'], 4);
      acf_add_local_field_group($_fields->build());
    }
  }

  protected function defineCustomFields() {
    $group = new FieldsBuilder($this->getTitle() . ' Fields');
    $group->addMessage('There are no fields');
    return $group;
  }

  function getTitle() {
    return $this->_model['title'];
  }

  protected function defineModelDefaults() {
    return [
      'name'        => 'undefined-block!',
      'title'        => __('undefined block'),
      'render_callback'  => [$this, 'renderBlock'],
    ];
  }

  protected function defineModel() {
    return [];
  }

  function registerBlock() {
    acf_register_block_type($this->_model);
  }

  function renderBlock($block) {
    echo "<p>The block template is a custom block built in react.</p>";
  }
}
