<script type="text/javascript">
    $('#sm').sidemenu({
        data: [{
            text: 'Department',
            iconCls: 'icon-more',
            // state: 'open',
            children: [{
                text: 'Data',
                data: '{{ route('departments.index') }}'
            }, {
                text: 'Create'
            }, {
                text: 'Option3',
                children: [{
                    text: 'Option31'
                }, {
                    text: 'Option32'
                }]
            }]
        }, {
            text: 'Item2',
            iconCls: 'icon-more',
            children: [{
                text: 'Option4'
            }, {
                text: 'Option5'
            }, {
                text: 'Option6'
            }]
        }],
        onSelect: function (node) {
            const tabMaster = $('#tt');
            let isExists = tabMaster.tabs('exists', node.text);
            if(isExists) {
                const tab = tabMaster.tabs('getTab', node.text)
                const index = tabMaster.tabs('getTabIndex', tab);
                tabMaster.tabs('select', index);
            }else {
                tabMaster.tabs('add',{
                    title: node.text,
                    href: node.data,
                    closable: true
                });
            }
        }
    });
</script>
<div class="easyui-layout" fit="true">
    <div data-options="region:'west',split:true,hideCollapsedContent:true" title="" style="width:200px;">
        <div id="sm"></div>
    </div>
    <div data-options="region:'center',title:'Master Data'">
        <div id="tt" class="easyui-tabs" data-options="fit:true,border:false,plain:true"></div>
    </div>
</div>
