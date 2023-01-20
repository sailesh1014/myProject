<script>
    function deleteGenre(id, redirect = false) {
        let table = 'genreDatatable';
        let action = BASE_URL + "/dashboard/genres/" + id;
        $.ajax({
            "url": action,
            "dataType": "json",
            "type": "DELETE",
            "data": {"_token": CSRF_TOKEN},
            beforeSend: function () {
                console.log(id);
                removeRowFromTable(table, id);
            },
            success: function (resp) {
                if (redirect) {
                    alertifySuccessAndRedirect(resp.message, "{{route('genres.index')}}");
                } else {
                    alertifySuccess(resp.message);
                }
            },
            error: function (xhr) {
                showRowFromTable(table, id);
                const message = xhr.responseText !== "" ? xhr.responseText : "Something went wrong!!!";
                toastError(message);
            }
        });
    }
</script>
