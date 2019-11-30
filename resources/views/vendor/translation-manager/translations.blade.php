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
	legend {
		 font-size: 21px;
	}
	.outer {
		position: relative;
	}
	
	.inner {
		position: absolute;
		margin-top: -50px;
		margin-left: 20%;
		z-index: 999;
	}

</style>
<section class="content outer">
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
								data-confirm="Вы уверены, что хотите опубликовать все переводы группы? Это действие перезапишет существующие языковые файлы.">
						{{ csrf_field() }}
						<div class="navbar-form navbar-right">
							<button type="submit" class="btn btn-default" data-disable-with="Publishing..">Экспортировать все
								изменения
							</button>
						</div>
					</form>
				</fieldset>
			@endif
		</div>
	</header>
			<div class="col-md-6 alert alert-success success-import inner" style="display:none;">
				<p>Сделан импорт <strong class="counter">N</strong> групп! Для обновления групп страница будет перезагруженна через 10 сек!</p>
			</div>
			<div class="col-md-7 alert alert-success success-find inner" style="display:none;">
				<p>Сделан поиск переводов, найдено <strong class="counter">N</strong> элементов! Для обновления групп страница будет перезагруженна через 10 сек!</p>
			</div>
			<div class="col-md-6 alert alert-success success-publish inner" style="display:none;">
				<p>Совершены публикации переводов для группы '{{ $group }}'!</p>
			</div>
			<div class="col-md-6 alert alert-success success-publish-all inner" style="display:none;">
				<p>Совершены публикации переводов для всех групп!</p>
			</div>
			@if(Session::has('successPublish'))
				<div class="col-md-6 alert alert-info inner">
					{{ Session::get('successPublish') }}
				</div>
			@endif
	
	<div class="row">
		<div class="col-md-12">
			<div class="row">
{{--				левая панель--}}
				<div class="col-md-3">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Операции</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Свернуть"><i
									 class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body">
								@if(!isset($group))
									<legend>Загрузка групп</legend>
									<form class="form-import" method="POST"
												action="{{ action('\Barryvdh\TranslationManager\Controller@postImport') }}" data-remote="true"
												role="form">
										{{ csrf_field() }}
										<div class="input-group">
											<select name="replace" class="form-control">
												<option value="0">добавить новые переводы</option>
												<option value="1">заменить существующие переводы</option>
											</select>
											<span class="input-group-btn">
													<button type="submit" class="btn btn-default"
																	data-disable-with="Загрузка..">
														<i class="fa fa-plus"></i></button>
                        </span>
										</div>
									</form>
									<br>
									<form class="form-find" method="POST"
												action="{{ action('\Barryvdh\TranslationManager\Controller@postFind') }}" data-remote="true"
												role="form"
												data-confirm="Вы уверены, что Вы хотите сканировать вашу папку приложения? Все найденные ключи перевода будут добавлены в базу данных.">
										
										<div class="input-group">
											{{ csrf_field() }}
											<button type="submit" class="btn btn-default" data-disable-with="Поиск..">
												<i class="fa fa-search"></i> Поиск переводов в файлах
											</button>
										</div>
									</form>
								@endif
								@if($group)
									<legend>{{ trans('edit_group') }}</legend>
										<div class="navbar-form navbar-right">
											<a style="float: right;" href="{{ action('\Barryvdh\TranslationManager\Controller@getIndex') }}"
												 class="btn btn-default">Назад</a>
										</div>
								@else
									<br>
									<fieldset>
										<legend>Локали</legend>
										<p>
											В настоящее время поддерживаются языки:
										</p>
										@php ($locales = config("admin.extensions.multi-language.languages"))
										<form class="form-remove-locale" method="POST" role="form"
													action="{{ action('\Barryvdh\TranslationManager\Controller@postRemoveLocale') }}"
													data-confirm="Вы уверены, что хотите удалить эту локаль и все ее данные?">
											{{ csrf_field() }}
											<ul class="list-locales">
												@foreach($locales as $key => $locale)
													<li>
														<div class="form-group">
															<button type="submit" name="remove-locale[{{ $locale }}]" class="btn btn-danger btn-xs"
																			data-disable-with="...">
																&times;
															</button>
															{{ $key }}
														
														</div>
													</li>
												@endforeach
											</ul>
										</form>
										<form class="form-add-locale" method="POST" role="form"
													action="{{ action('\Barryvdh\TranslationManager\Controller@postAddLocale') }}">
											{{ csrf_field() }}
											<div class="input-group">
													<input type="text" name="new-locale" class="form-control"
																 placeholder="добавить локаль"/>
												<span class="input-group-btn">
													<button type="submit" class="btn btn-default" data-disable-with="Добавление..">
															<i class="fa fa-plus">&nbsp;</i>Добавить</button>
                        </span>
											</div>
										</form>
									</fieldset>
										<p class="alert alert-secondary">После добавления локали необходимо
											в файле конфигураций <code>config/admin.php</code> в <code>extensions.multi-language.languages[]</code>
											добавить новый язык. После этого он будет доступен для редактирования.
										</p>
								@endif
						</div>
						<div class="box-footer"></div>
					</div>
				</div>
{{--				правая панель--}}
				<div class="col-md-9">
					<div class="box box-info">
						<div class="box-header with-border">
							{{--							<legend class="box-title">Редактор перевода</legend>--}}
							
							<form role="form" method="POST" class="form-horizontal"
										action="{{ action('\Barryvdh\TranslationManager\Controller@postAddGroup') }}">
								{{ csrf_field() }}
								<div class="input-group">
                	  	  <span class="input-group-addon">
													<legend>Выбрать группу</legend>
                    		</span>
										<div class="form-group col-xs-8">
											<select name="group" id="group" class="form-control group-select">
													@foreach($groups as $key => $value)
															<option value="{{ $key }}" {{ $key == $group ? ' selected' : '' }}
																	>{{ $value }}
															</option>
													@endforeach
											</select>
										</div>
								</div>
							
								@if(!isset($group))
									<p class="alert alert-secondary">Если ни одна из групп не видна, убедитесь, что вы
										запустили миграцию и импортировали переводы на левой вкладке.</p>
									
									<div class="input-group">
										<span class="input-group-addon">
													<legend>Новая группа переводов</legend>
                  </span>
										<span class="input-group-addon">
													<button type="submit" class="btn btn-default" name="add-group"
																	value="Добавить"><i class="fa fa-plus"></i> Создать</button>
                    		</span>
										<div class="col-xs-5">
											<input type="text" name="new-group" id="new-group" class="form-control"
														 placeholder="создать группу переводов"/>
										</div>
									</div>
									
								@endif
							</form>
							
							@if($group)
								<div class="box-tools">
									<span
									 class="label label-success">Всего пунктов: {{ $numTranslations }} , изменено: {{ $numChanged }} </span>
								</div>
								<form action="{{ action('\Barryvdh\TranslationManager\Controller@postAdd', array($group)) }}"
											method="POST" role="form">
									{{ csrf_field() }}
									<div class="input-group">
                	  	  <span class="input-group-addon">
													<legend>Добавить новые ключи в этой группе</legend>
                    		</span>
										<div class="form-group col-xs-7">
											<textarea class="form-control" rows="3" name="keys"
																placeholder="Добавьте 1 ключ в каждой строке, без префикса группы">
											</textarea>
											<button type="submit" value="Добавить ключ" class="btn btn-default">
												<i class="fa fa-plus"></i> Добавить
											</button>
										</div>
									</div>
								</form>
							@endif
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
						
						@if(isset($group))
							<div class="box-header with-border">
								<p class="alert alert-secondary">Внимание, переводы не видны, пока они не будут экспортированы обратно в
									resources/lang файлы, с помощью команды <code>php artisan translation:export</code> или кнопки
									опубликовать.
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
							</div>
						@endif
					
					</div>
				</div>
			
			</div>
		</div>
	</div>
</section>
