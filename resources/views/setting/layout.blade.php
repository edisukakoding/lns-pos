<script type="text/javascript">
    {{--$('#sm').sidemenu({--}}
    {{--    data: [{--}}
    {{--        text: 'Setting',--}}
    {{--        iconCls: 'icon-setting',--}}
    {{--        // state: 'open',--}}
    {{--        children: [{--}}
    {{--            text: 'Data',--}}
    {{--            data: '{{ route('departments.index') }}'--}}
    {{--        }, {--}}
    {{--            text: 'Create'--}}
    {{--        }, {--}}
    {{--            text: 'Option3',--}}
    {{--            children: [{--}}
    {{--                text: 'Option31'--}}
    {{--            }, {--}}
    {{--                text: 'Option32'--}}
    {{--            }]--}}
    {{--        }]--}}
    {{--    }, {--}}
    {{--        text: 'Item2',--}}
    {{--        iconCls: 'icon-more',--}}
    {{--        children: [{--}}
    {{--            text: 'Option4'--}}
    {{--        }, {--}}
    {{--            text: 'Option5'--}}
    {{--        }, {--}}
    {{--            text: 'Option6'--}}
    {{--        }]--}}
    {{--    }],--}}
    {{--    onSelect: function (node) {--}}
    {{--        const tabMaster = $('#tt');--}}
    {{--        let isExists = tabMaster.tabs('exists', node.text);--}}
    {{--        if(isExists) {--}}
    {{--            const tab = tabMaster.tabs('getTab', node.text)--}}
    {{--            const index = tabMaster.tabs('getTabIndex', tab);--}}
    {{--            tabMaster.tabs('select', index);--}}
    {{--        }else {--}}
    {{--            tabMaster.tabs('add',{--}}
    {{--                title: node.text,--}}
    {{--                href: node.data,--}}
    {{--                closable: true--}}
    {{--            });--}}
    {{--        }--}}
    {{--    }--}}
    {{--});--}}
    $('#settings-dl').datalist({
        fit: true,
        data: [
            {
                "text": "Wallpaper",
                "data": "{{ route('departments.index') }}"
            },
            {"text": "Desktop2", "img": "images/bg2.jpg"},
            {"text": "Desktop3", "img": "images/bg3.jpg"}
        ],
        // onLoadSuccess: function () {
        //     $('#tt').tabs('add',{
        //         title: 'Wallpaper',
        //         content: 'Tab Njing!!',
        //         closable: true
        //     });
        //     $(this).datalist('selectRow', 0);
        // },
        onSelect(index, row) {
            const tabSetting = $('#tt');
            let isExists = tabSetting.tabs('exists', row.text);
            if(isExists) {
                const tab = tabSetting.tabs('getTab', row.text)
                const index = tabSetting.tabs('getTabIndex', tab);
                tabSetting.tabs('select', index);
            }else {
                tabSetting.tabs('add',{
                    title: row.text,
                    href: row.data,
                    closable: true
                });
            }
        }
    });
</script>
<div class="easyui-layout" fit="true">
    <div data-options="region:'west',split:true,hideCollapsedContent:true" title="" style="width:200px;">
        <table id="settings-dl"></table>
    </div>
    <div data-options="region:'center',title:'Settings'">
        <div id="tt" class="easyui-tabs" data-options="fit:true,border:false,plain:true"></div>
    </div>
</div>
