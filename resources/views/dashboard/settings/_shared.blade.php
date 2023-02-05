<script>
    function deleteUser(id, redirect = false) {
        let table = 'userDatatable';
        let action = BASE_URL + "/dashboard/users/" + id;
        $.ajax({
            "url": action,
            "dataType": "json",
            "type": "DELETE",
            "data": {"_token": CSRF_TOKEN},
            beforeSend: function () {
                removeRowFromTable(table, id);
            },
            success: function (resp) {
                if (redirect) {
                    alertifySuccessAndRedirect(resp.message, "{{route('users.index')}}");
                } else {
                    alertifySuccess(resp.message);
                }
            },
            error: function (xhr) {
                showRowFromTable(table, id);
                console.log(xhr);
                const message = xhr.responseJSON?.message !== "" ? xhr.responseJSON?.message : "Something went wrong!!!";
                toastError(message);
            }
        });
    }
</script>
