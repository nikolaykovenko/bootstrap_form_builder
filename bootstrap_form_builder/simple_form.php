<?php
/**
 * @package bootstrap_form_builder
 * @author Nikolay Kovenko <nikolay.kovenko@gmail.com>
 * @date 13.01.14
 */

namespace bootstrap_form_builder;

/**
 * Простая форма
 * @package bootstrap_form_builder
 */
class simple_form extends a_form {
 protected function add_element_type_classes()
 {
  
 }

 protected function put_field(a_field $input)
 {
  $result = $input->render();
  if ($input->need_label())
  {
   $id = $input->get_id();

   $result = '<div class="form-group">
                <label'.(!empty($id) ? ' for="'.$id.'"' : '').'>'.$input->get_label().'</label>
                '.$result.'
              </div>';
  }

  return $result;
 }
} 