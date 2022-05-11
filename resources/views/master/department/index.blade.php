<script>
    (function () {
        const dgDepartment = $('#dg-departments');
        const newDepartment = () => {
            $('#dlg').dialog('open').dialog('setTitle', 'New Department');
            $('#fm').form('clear');
            url = 'save_user.php';
        }
        const editDepartment = () => {
            const row = dgDepartment.datagrid('getSelected');
            if (row) {
                $('#dlg').dialog('open').dialog('setTitle', 'Edit Department');
                $('#fm').form('load', row);
                url = 'update_user.php?id=' + row.id;
            }
        }
        const destroyDepartment = () => {
            const row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirm', 'Are you sure you want to destroy this user?', function (r) {
                    if (r) {
                        $.post('destroy_user.php', {id: row.id}, function (result) {
                            if (result.success) {
                                $('#dg').datagrid('reload');    // reload the user data
                            } else {
                                $.messager.show({    // show error message
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }
        const saveDepartment = () => {
            $('#fm').form('submit', {
                url: url,
                onSubmit: function () {
                    return $(this).form('validate');
                },
                success: function (result) {
                    var result = eval('(' + result + ')');
                    if (result.errorMsg) {
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }

        dgDepartment.datagrid({
            url: '{{route('departments.data')}}',
            fitColumns: true,
            pagination: true,
            pagePosition: 'top',
            toolbar: [
                {
                    iconCls: 'icon-add',
                    text: 'New Department',
                    handler: newDepartment,
                },
                '-',
                {
                    iconCls: 'icon-edit',
                    text: 'Edit Department',
                    handler: editDepartment,
                },
                '-',
                {
                    iconCls: 'icon-remove',
                    text: 'Remove Department',
                    handler: destroyDepartment,
                }
            ],
            columns: [
                [
                    {
                        field: 'department_code',
                        title: 'Code'
                    },
                    {
                        field: 'department_name',
                        title: 'Name'
                    },
                    {
                        field: 'description',
                        title: 'Description'
                    }
                ]
            ]
        });
    })();
</script>


<table id="dg-departments"></table>

<div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Department Information</h3>
        <div style="margin-bottom:10px">
            <input name="department_code" class="easyui-textbox" required="true" label="Code:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="department_name" class="easyui-textbox" required="true" label="Name:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="phone" class="easyui-textbox" required="true" label="Phone:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="email" class="easyui-textbox" required="true" validType="email" label="Email:" style="width:100%">
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="$('#dlg').dialog('close')" style="width:90px">Cancel</a>
</div>
