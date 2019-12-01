<style>
	a.status-1{
		font-weight: bold;
	}
</style>
<script>
    jQuery(document).ready(function($){

        $.ajaxSetup({
            beforeSend: function(xhr, settings) {
                console.log('beforesend');
                settings.data += "&_token=<?php echo csrf_token() ?>";
            }
        });

        $('.editable').editable().on('hidden', function(e, reason){
            var locale = $(this).data('locale');
            if(reason === 'save'){
                $(this).removeClass('status-0').addClass('status-1');
            }
            if(reason === 'save' || reason === 'nochange') {
                var $next = $(this).closest('tr').next().find('.editable.locale-'+locale);
                setTimeout(function() {
                    $next.editable('show');
                }, 300);
            }
        });

        $('.group-select').on('change', function(){
            var group = $(this).val();
            if (group) {
                window.location.href = '<?php echo action('\Barryvdh\TranslationManager\Controller@getView') ?>/'+$(this).val();
            } else {
                window.location.href = '<?php echo action('\Barryvdh\TranslationManager\Controller@getIndex') ?>';
            }
        });

        $("a.delete-key").click(function(event){
            event.preventDefault();
            var row = $(this).closest('tr');
            var url = $(this).attr('href');
            var id = row.attr('id');
            $.post( url, {id: id}, function(){
                row.remove();
            } );
        });
        {{--время показа сообщения--}}
        var live_time = 10000;
        $('.form-import').on('ajax:success', function (e, data) {
            $('div.success-import strong.counter').text(data.counter);
            $('div.success-import').slideDown();
            // window.location.reload();
            setTimeout(function() { window.location=window.location;},live_time);
        });

        $('.form-find').on('ajax:success', function (e, data) {
            $('div.success-find strong.counter').text(data.counter);
            $('div.success-find').slideDown();
            // window.location.reload();
            setTimeout(function() { window.location=window.location;},live_time);
        });

        $('.form-publish').on('ajax:success', function (e, data) {
            $('div.success-publish').slideDown();
            // window.location.reload();
            setTimeout(function() { $('div.success-publish').slideUp();},live_time);
        });

        $('.form-publish-all').on('ajax:success', function (e, data) {
            $('div.success-publish-all').slideDown();
            // window.location.reload();
            setTimeout(function() { $('div.success-publish-all').slideUp();},live_time);
        });
        $('.form-clear').on('ajax:success', function (e, data) {
            $('div.success-clear').slideDown();
            // window.location.reload();
            setTimeout(function() { $('div.success-clear').slideUp();},live_time);
        });
        $('.enable-auto-translate-group').click(function (event) {
            event.preventDefault();
            $('.autotranslate-block-group').removeClass('hidden');
            $('.enable-auto-translate-group').addClass('hidden');
        });
        // не используется
        /*$('#base-locale').change(function (event) {
            console.log($(this).val());
            $.cookie('base_locale', $(this).val());
        });*/
        /*if (typeof $.cookie('base_locale') !== 'undefined') {
            $('#base-locale').val($.cookie('base_locale'));
        }*/
    });
    
    // прелоадер 2 типа
    // $content = $(".cssload-preloader");
    $content = $(".cssload-container");
    $(document).on({
        ajaxStart: function() { $content.removeClass("hidden");    },
        ajaxStop: function() { $content.addClass ("hidden"); }
    });
	
</script>


