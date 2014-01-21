<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>Пример 1 - Twitter bootstrap form builder</title>
 
 <!--Twitter bootstrap include-->
 <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
 <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
 <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
 <!--Twitter bootstrap include-->
 
 <!--Example styles-->
 <link rel="stylesheet" href="css/style.css">
 <!--Example styles-->
</head>
<body>
<div class="container">
 <div class="row">
  <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-xs-12">
   <?php
   require_once '../bootstrap_form_builder/form_factory.php';
   
   try {
    $form_factory = new \bootstrap_form_builder\form_factory();
    $form = $form_factory->get_form();

    $form->add_input($form_factory->get_field('html', 'Статическое значение')->set_label('Поле 1'));
    $form->add_input($form_factory->get_field('block_html', 'Личная информация:'));
    $form->add_input($form_factory->get_field('file', 'resume', 'Резюме'));
    $form->add_input($form_factory->get_field('text', 'fio', 'Ф.И.О.')->set_value('Значение по умолчанию')->set_required(true));
    $form->add_input($form_factory->get_field('text', 'passport', 'Номер паспорта')->set_placeholder('ХХ000000'));
    $form->add_input($form_factory->get_field('date', 'birth_date', 'Дата рождения:'));
    
    $form->add_input($form_factory->get_field('image_file')->set_label('Изображение')->set_value('ping_100_100.jpg'));

    $form->add_input($form_factory->get_field('block_html', 'Контактная информация:'));
    $form->add_input($form_factory->get_field('email', 'email', 'Email')->set_required(true));
    $form->add_input($form_factory->get_field('tel', 'tel', 'Номер телефона')->set_required(true));
    $form->add_input($form_factory->get_field('hidden', 'current_date')->set_value(date("Y-m-d")));
    $form->add_input($form_factory->get_field('text', 'city', 'Город проживания')->set_placeholder('Позже станет селектом'));
    $form->add_input($form_factory->get_field('textarea', 'note', 'Примечание'));

    $form->add_input($form_factory->get_field('block_html', 'Пароль:'));
    $form->add_input($form_factory->get_field('password', 'password')->set_label('Пароль:'));
    $form->add_input($form_factory->get_field('password', 'password_repeat')->set_label('Повтор пароля:'));
    
    $form->add_input($form_factory->get_field('submit','Отправить')->add_class('btn-default'));
    
    echo $form->render();
   }
   catch (Exception $e)
   {
    echo $e->getMessage();
   }
   ?>
  </div>
 </div>
</div>
</body>
</html>