<style>
	
	.navbar-brand {
		line-height: 35px;
	}
	
	.alert {
		top: 10px;
	}
	
	.alert-secondary {
		color: #383d41;
		background-color: #e2e3e5;
		border-color: #d6d8db;
	}
	
	.param-add, .param {
		margin-bottom: 10px;
	}
	
	.param-add .form-group, .param .form-group {
		margin: 0;
	}
	
	.status-label {
		margin: 10px;
	}
	
	.response-tabs pre {
		border-radius: 0px;
	}
	
	.param-remove {
		margin-left: 5px !important;
	}
	
	.param-desc {
		display: block;
		margin-top: 5px;
		margin-bottom: 10px;
		color: #737373;
	}
	
	.nav-stacked > li {
		border-bottom: 1px solid #f4f4f4;
		margin: 0 !important;
	}
	
	.nav > li > a {
		padding: 10px 10px;
	}
	
	.input-group > a {
		position: relative;
		top: 6px;
	}
	
	.navbar .navbar-form {
		margin-top: 12px;
	}
	
	table {
		border-collapse: collapse;
	}
	td {
		border: 1px solid #ccc;
	}
	th, td {
		padding: 10px;
		text-align: left;
	}
	tr:nth-child(even) {
		background-color: #eee;
	}
	tr:nth-child(odd) {
		background-color: #fff;
	}
	.btn, .input-group-btn .btn {
		background: gainsboro;
	}
	
