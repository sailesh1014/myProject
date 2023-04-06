import.meta.glob([
    '../../img/front/**',
]);

const  showAjaxErrorsOnForms = (errObj) => {
    console.log(errObj);
    $(".invalid-feedback").css("display", "block");
    $.each(errObj, function (key, val) {
        let err_txt = '';
        let _key = key.split('.')[0];
        $(`input[name^="${_key}"]`).addClass('is-invalid');
        $(`select[name^="${_key}"]`).addClass('is-invalid');
        $(`textarea[name^="${_key}"]`).addClass('is-invalid');
        $.each(val, function (i, v) {
            if(i !== 0 ){
                err_txt += '<br/>';
            }
            err_txt += v;
        });

        $("#" + _key + "_error").html(err_txt);
    });
}
window.showAjaxErrorsOnForms = showAjaxErrorsOnForms;
