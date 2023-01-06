import.meta.glob([
    '../../img/dashboard/**',
]);
// import '../../css/dashboard/app.css';

$(function () {
    /** toggle password starts **/
    $('.btn-toggle-password').on('click', function () {
        let eyeSlashedIcon = $(this).find('.bi-eye-slash');
        // console.log(eyeSlashedIcon);
        let eyeIcon = $(this).find('.bi-eye');
        if (eyeSlashedIcon.hasClass('d-none')) {
            //hide password (text to password)
            eyeSlashedIcon.removeClass('d-none')
            eyeIcon.addClass('d-none');
            $(this).siblings("input[type='text']").attr('type', 'password');
        } else {
            //show password (password to text)
            eyeSlashedIcon.addClass('d-none')
            eyeIcon.removeClass('d-none');
            $(this).siblings("input[type='password']").attr('type', 'text');
        }
    });
    /** toggle password ends **/
    window.confirmDelete = confirmDelete;
    window.removeRowFromTable = removeRowFromTable;
    window.showRowFromTable = showRowFromTable;



})


/** confirm delete will be triggered as confirm box for every delete request **/
const confirmDelete = (callback) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You are about to delete this record",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        confirmButtonColor: "#ff2828",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.value) {
            callback();
        }
    });
}
/** confirm delete ends **/


/**
 * following row remove and show row are used while deleting from table
 * first the row will be hidden before submitting, to improve user experience
 * if failed, will be shown back
 **/
/** remove row removes row from table **/
function removeRowFromTable(table, id) {
    $('#' + table + ' tr#' + id).hide();
}

/** show row row from table (which was hidden earlier) **/
function showRowFromTable(table, id) {
    $('#' + table + ' tr#' + id).show();
}

/** remove and show row ends here **/
