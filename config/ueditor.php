<?php

/*
 * This file is part of the overtrue/laravel-ueditor.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

return [
    // Storage Engine: config/filesystem.php в disks， public или qiniu
    'disk' => 'public',
    'route' => [
        'name' => '/ueditor/server',
        'options' => [
            // middleware => 'auth',
        ],
    ],

    // конфигурация загрузки
    'upload' => [
        /* Конец связи до и после соответствующей конфигурации, аннотации позволяют только режим многострочного */
        /* элементы конфигурации загрузки изображения */
        'imageActionName' => 'upload-image', /* Загрузить фотографии выполнены имя действия */
        'imageFieldName' => 'upfile', /* Изображение представлено имя формы */
        'imageMaxSize' => 2 * 1024 * 1024, /* Загрузить предельный размер，单位B */
        'imageAllowFiles' => ['.png', '.jpg', '.jpeg', '.gif', '.bmp'], /* Формат изображения Загрузить */
        'imageCompressEnable' => true, /* Следует ли сжимать изображения по умолчанию true */
        'imageCompressBorder' => 1600, /* Сжатие изображений предел длинной стороны */
        'imageInsertAlign' => 'none', /* Добавленные фотографии плавающей путь */
        'imageUrlPrefix' => '', /* Фотографии префикса пути доступа */
        'imagePathFormat' => '/uploads/image/{yyyy}/{mm}/{dd}/', /* Загрузить сохранить путь, вы можете настроить путь и имя файла формата */
        /* {filename} Будет заменено на имя исходного файла, эта конфигурация следует отметить, что проблема китайский мусор */
        /* {rand:6} Буду заменено со случайным числом, последнее число этого числа бит случайного числа */
        /* {time} Он будет заменен с меткой времени */
        /* {yyyy} Он будет заменен на четырехзначный года */
        /* {yy} Он будет заменен на два года */
        /* {mm} Он будет заменен на два месяца */
        /* {dd} Он будет заменен двумя датами */
        /* {hh} Он будет заменен на два часа */
        /* {ii} Он будет заменен на две минуты */
        /* {ss} Он будет заменен на две секунды */
        /* Запрещенные символы \  => * ? " < > | */
        /* Пожалуйста, обратитесь к интерактивной документации с телом => fex.baidu.com/assets/#use-format_upload_filename */

        /* элементы конфигурации загрузки граффити изображения */
        'scrawlActionName' => 'upload-scrawl', /* Осуществление названия действия граффити закачанный */
        'scrawlFieldName' => 'upfile', /* Изображение представлено имя формы */
        'scrawlPathFormat' => '/uploads/image/{yyyy}/{mm}/{dd}/', /* Загрузить сохранить путь, вы можете настроить путь и имя файла формата */
        'scrawlMaxSize' => 2048000, /* Загрузить предельный размер, блок B */
        'scrawlUrlPrefix' => '', /* Фотографии префикса пути доступа */
        'scrawlInsertAlign' => 'none',

        /* Загрузить Скриншот Инструмент */
        'snapscreenActionName' => 'upload-image', /* Загрузить скриншот имя осуществления действий */
        'snapscreenPathFormat' => '/uploads/image/{yyyy}/{mm}/{dd}/', /* Загрузить сохранить путь, вы можете настроить путь и имя файла формата */
        'snapscreenUrlPrefix' => '', /* Фотографии префикса пути доступа */
        'snapscreenInsertAlign' => 'none', /* Добавленные фотографии плавающей путь */

        /* Фотографии ползать удаленную конфигурацию */
        'catcherLocalDomain' => ['127.0.0.1', 'localhost', 'img.baidu.com'],
        'catcherActionName' => 'catch-image', /* Удаленное выполнение имя действия Захваченные изображения */
        'catcherFieldName' => 'source', /* Изображение представило список имя формы */
        'catcherPathFormat' => '/uploads/image/{yyyy}/{mm}/{dd}/', /* Загрузить сохранить путь, вы можете настроить путь и имя файла формата */
        'catcherUrlPrefix' => '', /* Фотографии префикса пути доступа */
        'catcherMaxSize' => 2048000, /* Загрузить предельный размер, блок В */
        'catcherAllowFiles' => ['.png', '.jpg', '.jpeg', '.gif', '.bmp'], /* Формат изображения Crawl */

        /* Конфигурация загрузки видео */
        'videoActionName' => 'upload-video', /* Выполнить имя действия, чтобы загрузить видео */
        'videoFieldName' => 'upfile', /* Название представления видео формы */
        'videoPathFormat' => '/uploads/video/{yyyy}/{mm}/{dd}/', /* Загрузить сохранить путь, вы можете настроить путь и имя файла формата */
        'videoUrlPrefix' => '', /* Приставка пути доступа Видео */
        'videoMaxSize' => 102400000, /* Загрузить предельный размер, блок B, по умолчанию 100MB */
        'videoAllowFiles' => [
            '.flv', '.swf', '.mkv', '.avi', '.rm', '.rmvb', '.mpeg', '.mpg',
            '.ogg', '.ogv', '.mov', '.wmv', '.mp4', '.webm', '.mp3', '.wav', '.mid', ], /* Формат видео Загрузить */

        /* Загрузить файл конфигурации */
        'fileActionName' => 'upload-file', /* controller , Реализация имени действия, чтобы загрузить видео */
        'fileFieldName' => 'upfile', /* Имя файла отправки формы */
        'filePathFormat' => '/uploads/file/{yyyy}/{mm}/{dd}/', /* Загрузить сохранить путь, вы можете настроить путь и имя файла формата */
        'fileUrlPrefix' => '', /* Приставка путь доступа к файлу */
        'fileMaxSize' => 51200000, /* Загрузить предельный размер, блок B, по умолчанию 50MB */
        'fileAllowFiles' => [
            '.png', '.jpg', '.jpeg', '.gif', '.bmp',
            '.flv', '.swf', '.mkv', '.avi', '.rm', '.rmvb', '.mpeg', '.mpg',
            '.ogg', '.ogv', '.mov', '.wmv', '.mp4', '.webm', '.mp3', '.wav', '.mid',
            '.rar', '.zip', '.tar', '.gz', '.7z', '.bz2', '.cab', '.iso',
            '.doc', '.docx', '.xls', '.xlsx', '.ppt', '.pptx', '.pdf', '.txt', '.md', '.xml',
        ], /* Формат файла Загрузить */

        /* Изображения перечислены в указанном каталоге */
        'imageManagerActionName' => 'list-image', /* Назовите осуществление действий управления изображением */
        'imageManagerListPath' => '/uploads/image/', /* Укажите каталог для списка изображений */
        'imageManagerListSize' => 20, /* Каждый раз, когда количество файлов в списке */
        'imageManagerUrlPrefix' => '', /* Фотографии префикса пути доступа */
        'imageManagerInsertAlign' => 'none', /* Добавленные фотографии плавающей путь */
        'imageManagerAllowFiles' => ['.png', '.jpg', '.jpeg', '.gif', '.bmp'], /* Типы файлов в списке */

        /* Показывает список файлов в указанной директории */
        'fileManagerActionName' => 'list-file', /* Название действия исполняемого файла управления */
        'fileManagerListPath' => '/uploads/file/', /* Укажите каталог для списка файлов */
        'fileManagerUrlPrefix' => '', /* Приставка путь доступа к файлу */
        'fileManagerListSize' => 20, /* Каждый раз, когда количество файлов в списке */
        'fileManagerAllowFiles' => [
            '.png', '.jpg', '.jpeg', '.gif', '.bmp',
            '.flv', '.swf', '.mkv', '.avi', '.rm', '.rmvb', '.mpeg', '.mpg',
            '.ogg', '.ogv', '.mov', '.wmv', '.mp4', '.webm', '.mp3', '.wav', '.mid',
            '.rar', '.zip', '.tar', '.gz', '.7z', '.bz2', '.cab', '.iso',
            '.doc', '.docx', '.xls', '.xlsx', '.ppt', '.pptx', '.pdf', '.txt', '.md', '.xml',
        ], /* Типы файлов в списке */
    ],
];
