<script type="text/javascript">
    const data = {
        "total": 28, "rows": [
            {
                "productid": "FI-SW-01",
                "productname": "Koi",
                "unitcost": 10.00,
                "status": "P",
                "listprice": 36.50,
                "attr1": "Large",
                "itemid": "EST-1"
            },
            {
                "productid": "K9-DL-01",
                "productname": "Dalmation",
                "unitcost": 12.00,
                "status": "P",
                "listprice": 18.50,
                "attr1": "Spotted Adult Female",
                "itemid": "EST-10"
            },
            {
                "productid": "RP-SN-01",
                "productname": "Rattlesnake",
                "unitcost": 12.00,
                "status": "P",
                "listprice": 38.50,
                "attr1": "Venomless",
                "itemid": "EST-11"
            },
            {
                "productid": "RP-SN-01",
                "productname": "Rattlesnake",
                "unitcost": 12.00,
                "status": "P",
                "listprice": 26.50,
                "attr1": "Rattleless",
                "itemid": "EST-12"
            },
            {
                "productid": "RP-LI-02",
                "productname": "Iguana",
                "unitcost": 12.00,
                "status": "P",
                "listprice": 35.50,
                "attr1": "Green Adult",
                "itemid": "EST-13"
            },
            {
                "productid": "FL-DSH-01",
                "productname": "Manx",
                "unitcost": 12.00,
                "status": "P",
                "listprice": 158.50,
                "attr1": "Tailless",
                "itemid": "EST-14"
            },
            {
                "productid": "FL-DSH-01",
                "productname": "Manx",
                "unitcost": 12.00,
                "status": "P",
                "listprice": 83.50,
                "attr1": "With tail",
                "itemid": "EST-15"
            },
            {
                "productid": "FL-DLH-02",
                "productname": "Persian",
                "unitcost": 12.00,
                "status": "P",
                "listprice": 23.50,
                "attr1": "Adult Female",
                "itemid": "EST-16"
            },
            {
                "productid": "FL-DLH-02",
                "productname": "Persian",
                "unitcost": 12.00,
                "status": "P",
                "listprice": 89.50,
                "attr1": "Adult Male",
                "itemid": "EST-17"
            },
            {
                "productid": "AV-CB-01",
                "productname": "Amazon Parrot",
                "unitcost": 92.00,
                "status": "P",
                "listprice": 63.50,
                "attr1": "Adult Male",
                "itemid": "EST-18"
            }
        ]
    };

    const menus = [{
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
    }];

    $('#sm').sidemenu({
        data: menus,
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
        <div id="tt" class="easyui-tabs" data-options="fit:true,border:false,plain:true">
{{--            <div title="About" data-options="href:'jquery-easyui-1.10.3/demo/jquery-easyui-desktop-1.0.1/_about.html'"--}}
{{--                 style="padding:10px"></div>--}}
{{--            <div title="DataGrid" style="padding:5px">--}}
{{--                <table class="easyui-datagrid"--}}
{{--                       data-options="data:data,singleSelect:true,fit:true,fitColumns:true">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th data-options="field:'itemid'" width="80">Item ID</th>--}}
{{--                        <th data-options="field:'productid'" width="100">Product ID</th>--}}
{{--                        <th data-options="field:'listprice',align:'right'" width="80">List Price</th>--}}
{{--                        <th data-options="field:'unitcost',align:'right'" width="80">Unit Cost</th>--}}
{{--                        <th data-options="field:'attr1'" width="150">Attribute</th>--}}
{{--                        <th data-options="field:'status',align:'center'" width="50">Status</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                </table>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
