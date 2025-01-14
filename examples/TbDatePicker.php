<?php
/**
 * RadekDostal\NetteComponents\DateTimePicker\TbDatePicker example
 *
 * @package   RadekDostal\NetteComponents\DateTimePicker
 * @example   https://componette.com/radekdostal/nette-datetimepicker/
 * @author    Ing. Radek Dostál, Ph.D. <radek.dostal@gmail.com>
 * @copyright Copyright © 2014 - 2023 Radek Dostál
 * @license   GNU Lesser General Public License
 * @link      https://www.radekdostal.cz
 */

use Nette\Forms\Form;
use Tracy\Debugger;

require '../vendor/autoload.php';

Debugger::$strictMode = TRUE;
Debugger::enable();

RadekDostal\NetteComponents\DateTimePicker\TbDatePicker::register();

$form = new Form();

$form->addTbDatePicker('date', 'Date:')
  //->setFormat('m/d/Y') // for en locale
  ->setRequired()
  //->addRule(Form::MIN, NULL, new DateTime('2016-09-01'))
  //->addRule(Form::MAX, NULL, new DateTime('2016-09-15'))
  //->addRule(Form::RANGE, NULL, [new DateTime('2016-09-01'), new DateTime('2016-09-15')])
  ->setHtmlAttribute('class', 'form-control datetimepicker-input')
  ->setHtmlAttribute('id', 'date')
  ->setHtmlAttribute('data-toggle', 'datetimepicker')
  ->setHtmlAttribute('data-target', '#date')
  ->getLabelPrototype()
  ->setAttribute('class', 'col-sm-3 col-form-label');

$form->addSubmit('submit', 'Send')
  ->setHtmlAttribute('class', 'btn btn-primary');

if ($form->isSuccess() === TRUE)
{
  echo '<h2>Form was submitted and successfully validated</h2>';

  Debugger::dump($form->getValues());
  exit;
}
/*else
{
  $form->setDefaults([
    'date' => new \DateTime()
  ]);
}*/
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Radek Dostál">
  <title>RadekDostal\NetteComponents\DateTimePicker\TbDatePicker example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>
  <script type="text/javascript">
    $(function()
    {
      $.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default,
      {
        icons:
        {
          previous: 'bi bi-chevron-left',
          next: 'bi bi-chevron-right'
        }
      });

      $('.datetimepicker-input').datetimepicker(
      {
        locale: 'cs',  // en
        format: 'D.M.YYYY',  // M/D/YYYY
        useCurrent: false
      });
    });
  </script>
</head>
<body>
  <div class="container-fluid">
    <h1>RadekDostal\NetteComponents\DateTimePicker\TbDatePicker example</h1>
    <?php $form->render('begin'); ?>
    <?php if ($form->hasErrors() === TRUE): ?>
    <ul class="alert alert-danger list-unstyled">
      <?php foreach ($form->getErrors() as $error): ?>
      <li><?php echo htmlspecialchars($error) ?></li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
    <div class="form-group row">
      <?php echo $form['date']->getLabel(); ?>
      <div class="col-sm-4 col-md-2">
        <div class="input-group">
          <?php echo $form['date']->getControl(); ?>
          <div class="input-group-append">
            <span class="input-group-text">
              <span class="bi bi-calendar"></span>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-3 col-sm-9">
        <?php echo $form['submit']->getControl(); ?>
      </div>
    </div>
    <?php $form->render('end'); ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>