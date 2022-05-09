<script>
    $('#dg-departments').datagrid({
        url: '{{route('departments.data')}}',
        fitColumns: true,
        pagination: true,
        pagePosition: 'top',
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
    })
</script>


<table id="dg-departments"></table>

