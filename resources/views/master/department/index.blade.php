<script>
    (function () {
        const dgDepartment  = $('#dg-departments');
        const dlgDepartment = $('#dlg-department');
        const fmDepartment  = $('#fm-department');

        const newDepartment = () => {
            dlgDepartment.dialog('open').dialog('setTitle', 'New Department');
            fmDepartment.form('clear');
            window.url = '{{ route('departments.store') }}';
        }
        const editDepartment = () => {
            const row = dgDepartment.datagrid('getSelected');
            if (row) {
                dlgDepartment.dialog('open').dialog('setTitle', 'Edit Department');
                fmDepartment.form('load', row);
                window.url = '{{ url('/master/departments') }}/' + row.id;
                window.formMethod = 'PUT';
            }
        }
        const destroyDepartment = () => {
            const row = dgDepartment.datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirm', 'Are you sure you want to destroy this user?', function (r) {
                    if (r) {
                        $.post('{{ url('/master/departments') }}/' + row.id, {
                            id: row.id,
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        }, function (result) {
                            if (result.successMsg) {
                                $('#dg-departments').datagrid('reload');    // reload the user data
                                $.messager.show({
                                    title: 'Success',
                                    msg: result.successMsg
                                });
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
        window.saveDepartment = () => {
            fmDepartment.form('submit', {
                url: window.url,
                onSubmit: function (param) {
                    param._token = '{{ csrf_token() }}';
                    if(window.formMethod === 'PUT') {
                        param._method = 'PUT';
                    }
                    return $(this).form('validate');
                },
                success: function (res) {
                    const result = JSON.parse(res);
                    if (result.errorMsg) {
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        dlgDepartment.dialog('close');        // close the dialog
                        dgDepartment.datagrid('reload');    // reload the user data
                        $.messager.show({
                            title: 'Success',
                            msg: result.successMsg
                        });
                    }
                }
            });
        }

        dgDepartment.datagrid({
            url: '{{ route('departments.data') }}',
            fitColumns: true,
            pagination: true,
            pagePosition: 'top',
            striped: true,
            nowrap: true,
            ctrlSelect: true,
            queryParams: {
                _token: '{{ csrf_token() }}'
            },
            sortName: 'department_code',
            multiSort: true,
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
                        title: 'Code',
                        sortable: true,
                    },
                    {
                        field: 'department_name',
                        title: 'Name',
                        sortable: true,
                    },
                    {
                        field: 'description',
                        title: 'Description',
                        sortable: true,
                    }
                ]
            ]
        });
    })();
</script>


<table id="dg-departments"></table>

<div id="dlg-department" class="easyui-dialog" style="width: 600px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm-department" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Department Information</h3>
        <div style="margin-bottom:10px">
            <input name="department_code" class="easyui-textbox" required label="Code:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="department_name" class="easyui-textbox" required label="Name:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="description" data-options="multiline:true,height:80" class="easyui-textbox" label="Description:" style="width:100%">
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="window.saveDepartment()" style="width:90px">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="$('#dlg-department').dialog('close')" style="width:90px">Cancel</a>
</div>
