@extends('admin.master')

@section('title', trans('GPlane\MultiIndexStyle::config.title'))

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ trans('GPlane\MultiIndexStyle::config.title') }}
    </h1>
    <div class="breadcrumb"></div>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php
      $formStyleChoose = Option::form('style_choose', trans('GPlane\MultiIndexStyle::config.type.title'), function($form) {
        $form->select('index_style_type', trans('GPlane\MultiIndexStyle::config.type.select-title'))
            ->option('default', trans('GPlane\MultiIndexStyle::config.type.option-default'))
            ->option('fixed', trans('GPlane\MultiIndexStyle::config.type.option-fixed'))
            ->option('old', trans('GPlane\MultiIndexStyle::config.type.option-old'));
      })->handle();

      $formNavBarItems = Option::form('nav_bar', trans('GPlane\MultiIndexStyle::config.navbar.title'), function ($form)
      {
          $form->textarea('nav_bar_items', trans('GPlane\MultiIndexStyle::config.navbar.textarea-title'))->rows(18);
      })->addMessage(trans('GPlane\MultiIndexStyle::config.navbar.message'), 'warning')->handle();

      $formFeatureText = Option::form('feature_text', trans('GPlane\MultiIndexStyle::config.feature.title'), function ($form)
      {
          $form->text('feature_1_title', trans('GPlane\MultiIndexStyle::config.feature.1-title'));
          $form->text('feature_1_text', trans('GPlane\MultiIndexStyle::config.feature.1-text'));
          $form->text('feature_1_fa', trans('GPlane\MultiIndexStyle::config.feature.1-fa'));
          $form->text('feature_2_title', trans('GPlane\MultiIndexStyle::config.feature.2-title'));
          $form->text('feature_2_text', trans('GPlane\MultiIndexStyle::config.feature.2-text'));
          $form->text('feature_2_fa', trans('GPlane\MultiIndexStyle::config.feature.2-fa'));
          $form->text('feature_3_title', trans('GPlane\MultiIndexStyle::config.feature.3-title'));
          $form->text('feature_3_text', trans('GPlane\MultiIndexStyle::config.feature.3-text'));
          $form->text('feature_3_fa', trans('GPlane\MultiIndexStyle::config.feature.3-fa'));
          $form->text('introdution_text', trans('GPlane\MultiIndexStyle::config.feature.intro-title'));
          $form->text('start_button_text', trans('GPlane\MultiIndexStyle::config.feature.btn-start'));
      })->addMessage(trans('GPlane\MultiIndexStyle::config.feature.message'))->handle();

    ?>

    <div class="row">
        <div class="col-md-6">
            {!! $formStyleChoose->render() !!}
            {!! $formNavBarItems->render() !!}
        </div>

        <div class="col-md-6">
            {!! $formFeatureText->render() !!}
        </div>
    </div>
    
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection
