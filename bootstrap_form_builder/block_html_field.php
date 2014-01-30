<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 16.01.14
 */

namespace bootstrap_form_builder;

/**
 * Блочный статический текст
 * @package bootstrap_form_builder
 */
class block_html_field extends a_field {
 public function __construct($value)
 {
  $this->set_value($value);
  $this->need_label(FALSE);
  $this->add_element_type_classes();
 }
 
 public function render_field()
 {
  return '<span'.$this->get_summary().'>'.$this->get_value().'</span>';
 }

 protected function add_element_type_classes()
 {
  $this->add_class('help-block');
 }
} 