</style>
<section class="content">
	<header class="navbar" id="top" role="banner">
		<div class="container-fluid">
			<div class="navbar-header col-md-3">
				<a href="{{ action('\Barryvdh\TranslationManager\Controller@getIndex') }}" class="navbar-brand">
					Менеджер Переводов
				</a>
			</div>
			@if(isset($group))
				<div class="navbar-form navbar-right">
					<a style="float: right;" href="{{ action('\Barryvdh\TranslationManager\Controller@getIndex') }}"
						 class="btn btn-default">Назад</a>
				</div>
			@else
				<fieldset>
					<form class="form-inline form-publish-all" method="POST"
								action="{{ action('\Barryvdh\TranslationManager\Controller@postPublish', '*') }}"
								data-remote="true"
								role="form"
								data-confirm="Are you sure you want to publish all translations group? This will overwrite existing language files.">
						{{ csrf_field() }}
						<div class="navbar-form navbar-right">
						<button type="submit" class="btn btn-default" data-disable-with="Publishing..">Сохранить все переводы
						</button>
						</div>
					</form>
				</fieldset>
			@endif
			<div class="col-md-7 alert alert-success success-import" style="display:none;">
				<p>Сделан импорт <strong class="counter">N</strong> групп! Для обновления групп страница будет перезагруженна
					через 12 сек!</p>
			</div>
			<div class="col-md-7 alert alert-success success-find" style="display:none;">
				<p>Сделан поиск переводов, найдено <strong class="counter">N</strong> элементов!</p>
			</div>
			<div class="col-md-7 alert alert-success success-publish" style="display:none;">
				<p>Совершены публикации переводов для группы '{{ $group }}'!</p>
			</div>
			<div class="col-md-7 alert alert-success success-publish-all" style="display:none;">
				<p>Совершены публикации переводов для всей группы!</p>
			</div>
			@if(Session::has('successPublish'))
				<div class="col-md-7 alert alert-info">
					{{ Session::get('successPublish') }}
				</div>
			@endif
		</div>
	</header>
	
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active">
								<a aria-expanded="false" data-toggle="tab" href="#tab_1">
									Операции
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								@if(!isset($group))
									<legend>Загрузка групп</legend>
									<form class="form-import" method="POST"
												action="{{ action('\Barryvdh\TranslationManager\Controller@postImport') }}" data-remote="true"
												role="form">
										{{ csrf_field() }}
										<div class="input-group">
											<div class="form-group is-empty">
												<select name="replace" class="form-control">
													<option value="0">добавить новые переводы</option>
													<option value="1">заменить существующие переводы</option>
												</select>
											</div>
											<span class="input-group-btn">
													<button type="submit" class="btn btn-default"
																	data-disable-with="Loading..">
														<i class="fa fa-plus"></i> Импорт </button>
                        </span>
										</div>
									</form>
									<div class="box-tools pull-right"></div>
									<br>
									<form class="form-find" method="POST"
												action="{{ action('\Barryvdh\TranslationManager\Controller@postFind') }}" data-remote="true"
												role="form"
												data-confirm="Вы уверены, что Вы хотите сканировать вашу папку приложения? Все найденные ключи перевода будут добавлены в базу данных.">
										<div class="input-group">
												<span class="input-group-btn">
											{{ csrf_field() }}
											<button type="submit" class="btn btn-default" data-disable-with="Поиск..">
												<i class="fa fa-search"></i> Поиск переводов в файлах</button></span>
										</div>
									</form>
								@endif
								@if(isset($group))
										<legend>Опубликовать переводы</legend>
									<p class="alert alert-secondary">Внимание, переводы не видны, пока они не будут экспортированы обратно в resources/lang файлы, с помощью команды <code>php artisan translation:export</code> или кнопки опубликовать.
									</p>
									<form class="form-inline form-publish" method="POST"
												action="{{ action('\Barryvdh\TranslationManager\Controller@postPublish', $group) }}"
												data-remote="true" role="form"
												data-confirm="Вы уверены, что хотите опубликовать группу переводов '{{ $group }}? Это перезапишет существующие языковые файлы.">
										{{ csrf_field() }}
										<button type="submit" class="btn btn-default" data-disable-with="Публикация..">Опубликовать</button>
										<a style="float: right;" href="{{ action('\Barryvdh\TranslationManager\Controller@getIndex') }}"
											 class="btn btn-default">Назад</a>
									</form>
								@endif
								<div class="box-tools pull-right"></div>
								<br>
								@if($group)
									<form action="{{ action('\Barryvdh\TranslationManager\Controller@postAdd', array($group)) }}"
												method="POST" role="form">
										{{ csrf_field() }}
										<div class="form-group">
											<legend>Добавить новые ключи в этой группе</legend>
											<textarea class="form-control" rows="3" name="keys"
																placeholder="Добавьте 1 ключ в каждой строке, без префикса группы"></textarea>
										</div>
										<div class="form-group">
											<button type="submit" value="Добавить ключ" class="btn btn-default">
												<i class="fa fa-plus"></i> Добавить ключ</button>
										</div>
									</form>
								
								@else
									<fieldset>
										<legend>Поддерживаемые локали</legend>
										<p>
											В настоящее время поддерживаются языки:
										</p>
										<form class="form-remove-locale" method="POST" role="form"
													action="{{ action('\Barryvdh\TranslationManager\Controller@postRemoveLocale') }}"
													data-confirm="Are you sure to remove this locale and all of data?">
											{{ csrf_field() }}
											<ul class="list-locales">
												@foreach($locales as $locale)
													<li>
														<div class="form-group">
															<button type="submit" name="remove-locale[{{ $locale }}]" class="btn btn-default"
																			data-disable-with="...">
																&times;
															</button>
															{{ $locale }}
														
														</div>
													</li>
												@endforeach
											</ul>
										</form>
										<form class="form-add-locale" method="POST" role="form"
													action="{{ action('\Barryvdh\TranslationManager\Controller@postAddLocale') }}">
											{{ csrf_field() }}
											<div class="form-group">
												<p>
													Введите новый ключ локали:
												</p>
												<div class="row">
													<div class="col-sm-3">
														<input type="text" name="new-locale" class="form-control"/>
													</div>
													<div class="col-sm-2">
														<button type="submit" class="btn btn-default"
																		data-disable-with="Добавление..">
															<i class="fa fa-plus"></i> Добавить новый язык
														</button>
													</div>
												</div>
											</div>
										</form>
									</fieldset>
								@endif
							</div>
							<div class="tab-pane" id="tab_2">
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-9">
					<div class="box box-info">
						<div class="box-header with-border">
{{--							<legend class="box-title">Редактор перевода</legend>--}}
							
							<legend>Выберите группу для редактирования</legend>
							<form role="form" method="POST"
										action="{{ action('\Barryvdh\TranslationManager\Controller@postAddGroup') }}">
								{{ csrf_field() }}
								<div class="form-group">
									<select name="group" id="group" class="form-control group-select">
										@foreach($groups as $key => $value)
											<option value="{{ $key }}" {{ $key == $group ? ' selected' : '' }}
											>{{ $value }}
											</option>
										@endforeach
									</select>
								</div>
								@if(!isset($group))
								<p class="alert alert-secondary">Если ни одна из групп не видна, убедитесь, что вы
									запустили миграцию и импортировали переводы на левой вкладке.</p>
								
								<legend>Создать группу переводов</legend>
								<div class="form-group">
									<input type="text" class="form-control" name="new-group"/>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default" name="add-group"
													value="Добавить"><i class="fa fa-plus"></i> Добавить группу</button>
								</div>
									@endif
							</form>
							
							
							<div class="box-tools">
								<span class="label label-success">Всего пунктов: {{ $numTranslations }} , изменено: {{ $numChanged }} </span>
							</div>
						</div>
						<div class="box-body table-responsive">
							<table class="table table-hover">
								<thead>
								<tr>
									<th width="15%">Ключ</th>
									@foreach ($locales as $locale)
										<th>{{ $locale }}</th>
									@endforeach
									@if($deleteEnabled)
										<th>&nbsp;</th>
									@endif
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
													 data-locale="{{ $locale }}"
													 data-name="{{ $locale . "|" . htmlentities($key, ENT_QUOTES, 'UTF-8', false) }}"
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
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>
</section>
