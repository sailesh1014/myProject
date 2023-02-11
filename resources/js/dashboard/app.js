import.meta.glob([
    '../../img/dashboard/**',
]);
import flatpickr from "flatpickr";
import FilePondPluginFileEncode from 'filepond-plugin-file-encode';


$(function () {
    /** toggle password starts **/
    $('.btn-toggle-password').on('click', function () {
        let eyeSlashedIcon = $(this).find('.bi-eye-slash');
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

    /** Image close */
    $('.hi_preview_image_close').on('click',function (e) {
        e.preventDefault();
        let parent_container = $(this).parent('.hi_preview_image_container');
        parent_container.addClass('d-none');
        parent_container.siblings("input[type='file']").val('');
        parent_container.siblings("input[type='hidden']").val('');
    });
    /** Image close ends */

    window.confirmDelete = confirmDelete;
    window.removeRowFromTable = removeRowFromTable;
    window.showRowFromTable = showRowFromTable;
    window.loadPreview = loadPreview;

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

/** preview currently uploaded images on form**/
function loadPreview(input, id) {
    id = id || '#hi_preview_img';
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        };
        input.previousElementSibling.value = 'yes';
        reader.readAsDataURL(input.files[0]);
    }
}

