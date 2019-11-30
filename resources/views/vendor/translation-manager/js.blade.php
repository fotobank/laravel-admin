
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

        $('.form-import').on('ajax:success', function (e, data) {
            $('div.success-import strong.counter').text(data.counter);
            $('div.success-import').slideDown();
            // window.location.reload();
            setTimeout(function() { window.location=window.location;},10000);
        });

        $('.form-find').on('ajax:success', function (e, data) {
            $('div.success-find strong.counter').text(data.counter);
            $('div.success-find').slideDown();
            // window.location.reload();
            setTimeout(function() { window.location=window.location;},10000);
        });

        $('.form-publish').on('ajax:success', function (e, data) {
            $('div.success-publish').slideDown();
        });

        $('.form-publish-all').on('ajax:success', function (e, data) {
            $('div.success-publish-all').slideDown();
        });
        $('.enable-auto-translate-group').click(function (event) {
            event.preventDefault();
            $('.autotranslate-block-group').removeClass('hidden');
            $('.enable-auto-translate-group').addClass('hidden');
        })
        $('#base-locale').change(function (event) {
            console.log($(this).val());
            $.cookie('base_locale', $(this).val());
        })
        if (typeof $.cookie('base_locale') !== 'undefined') {
            $('#base-locale').val($.cookie('base_locale'));
        }

    })
</script>



