<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 17.01.14
 */

namespace bootstrap_form_builder;

/**
 * Кнопка отправки формы
 * @package bootstrap_form_builder
 */
class submit_field extends button_field {
 
 public function get_type()
 {
  return 'submit';
 }

 public function add_element_type_classes()
 {
  parent::add_element_type_classes();
  $this->add_class('btn-primary');
 }
}