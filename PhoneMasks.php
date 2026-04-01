<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
jQuery(document).ready(function($) {
    function applyPhoneMasks() {
        $('input[id*="form-field-phone"], input[name*="phone"]').each(function() {
            var $field = $(this);
            
            if (!$field.data('mask-applied')) {
                var originalPlaceholder = $field.attr('placeholder') || 'Ваш номер телефона*';
                
                // Новая маска: +7 (___) ___-__-__
                $field.mask('+7 (000) 000-00-00', {
                    placeholder: '_',
                    showMaskOnFocus: true,
                    showMaskOnHover: false
                });
                
                $field.data('mask-applied', true);
                $field.data('original-placeholder', originalPlaceholder);
                
                $field.on('focus', function() {
                    $(this).attr('placeholder', '');
                    var currentVal = $(this).val();
                    if (currentVal === '' || currentVal === '+7') {
                        $(this).val('+7');
                        var length = $(this).val().length;
                        this.setSelectionRange(length, length);
                    }
                });
                
                $field.on('blur', function() {
                    var currentValue = $(this).val();
                    // Проверка на пустое значение или только +7
                    if (currentValue === '' || currentValue === '+7' || currentValue === '+7 (' || currentValue === '+7 (') {
                        $(this).val('');
                        $(this).attr('placeholder', $(this).data('original-placeholder'));
                    }
                });
                
                // Очистка поля, если там только +7
                if ($field.val() === '' || $field.val() === '+7') {
                    $field.val('');
                    $field.attr('placeholder', originalPlaceholder);
                }
            }
        });
    }
    
    function resetPhoneMasks() {
        $('input[id*="form-field-phone"], input[name*="phone"]').each(function() {
            var $field = $(this);
            var originalPlaceholder = $field.data('original-placeholder') || 'Ваш номер телефона*';
            
            if ($field.data('mask-applied')) {
                $field.mask('remove');
                $field.removeData('mask-applied');
            }
            
            $field.val('');
            $field.attr('placeholder', originalPlaceholder);
        });
        
        setTimeout(applyPhoneMasks, 100);
    }
    
    // Применяем маски при загрузке
    applyPhoneMasks();
    
    // Наблюдатель за динамически добавляемыми элементами
    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length) {
                applyPhoneMasks();
            }
        });
    });
    
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
    
    // Для popup Elementor
    $(document).on('elementor/popup/show', function() {
        setTimeout(applyPhoneMasks, 200);
    });
    
    $(document).on('elementor/popup/hide', function() {
        setTimeout(applyPhoneMasks, 200);
    });
    
    // После успешной отправки формы
    $(document).on('submit_success', 'form.elementor-form', function() {
        setTimeout(function() {
            resetPhoneMasks();
        }, 300);
    });
    
    // Хук для Elementor Pro Forms
    if (typeof elementorProFrontend !== 'undefined') {
        elementorProFrontend.hooks.addAction('frontend/elementor_forms/form_submitted', function() {
            setTimeout(function() {
                resetPhoneMasks();
            }, 300);
        });
    }
});
</script>