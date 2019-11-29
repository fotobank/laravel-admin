@extends('translation-manager::base', ['header' => $header])

@section('content')
    
    <section class="content-header">
        <h1>
            @php ($header = 'title')
            @php ($description = 'description')
            {{ trans('translations.title') }}
            <small>{{ trans('translations.description') }}</small>
        </h1>

        <!-- breadcrumb start -->
        @if(config('admin.enable_default_breadcrumb'))
        <ol class="breadcrumb" style="margin-right: 30px;">
            <li><a href="{{ admin_url('/') }}"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
            @for($i = 2,$iMax = count(Request::segments()); $i <= $iMax; $i++)
                <li>
                {{ucfirst(Request::segment($i))}}
                </li>
            @endfor
        </ol>
        @endif
        <!-- breadcrumb end -->

    </section>

    @push('scripts')
        <script src="{{ asset('public/vendor/translation-manager/public/js/rails.js') }}"></script>
    @endpush
    
    <section class="content">

        @include('admin::partials.alerts')
        @include('admin::partials.exception')
        @include('admin::partials.toastr')
        
        @include('translation-manager::translations')

    </section>
@endsection
