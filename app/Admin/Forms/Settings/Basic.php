<?php

namespace App\Admin\Forms\Settings;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class Basic extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = 'основной';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        //dump($request->all());

        admin_success('Processed successfully.');

        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->switch('website_enable', 'Переключить сайт')->help('Не удается получить доступ к сайту будет близко, фон может войти нормально');
        $this->text('website_title', 'название сайта')->help("называемый：config('website_title')");
        $this->text('website_slogan', 'лозунг сайта')->help("Лозунг сайта называется：config('website_slogan')");
        $this->image('website_logo', 'LOGO сайта');
        $this->image('website_text_logo', 'LOGO сайта текст');
        $this->textarea('website_desc', 'Описание сайта')->help('Описание сайта, помогают поисковым системам сканировать соответствующую информацию');
        $this->text('website_keywords', 'Ключевые слова сайта')->help('Сайт ключевых слов в поисковых системах');
        $this->text('website_copyright', 'информация об авторских правах')->help("называемый：config('website_copyright')");
        $this->text('website_icp', 'Запись информации')->help("называемый：config('website_icp')");
        $this->textarea('website_statistics', 'Сайт статистики Код')->help("Статистика сайта код, поддержка Baidu, Google, CNZZ другого способа вызова：config('website_statistics')");
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [

        ];
    }
}
