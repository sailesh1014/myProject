<script>
    function deleteRole(id,redirect = false)
    {
        let table = 'rolesDatatable';
        let action = BASE_URL+"/dashboard/roles/"+id;
        $.ajax({
            "url": action,
            "dataType":"json",
            "type":"DELETE",
            "data":{"_token":CSRF_TOKEN},
            beforeSend:function(){
                removeRowFromTable(table,id);
            },
            success:function(resp){
                if(redirect){
                    alertifySuccessAndRedirect(resp.message, "{{route('roles.index')}}");
                }else{
                    alertifySuccess(resp.message);
                }
            },
            error: function(xhr){
                showRowFromTable(table, id);
                const message = xhr.responseText !== "" ? xhr.responseText : "Something went wrong!!!";
                toastError(message);
            }
        });
    }
</script>
