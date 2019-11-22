<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper для администратора.
 *
 * Здесь вы можете удалить встроенное поле формы:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Или расширить пользовательские поля формы:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Или добавить JS и CSS файлы:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

use Encore\Admin\Extension;
use KevinSoft\MultiLanguage\MultiLanguage;

Encore\Admin\Form::forget(['map', 'editor']);
Encore\Admin\Form::extend('largefile', \Encore\LargeFileUpload\LargeFileField::class);

// перенаправляем vendor/encore/laravel-admin/resources/views в resources/views/admin
app('view')->prependNamespace('multi-language', resource_path('views/admin'));
app('view')->prependNamespace('auth-attempts', resource_path('views/admin'));
app('view')->prependNamespace('laravel-admin', resource_path('views/admin'));

//app('view')->prependNamespace('admin', resource_path('views/admin'));
