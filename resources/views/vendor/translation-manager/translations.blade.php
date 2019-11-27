<header class="navbar navbar-static-top navbar-inverse" id="top" role="banner">
	<div class="container-fluid">
		<div class="navbar-header">
			<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
				<span class="sr-only">Переключение навигации</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="{{ action('\Barryvdh\TranslationManager\Controller@getIndex') }}" class="navbar-brand">
				Менеджер Переводов
			</a>
		</div>
	</div>
</header>

<div class="container-fluid">
	<p>Внимание, переводы не видны, пока они не будут экспортированы обратно в app/lang файле, с помощью команды <code>php artisan translation:export</code> или кнопки опубликовать.</p>
	<div class="alert alert-success success-import" style="display:none;">
		<p>Сделан импорт, обрабатываются <strong class="counter">N</strong> групп! Перезагрузить страницу, чтобы обновить группы!</p>
	</div>
	<div class="alert alert-success success-find" style="display:none;">
		<p>Сделанный поиск переводов, найдено <strong class="counter">N</strong> items!</p>
	</div>
	<div class="alert alert-success success-publish" style="display:none;">
		<p>Совершены публикации переводов для группы '{{ $group }}'!</p>
	</div>
	<div class="alert alert-success success-publish-all" style="display:none;">
		<p>Совершены публикации переводов для всей группы!</p>
	</div>
	@if(Session::has('successPublish'))
		<div class="alert alert-info">
			{{ Session::get('successPublish') }}
		</div>
	@endif
	<p>
	@if(!isset($group))
		<form class="form-import" method="POST" action="{{ action('\Barryvdh\TranslationManager\Controller@postImport') }}" data-remote="true" role="form">
			 {{ csrf_field() }}
			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						<select name="replace" class="form-control">
							<option value="0">Добавить новые переводы</option>
							<option value="1">Заменить существующие переводы</option>
						</select>
					</div>
					<div class="col-sm-2">
						<button type="submit" class="btn btn-success btn-block"  data-disable-with="Loading..">Импорт групп</button>
					</div>
				</div>
			</div>
		</form>
		<form class="form-find" method="POST" action="{{ action('\Barryvdh\TranslationManager\Controller@postFind') }}" data-remote="true" role="form" data-confirm="Вы уверены, что Вы хотите сканировать вашу папку приложения? Все найденные ключи перевода будут добавлены в базу данных.">
			<div class="form-group">
				 {{ csrf_field() }}
				<button type="submit" class="btn btn-info" data-disable-with="Поиск.." >Найти переводы в файлах</button>
			</div>
		</form>
	@endif
	@if(isset($group))
		<form class="form-inline form-publish" method="POST" action="{{ action('\Barryvdh\TranslationManager\Controller@postPublish', $group) }}" data-remote="true" role="form" data-confirm="Вы уверены, что хотите опубликовать группу переводов '{{ $group }}? Это перезапишет существующие языковые файлы.">
			 {{ csrf_field() }}
			<button type="submit" class="btn btn-info" data-disable-with="Публикация.." >Опубликовать переводы</button>
			<a href="{{ action('\Barryvdh\TranslationManager\Controller@getIndex') }}" class="btn btn-default">Назад</a>
		</form>
		@endif
		</p>
		<form role="form" method="POST" action="{{ action('\Barryvdh\TranslationManager\Controller@postAddGroup') }}">
			 {{ csrf_field() }}
			<div class="form-group">
				<p>Выберите группу для отображения перевода группы. Если ни одна из групп не видна, убедитесь, что вы запустили миграцию и импортировали переводы.</p>
				<select name="group" id="group" class="form-control group-select">
					@foreach($groups as $key => $value)
						<option value="{{ $key }}" {{ $key == $group ? ' selected' : '' }}
						>{{ $value }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Введите новое имя группы переводов</label>
				<input type="text" class="form-control" name="new-group" />
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-default" name="add-group" value="Добавление и редактирование ключей" />
			</div>
		</form>
		@if($group)
			<form action="{{ action('\Barryvdh\TranslationManager\Controller@postAdd', array($group)) }}" method="POST"  role="form">
				 {{ csrf_field() }}
				<div class="form-group">
					<label>Добавить новые ключи в этой группе</label>
					<textarea class="form-control" rows="3" name="keys" placeholder="Добавьте 1 ключ в каждой строке, без префикса группы"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" value="Добавить ключ" class="btn btn-primary">
				</div>
			</form>
			{{--<div class="row">
				<div class="col-sm-2">
					<span class="btn btn-default enable-auto-translate-group">Использование Авто переводчика</span>
				</div>
			</div>--}}
			{{--<form class="form-add-locale autotranslate-block-group hidden" method="POST" role="form" action="{{ action('\Barryvdh\TranslationManager\Controller@postTranslateMissing') }}">
				 {{ csrf_field() }}
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="base-locale">База локалей для Авто Переводов</label>
							<select name="base-locale" id="base-locale" class="form-control">
								@foreach($locales as $locale)
									<option value="{{ $locale }}">{{ $locale }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="new-locale">Введите целевой ключ локали</label>
							<input type="text" name="new-locale" class="form-control" id="new-locale" placeholder="Введите целевой ключ локали" />
						</div>
						@if(!config('laravel_google_translate.google_translate_api_key'))
							<p>
								<code>Перевод с использованием stichoza/google-translate-php. Если вы хотели бы использовать Google Translate API введите ваш Google Translate API ключ для файла конфигурации laravel_google_translate</code>
							</p>
						@endif
						<div class="form-group">
							<input type="hidden" name="with-translations" value="1">
							<input type="hidden" name="file" value="{{ $group }}">
							<button type="submit" class="btn btn-default btn-block"  data-disable-with="Добавление..">Авто перевод</button>
						</div>
					</div>
				</div>
			</form>--}}
			<hr>
			<h4>Всего:  {{ $numTranslations }} , изменено: {{ $numChanged }} </h4>
			<table class="table">
				<thead>
				<tr>
					<th width="15%">Ключ</th>
					@foreach ($locales as $locale)
						<th>{{ $locale }}</th>
					@endforeach
					@if($deleteEnabled)
						<th>&nbsp;</th>
					@endif;
				</tr>
				</thead>
				<tbody>
				
				@foreach ($translations as $key => $translation)
					<tr id="{{ htmlentities($key, ENT_QUOTES, 'UTF-8', false) }}">
						<td>{{ htmlentities($key, ENT_QUOTES, 'UTF-8', false) }}</td>
						@foreach ($locales as $locale)
				  <?php $t = isset($translation[$locale]) ? $translation[$locale] : null ?>
							
							<td>
								<a href="#edit"
									 class="editable status-{{ $t ? $t->status : 0 }} locale-{{ $locale }}"
									 data-locale="{{ $locale }}" data-name="{{ $locale . "|" . htmlentities($key, ENT_QUOTES, 'UTF-8', false) }}"
									 id="username" data-type="textarea" data-pk="{{ $t ? $t->id : 0 }}"
									 data-url="{{ $editUrl }}"
									 data-title="Введите перевод">{{ $t ? htmlentities($t->value, ENT_QUOTES, 'UTF-8', false) : '' }}</a>
							</td>
						@endforeach
						@if($deleteEnabled)
							<td>
								<a href="{{ action('\Barryvdh\TranslationManager\Controller@postDelete', [$group, $key]) }}"
									 class="delete-key"
									 data-confirm="Are you sure you want to delete the translations for '{{ htmlentities($key, ENT_QUOTES, 'UTF-8', false) }}?"><span
									 class="glyphicon glyphicon-trash"></span></a>
							</td>
						@endif
					</tr>
				@endforeach
				</tbody>
			</table>
		@else
			<fieldset>
				<legend>Поддерживаемые локали</legend>
				<p>
					В настоящее время поддерживаются языки:
				</p>
				<form  class="form-remove-locale" method="POST" role="form" action="{{ action('\Barryvdh\TranslationManager\Controller@postRemoveLocale') }}" data-confirm="Are you sure to remove this locale and all of data?">
					 {{ csrf_field() }}
					<ul class="list-locales">
						@foreach($locales as $locale)
							<li>
								<div class="form-group">
									<button type="submit" name="remove-locale[{{ $locale }}]" class="btn btn-danger btn-xs" data-disable-with="...">
										&times;
									</button>
									{{ $locale }}
								
								</div>
							</li>
						@endforeach
					</ul>
				</form>
				<form class="form-add-locale" method="POST" role="form" action="{{ action('\Barryvdh\TranslationManager\Controller@postAddLocale') }}">
					 {{ csrf_field() }}
					<div class="form-group">
						<p>
							Введите новый ключ локали:
						</p>
						<div class="row">
							<div class="col-sm-3">
								<input type="text" name="new-locale" class="form-control" />
							</div>
							<div class="col-sm-2">
								<button type="submit" class="btn btn-default btn-block"  data-disable-with="Adding..">Добавить новый язык</button>
							</div>
						</div>
					</div>
				</form>
			</fieldset>
			<fieldset>
				<legend>Экспортировать все переводы</legend>
				<form class="form-inline form-publish-all" method="POST" action="{{ action('\Barryvdh\TranslationManager\Controller@postPublish', '*') }}" data-remote="true" role="form" data-confirm="Are you sure you want to publish all translations group? This will overwrite existing language files.">
					 {{ csrf_field() }}
					<button type="submit" class="btn btn-primary" data-disable-with="Publishing.." >Опубликовать все</button>
				</form>
			</fieldset>
		
		@endif
</div>
