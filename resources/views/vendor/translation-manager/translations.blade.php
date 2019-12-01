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
	/*сообщения*/
	.outer {
		position: relative;
	}
	.inner {
		position: absolute;
		margin-top: -50px;
		margin-left: 20%;
		z-index: 999;
	}
	
	/* модальное окно загрузки 1 */
	.cssload-preloader {
		font-family: Arial, Tahoma;
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		z-index: 10;
		display: box;
		display: -o-box;
		display: -ms-box;
		display: -webkit-box;
		display: -moz-box;
		display: flex;
		display: -o-flex;
		display: -ms-flex;
		display: -webkit-flex;
		display: -moz-flex;
		box-pack: center;
		-o-box-pack: center;
		-ms-box-pack: center;
		-webkit-box-pack: center;
		-moz-box-pack: center;
		justify-content: center;
		-o-justify-content: center;
		-ms-justify-content: center;
		-webkit-justify-content: center;
		-moz-justify-content: center;
		box-align: center;
		-o-box-align: center;
		-ms-box-align: center;
		-webkit-box-align: center;
		-moz-box-align: center;
		align-items: center;
		-o-align-items: center;
		-ms-align-items: center;
		-webkit-align-items: center;
		-moz-align-items: center;
		transform-style: preserve-3d;
		-o-transform-style: preserve-3d;
		-ms-transform-style: preserve-3d;
		-webkit-transform-style: preserve-3d;
		-moz-transform-style: preserve-3d;
		perspective: 1688px;
		-o-perspective: 1688px;
		-ms-perspective: 1688px;
		-webkit-perspective: 1688px;
		-moz-perspective: 1688px;
		overflow: hidden;
		animation: wobble 5.75s ease-in-out infinite;
		-o-animation: wobble 5.75s ease-in-out infinite;
		-ms-animation: wobble 5.75s ease-in-out infinite;
		-webkit-animation: wobble 5.75s ease-in-out infinite;
		-moz-animation: wobble 5.75s ease-in-out infinite;
		padding-bottom: 7em;
	}
	.cssload-preloader > span {
		font-size: 100px;
		animation: 5.75s ease-in-out infinite;
		-o-animation: 5.75s ease-in-out infinite;
		-ms-animation: 5.75s ease-in-out infinite;
		-webkit-animation: 5.75s ease-in-out infinite;
		-moz-animation: 5.75s ease-in-out infinite;
		color: transparent;
		text-shadow: 0 0 0 rgb(0,0,0);
	}
	span:nth-child(-n+3) {
		animation-delay: -2.88s;
		-o-animation-delay: -2.88s;
		-ms-animation-delay: -2.88s;
		-webkit-animation-delay: -2.88s;
		-moz-animation-delay: -2.88s;
	}
	span:nth-child(1),
	span:nth-last-child(1) {
		animation-name: blur-1;
		-o-animation-name: blur-1;
		-ms-animation-name: blur-1;
		-webkit-animation-name: blur-1;
		-moz-animation-name: blur-1;
	}
	
	span:nth-child(2),
	span:nth-last-child(2) {
		animation-name: blur-2;
		-o-animation-name: blur-2;
		-ms-animation-name: blur-2;
		-webkit-animation-name: blur-2;
		-moz-animation-name: blur-2;
	}
	span:nth-child(3),
	span:nth-last-child(3) {
		animation-name: blur-3;
		-o-animation-name: blur-3;
		-ms-animation-name: blur-3;
		-webkit-animation-name: blur-3;
		-moz-animation-name: blur-3;
	}
	
	@keyframes blur-1 {
		50% {
			text-shadow: 0 0 0.15em rgb(0,0,0);
		}
	}
	
	@-o-keyframes blur-1 {
		50% {
			text-shadow: 0 0 0.15em rgb(0,0,0);
		}
	}
	
	@-ms-keyframes blur-1 {
		50% {
			text-shadow: 0 0 0.15em rgb(0,0,0);
		}
	}
	
	@-webkit-keyframes blur-1 {
		50% {
			text-shadow: 0 0 0.15em rgb(0,0,0);
		}
	}
	
	@-moz-keyframes blur-1 {
		50% {
			text-shadow: 0 0 0.15em rgb(0,0,0);
		}
	}
	
	@keyframes blur-2 {
		50% {
			text-shadow: 0 0 0.075em rgb(0,0,0);
		}
	}
	
	@-o-keyframes blur-2 {
		50% {
			text-shadow: 0 0 0.075em rgb(0,0,0);
		}
	}
	
	@-ms-keyframes blur-2 {
		50% {
			text-shadow: 0 0 0.075em rgb(0,0,0);
		}
	}
	
	@-webkit-keyframes blur-2 {
		50% {
			text-shadow: 0 0 0.075em rgb(0,0,0);
		}
	}
	
	@-moz-keyframes blur-2 {
		50% {
			text-shadow: 0 0 0.075em rgb(0,0,0);
		}
	}
	
	@keyframes blur-3 {
		50% {
			text-shadow: 0 0 0.05em rgb(0,0,0);
		}
	}
	
	@-o-keyframes blur-3 {
		50% {
			text-shadow: 0 0 0.05em rgb(0,0,0);
		}
	}
	
	@-ms-keyframes blur-3 {
		50% {
			text-shadow: 0 0 0.05em rgb(0,0,0);
		}
	}
	
	@-webkit-keyframes blur-3 {
		50% {
			text-shadow: 0 0 0.05em rgb(0,0,0);
		}
	}
	
	@-moz-keyframes blur-3 {
		50% {
			text-shadow: 0 0 0.05em rgb(0,0,0);
		}
	}
	
	@keyframes wobble {
		from, to {
			transform: rotateY(-45deg);
		}
		50% {
			transform: rotateY(45deg);
		}
	}
	
	@-o-keyframes wobble {
		from, to {
			-o-transform: rotateY(-45deg);
		}
		50% {
			-o-transform: rotateY(45deg);
		}
	}
	
	@-ms-keyframes wobble {
		from, to {
			-ms-transform: rotateY(-45deg);
		}
		50% {
			-ms-transform: rotateY(45deg);
		}
	}
	
	@-webkit-keyframes wobble {
		from, to {
			-webkit-transform: rotateY(-45deg);
		}
		50% {
			-webkit-transform: rotateY(45deg);
		}
	}
	
	@-moz-keyframes wobble {
		from, to {
			-moz-transform: rotateY(-45deg);
		}
		50% {
			-moz-transform: rotateY(45deg);
		}
	}
	/* модальное окно загрузки 1 */
	{{-- https://icons8.com/cssload/ru/spinners --}}
	/* модальное окно загрузки 2 */
	.cssload-container {
		transform: translate(-50%, -50%);
		-o-transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		-webkit-transform: translate(-50%, -50%);
		-moz-transform: translate(-50%, -50%);
		
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		z-index: 10;
		display: box;
		display: -o-box;
		display: -ms-box;
		display: -webkit-box;
		display: -moz-box;
		display: flex;
		display: -o-flex;
		display: -ms-flex;
		display: -webkit-flex;
		display: -moz-flex;
		box-pack: center;
		-o-box-pack: center;
		-ms-box-pack: center;
		-webkit-box-pack: center;
		-moz-box-pack: center;
		justify-content: center;
		-o-justify-content: center;
		-ms-justify-content: center;
		-webkit-justify-content: center;
		-moz-justify-content: center;
		box-align: center;
		-o-box-align: center;
		-ms-box-align: center;
		-webkit-box-align: center;
		-moz-box-align: center;
		align-items: center;
		-o-align-items: center;
		-ms-align-items: center;
		-webkit-align-items: center;
		-moz-align-items: center;
		transform-style: preserve-3d;
		-o-transform-style: preserve-3d;
		-ms-transform-style: preserve-3d;
		-webkit-transform-style: preserve-3d;
		-moz-transform-style: preserve-3d;
		perspective: 1688px;
		-o-perspective: 1688px;
		-ms-perspective: 1688px;
		-webkit-perspective: 1688px;
		-moz-perspective: 1688px;
		overflow: hidden;
		animation: wobble 5.75s ease-in-out infinite;
		-o-animation: wobble 5.75s ease-in-out infinite;
		-ms-animation: wobble 5.75s ease-in-out infinite;
		-webkit-animation: wobble 5.75s ease-in-out infinite;
		-moz-animation: wobble 5.75s ease-in-out infinite;
		padding-bottom: 7em;
		
	}
	
	.cssload-thing {
		height: 53px;
		width: 11px;
		background: rgb(242,242,242);
		position: absolute;
		animation: somecssload-thing_maybe_cool_idk 2.3s infinite ease;
		-o-animation: somecssload-thing_maybe_cool_idk 2.3s infinite ease;
		-ms-animation: somecssload-thing_maybe_cool_idk 2.3s infinite ease;
		-webkit-animation: somecssload-thing_maybe_cool_idk 2.3s infinite ease;
		-moz-animation: somecssload-thing_maybe_cool_idk 2.3s infinite ease;
	}
	.cssload-thing:nth-child(1) {
		transform: rotate(30deg);
		-o-transform: rotate(30deg);
		-ms-transform: rotate(30deg);
		-webkit-transform: rotate(30deg);
		-moz-transform: rotate(30deg);
		transform-origin: 50% -200%;
		-o-transform-origin: 50% -200%;
		-ms-transform-origin: 50% -200%;
		-webkit-transform-origin: 50% -200%;
		-moz-transform-origin: 50% -200%;
		animation-delay: 0.29s;
		-o-animation-delay: 0.29s;
		-ms-animation-delay: 0.29s;
		-webkit-animation-delay: 0.29s;
		-moz-animation-delay: 0.29s;
	}
	.cssload-thing:nth-child(2) {
		transform: rotate(60deg);
		-o-transform: rotate(60deg);
		-ms-transform: rotate(60deg);
		-webkit-transform: rotate(60deg);
		-moz-transform: rotate(60deg);
		transform-origin: 50% -200%;
		-o-transform-origin: 50% -200%;
		-ms-transform-origin: 50% -200%;
		-webkit-transform-origin: 50% -200%;
		-moz-transform-origin: 50% -200%;
		animation-delay: 0.58s;
		-o-animation-delay: 0.58s;
		-ms-animation-delay: 0.58s;
		-webkit-animation-delay: 0.58s;
		-moz-animation-delay: 0.58s;
	}
	.cssload-thing:nth-child(3) {
		transform: rotate(90deg);
		-o-transform: rotate(90deg);
		-ms-transform: rotate(90deg);
		-webkit-transform: rotate(90deg);
		-moz-transform: rotate(90deg);
		transform-origin: 50% -200%;
		-o-transform-origin: 50% -200%;
		-ms-transform-origin: 50% -200%;
		-webkit-transform-origin: 50% -200%;
		-moz-transform-origin: 50% -200%;
		animation-delay: 0.86s;
		-o-animation-delay: 0.86s;
		-ms-animation-delay: 0.86s;
		-webkit-animation-delay: 0.86s;
		-moz-animation-delay: 0.86s;
	}
	.cssload-thing:nth-child(4) {
		transform: rotate(120deg);
		-o-transform: rotate(120deg);
		-ms-transform: rotate(120deg);
		-webkit-transform: rotate(120deg);
		-moz-transform: rotate(120deg);
		transform-origin: 50% -200%;
		-o-transform-origin: 50% -200%;
		-ms-transform-origin: 50% -200%;
		-webkit-transform-origin: 50% -200%;
		-moz-transform-origin: 50% -200%;
		animation-delay: 1.15s;
		-o-animation-delay: 1.15s;
		-ms-animation-delay: 1.15s;
		-webkit-animation-delay: 1.15s;
		-moz-animation-delay: 1.15s;
	}
	.cssload-thing:nth-child(5) {
		transform: rotate(150deg);
		-o-transform: rotate(150deg);
		-ms-transform: rotate(150deg);
		-webkit-transform: rotate(150deg);
		-moz-transform: rotate(150deg);
		transform-origin: 50% -200%;
		-o-transform-origin: 50% -200%;
		-ms-transform-origin: 50% -200%;
		-webkit-transform-origin: 50% -200%;
		-moz-transform-origin: 50% -200%;
		animation-delay: 1.44s;
		-o-animation-delay: 1.44s;
		-ms-animation-delay: 1.44s;
		-webkit-animation-delay: 1.44s;
		-moz-animation-delay: 1.44s;
	}
	.cssload-thing:nth-child(6) {
		transform: rotate(180deg);
		-o-transform: rotate(180deg);
		-ms-transform: rotate(180deg);
		-webkit-transform: rotate(180deg);
		-moz-transform: rotate(180deg);
		transform-origin: 50% -200%;
		-o-transform-origin: 50% -200%;
		-ms-transform-origin: 50% -200%;
		-webkit-transform-origin: 50% -200%;
		-moz-transform-origin: 50% -200%;
		animation-delay: 1.73s;
		-o-animation-delay: 1.73s;
		-ms-animation-delay: 1.73s;
		-webkit-animation-delay: 1.73s;
		-moz-animation-delay: 1.73s;
	}
	.cssload-thing:nth-child(7) {
		transform: rotate(210deg);
		-o-transform: rotate(210deg);
		-ms-transform: rotate(210deg);
		-webkit-transform: rotate(210deg);
		-moz-transform: rotate(210deg);
		transform-origin: 50% -200%;
		-o-transform-origin: 50% -200%;
		-ms-transform-origin: 50% -200%;
		-webkit-transform-origin: 50% -200%;
		-moz-transform-origin: 50% -200%;
		animation-delay: 2.01s;
		-o-animation-delay: 2.01s;
		-ms-animation-delay: 2.01s;
		-webkit-animation-delay: 2.01s;
		-moz-animation-delay: 2.01s;
	}
	.cssload-thing:nth-child(8) {
		transform: rotate(240deg);
		-o-transform: rotate(240deg);
		-ms-transform: rotate(240deg);
		-webkit-transform: rotate(240deg);
		-moz-transform: rotate(240deg);
		transform-origin: 50% -200%;
		-o-transform-origin: 50% -200%;
		-ms-transform-origin: 50% -200%;
		-webkit-transform-origin: 50% -200%;
		-moz-transform-origin: 50% -200%;
		animation-delay: 2.3s;
		-o-animation-delay: 2.3s;
		-ms-animation-delay: 2.3s;
		-webkit-animation-delay: 2.3s;
		-moz-animation-delay: 2.3s;
	}
	.cssload-thing:nth-child(9) {
		transform: rotate(270deg);
		-o-transform: rotate(270deg);
		-ms-transform: rotate(270deg);
		-webkit-transform: rotate(270deg);
		-moz-transform: rotate(270deg);
		transform-origin: 50% -200%;
		-o-transform-origin: 50% -200%;
		-ms-transform-origin: 50% -200%;
		-webkit-transform-origin: 50% -200%;
		-moz-transform-origin: 50% -200%;
		animation-delay: 2.59s;
		-o-animation-delay: 2.59s;
		-ms-animation-delay: 2.59s;
		-webkit-animation-delay: 2.59s;
		-moz-animation-delay: 2.59s;
	}
	.cssload-thing:nth-child(10) {
		transform: rotate(300deg);
		-o-transform: rotate(300deg);
		-ms-transform: rotate(300deg);
		-webkit-transform: rotate(300deg);
		-moz-transform: rotate(300deg);
		transform-origin: 50% -200%;
		-o-transform-origin: 50% -200%;
		-ms-transform-origin: 50% -200%;
		-webkit-transform-origin: 50% -200%;
		-moz-transform-origin: 50% -200%;
		animation-delay: 2.88s;
		-o-animation-delay: 2.88s;
		-ms-animation-delay: 2.88s;
		-webkit-animation-delay: 2.88s;
		-moz-animation-delay: 2.88s;
	}
	.cssload-thing:nth-child(11) {
		transform: rotate(330deg);
		-o-transform: rotate(330deg);
		-ms-transform: rotate(330deg);
		-webkit-transform: rotate(330deg);
		-moz-transform: rotate(330deg);
		transform-origin: 50% -200%;
		-o-transform-origin: 50% -200%;
		-ms-transform-origin: 50% -200%;
		-webkit-transform-origin: 50% -200%;
		-moz-transform-origin: 50% -200%;
		animation-delay: 3.16s;
		-o-animation-delay: 3.16s;
		-ms-animation-delay: 3.16s;
		-webkit-animation-delay: 3.16s;
		-moz-animation-delay: 3.16s;
	}
	.cssload-thing:nth-child(12) {
		transform: rotate(360deg);
		-o-transform: rotate(360deg);
		-ms-transform: rotate(360deg);
		-webkit-transform: rotate(360deg);
		-moz-transform: rotate(360deg);
		transform-origin: 50% -200%;
		-o-transform-origin: 50% -200%;
		-ms-transform-origin: 50% -200%;
		-webkit-transform-origin: 50% -200%;
		-moz-transform-origin: 50% -200%;
		animation-delay: 3.45s;
		-o-animation-delay: 3.45s;
		-ms-animation-delay: 3.45s;
		-webkit-animation-delay: 3.45s;
		-moz-animation-delay: 3.45s;
	}
	
	@keyframes somecssload-thing_maybe_cool_idk {
		50% {
			background: rgb(0,0,0);
			transform-origin: 50% -170%;
		}
	}
	
	@-o-keyframes somecssload-thing_maybe_cool_idk {
		50% {
			background: rgb(0,0,0);
			-o-transform-origin: 50% -170%;
		}
	}
	
	@-ms-keyframes somecssload-thing_maybe_cool_idk {
		50% {
			background: rgb(0,0,0);
			-ms-transform-origin: 50% -170%;
		}
	}
	
	@-webkit-keyframes somecssload-thing_maybe_cool_idk {
		50% {
			background: rgb(0,0,0);
			-webkit-transform-origin: 50% -170%;
		}
	}
	
	@-moz-keyframes somecssload-thing_maybe_cool_idk {
		50% {
			background: rgb(0,0,0);
			-moz-transform-origin: 50% -170%;
		}
	}
	 /*модальное окно загрузки 2 */
	
	
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
				<p>Сделан импорт <strong class="counter">N</strong> лексем! Для обновления групп страница будет перезагруженна через 10 сек!</p>
			</div>
			<div class="col-md-7 alert alert-success success-find inner" style="display:none;">
				<p>Сделан поиск переводов, найдено <strong class="counter">N</strong> лексем! Для обновления групп страница будет перезагруженна через 10 сек!</p>
			</div>
			<div class="col-md-6 alert alert-success success-publish inner" style="display:none;">
				<p>Совершены публикации переводов для группы '{{ $group }}'!</p>
			</div>
			<div class="col-md-6 alert alert-success success-publish-all inner" style="display:none;">
				<p>Совершены публикации всех групп переводов!</p>
			</div>
	     <div class="col-md-6 alert alert-success success-clear inner" style="display:none;">
				<p>Таблица лексем очищена.</p>
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
								<form class="form-clear" method="POST"
											action="{{ action('\App\Http\Controllers\TranslationManagerController@clearTable') }}" data-remote="true"
											role="form"
											data-confirm="Внимание! Вы уверены, что хотите очистить таблицу лексем?">
									{{ csrf_field() }}
									
									<div class="form-group is-empty">
										<label class="control-label">{{trans('translations.clearTable')}}</label>
											<div class="input-group">
												<span class="input-group-addon">
													<button type="submit" class="btn btn-danger navbar-form navbar-right"
																	data-disable-with="Очистка..">
														<i class="fa fa-trash"></i> Удалить все переводы
													</button>
                    		</span>
											</div>
									</div>
									
								</form>
									<br>
									<form class="form-import hide-content" method="POST"
												action="{{ action('\Barryvdh\TranslationManager\Controller@postImport') }}"
												data-remote="true" role="form">
										{{ csrf_field() }}
										<div class="form-group is-empty">
											<label for="sample-value" class="control-label">Загрузка групп</label>
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-download"></i></span>
													<select name="replace" class="form-control">
														<option value="0">загрузить новые переводы</option>
														<option value="1">заменить существующие переводы</option>
													</select>
													<span class="input-group-addon">
													<button type="submit" class="btn btn-default"
																	data-disable-with="Загрузка..">
														<i class="fa fa-plus"></i></button>
                    		</span>
												</div>
										</div>
									</form>
									<br>
									<form class="form-find" method="POST"
												action="{{ action('\Barryvdh\TranslationManager\Controller@postFind') }}" data-remote="true"
												role="form"
												data-confirm="Вы уверены, что Вы хотите сканировать вашу папку приложения? Все найденные ключи перевода будут добавлены в базу данных.">
										{{ csrf_field() }}
										<div class="form-group is-empty">
											<label class="control-label">Поиск переводов в файлах</label>
												<div class="input-group">
												<span class="input-group-addon">
													<button type="submit" class="btn btn-default navbar-form navbar-right" data-disable-with="Поиск..">
												<i class="fa fa-search"></i> Найти все</button>
                    		</span>
												</div>
										</div>
									</form>
								@endif
								@if($group)
										<div class="form-group is-empty">
											<label class="control-label">{{trans('translations.edit_group')}}</label>
											
										</div>
										<div class="navbar-form navbar-right">
											<a style="float: right;"
												 href="{{ action('\Barryvdh\TranslationManager\Controller@getIndex') }}"
												 class="btn btn-default">Назад</a>
										</div>
								@else
									<br>
										<div class="form-group is-empty">
											<label class="control-label">Локали</label>
										</div>
									{{--<fieldset>
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
									</fieldset>--}}
										<p class="alert alert-secondary">Для добавления локали необходимо
											в файле конфигураций <code>config/admin.php</code>
											в <code>extensions.multi-language.languages[]</code>
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
									<legend class="box-title">Редактор переводов</legend>
							<br>
							<form role="form" method="POST" class="form-horizontal"
										action="{{ action('\Barryvdh\TranslationManager\Controller@postAddGroup') }}">
								{{ csrf_field() }}
								<div class="form-group   is-empty">
									<label for="sample-value" class="col-sm-3 control-label">Выбрать группу</label>
									<div class="col-sm-7">
										<div class="input-group">
											<span class="input-group-addon" style="padding-left: 18px;">
												<i class="fa fa-bars"></i>&nbsp;</span>
											<select name="group" id="group" class="form-control group-select">
												@foreach($groups as $key => $value)
													<option value="{{ $key }}" {{ $key == $group ? ' selected' : '' }}
													>{{ $value }}
													</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								
								@if(!isset($group))
									<p class="alert alert-secondary">Если ни одна из групп не видна, убедитесь, что вы
										запустили миграцию и импортировали переводы на левой вкладке.</p>
								
									<div class="form-group   is-empty">
										<label for="sample-value" class="col-sm-3  control-label">Новая группа переводов</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
												<input type="text" name="new-group" id="new-group" class="form-control"
															 placeholder="создать группу переводов"/>
												<span class="input-group-addon">
													<button type="submit" class="btn btn-default" name="add-group"
																	value="Добавить"><i class="fa fa-plus"></i> Создать</button>
                    		</span>
											</div>
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
									<div class="form-group is-empty">
										<label for="sample-value" class="col-sm-3  control-label">Добавить новые ключи в этой группе</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
												<textarea class="form-control" rows="3" name="keys"
																	placeholder="Добавьте 1 ключ в каждой строке, без префикса группы">
											</textarea>
												<span class="input-group-addon">
													<button type="submit" value="Добавить ключ" class="btn btn-default">
												<i class="fa fa-plus"></i> Добавить</button>
                    		</span>
											</div>
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
						        @php ($t = isset($translation[$locale]) ? $translation[$locale] : null)
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
													 data-confirm="Вы уверены, что хотите удалить переводы '{{ htmlentities($key, ENT_QUOTES, 'UTF-8', false) }}?"><span
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

{{--модальное окно загрузки 1--}}
<div class="cssload-preloader hidden">
	<span>З</span>
	<span>а</span>
	<span>г</span>
	<span>р</span>
	<span>у</span>
	<span>з</span>
	<span>к</span>
	<span>а</span>
</div>

{{--модальное окно загрузки 2--}}
<div class="cssload-container hidden">
	<div class="cssload-thing"></div>
	<div class="cssload-thing"></div>
	<div class="cssload-thing"></div>
	<div class="cssload-thing"></div>
	<div class="cssload-thing"></div>
	<div class="cssload-thing"></div>
	<div class="cssload-thing"></div>
	<div class="cssload-thing"></div>
	<div class="cssload-thing"></div>
	<div class="cssload-thing"></div>
	<div class="cssload-thing"></div>
	<div class="cssload-thing"></div>
</div>
