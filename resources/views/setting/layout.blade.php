<script type="text/javascript">
    (function () {
        $('body').desktop('openApp', settingsApp);
        const template = '<div>' +
            '<div region="north" style="padding:5px;height:45px;text-align:right"></div>' +
            '<div region="south" style="text-align:right;height:45px;padding:5px"></div>' +
            '<div region="west" title="Background" split="true" style="width:120px"><table id="settings-dl"></table></div>' +
            '<div region="center" title="Setting" class="easyui-tabs" id="tt-setting"></div>' +
            '</div>';
        const layout = $(template).appendTo('#settings');
        layout.layout({
            fit: true
        });
        const combo = $('<input>').appendTo(layout.layout('panel', 'north'));
        combo.combobox({
            url: '{{ route('setting.themes') }}',
            queryParams: {
              _token: '{{ csrf_token() }}'
            },
            width: 300,
            label: 'Themes: ',
            value: '{{ \Illuminate\Support\Facades\Auth::user()->setting->theme->text }}',
            editable: false,
            panelHeight: 'auto',
            onChange: function (theme) {
                $.ajax({
                    url: '{{ url('/setting/themes') }}/' + theme + '/set',
                    method: 'POST',
                    data: {_token: '{{ csrf_token() }}'},
                    success(result) {
                        const res = JSON.parse(result);
                        if(res.status) {
                            console.log(theme)
                            const link = $('head').find('link:first');
                            link.attr('href', '{{ asset('jquery-easyui-1.10.3/themes/') }}/' + theme + '/easyui.css');
                            $.messager.show({
                                title: 'Success',
                                msg: res.successMsg
                            });
                        }else {
                            $.messager.show({
                                title: 'Failed',
                                msg: res.errorMsg
                            });
                        }
                    },
                    error(err) {
                        console.log(err)
                        $.messager.show({
                            title: 'Failed',
                            msg: 'Failed to change theme, Internal server error'
                        });
                    }
                })
            },
        });
        $('#settings-dl').datalist({
            fit: true,
            data: [
                {"text": "Wallpaper", "data" : "{{ route('settingwallpapers.index') }}"},
            ],
            // onLoadSuccess: function () {
            //     $(this).datalist('selectRow', 0);
            // },
            onSelect(index, row) {
                const tabSetting = $('#tt-setting');
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
    })();
</script>
