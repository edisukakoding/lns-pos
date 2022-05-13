<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- EasyUI -->
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-easyui-1.10.3/themes/material-teal/easyui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-easyui-1.10.3/themes/icon.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('jquery-easyui-1.10.3/demo/jquery-easyui-desktop-1.0.1/desktop.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
    <script type="text/javascript" src="{{ asset('jquery-easyui-1.10.3/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('jquery-easyui-1.10.3/jquery.easyui.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('jquery-easyui-1.10.3/demo/jquery-easyui-desktop-1.0.1/jquery.desktop.js') }}"></script>
    <script>
        // custom ajax req for laravel
        {{--$.extend($.fn.datagrid.defaults, {--}}
        {{--    loader: function (param, success, error) {--}}
        {{--        let opts = $(this).datagrid('options');--}}
        {{--        if (!opts.url) return false;--}}
        {{--        $.ajax({--}}
        {{--            type: opts.method,--}}
        {{--            url: opts.url,--}}
        {{--            data: {...param, "_token": "{{ csrf_token() }}"},--}}
        {{--            dataType: 'json',--}}
        {{--            success: function (data) {--}}
        {{--                success(data);--}}
        {{--            },--}}
        {{--            error: function () {--}}
        {{--                error.apply(this, arguments);--}}
        {{--            }--}}
        {{--        });--}}
        {{--    }--}}
        {{--});--}}
    </script>
    <script type="text/javascript">
        $(function () {
            $('body').desktop({
                apps: [{
                    name: 'Master Data',
                    icon: 'images/monitor.png',
                    width: window.innerWidth - (window.innerWidth * .2), // 960
                    height: window.innerHeight - (window.innerHeight * .4),
                    left: window.innerWidth * .1,
                    top: window.innerHeight * .1,
                    href: '{{ route('layout.master') }}',
                }, {
                    name: 'Network',
                    icon: 'images/network.png',
                    left: 300,
                    top: 100
                }, {
                    name: 'Computer',
                    icon: 'images/computer.png',
                    left: 400,
                    top: 150
                }],
                menus: [{
                    text: 'About Desktop',
                    handler: function () {
                        $('body').desktop('openApp', {
                            icon: 'images/win.png',
                            name: 'About',
                            width: 400,
                            height: 200,
                            href: 'jquery-easyui-1.10.3/demo/jquery-easyui-desktop-1.0.1/_about.html'
                        })
                    }
                }, {
                    text: 'System Update...',
                    handler: function () {
                        $('body').desktop('openApp', {
                            name: 'System Update'
                        })
                    }
                }, {
                    text: 'Recent Items',
                    menus: [{
                        text: 'Activity Monitor'
                    }, {
                        text: 'FaceTime',
                        menus: [{
                            text: 'FaceTime 1'
                        }, {
                            text: 'FaceTime 2',
                            menus: [{
                                text: 'FaceTime 21'
                            }, {
                                text: 'FaceTime 22'
                            }, {
                                text: 'FaceTime 23'
                            }]
                        }]
                    }, {
                        text: 'Mail',
                        menus: [{
                            text: 'Mail 1'
                        }, {
                            text: 'Mail 2'
                        }]
                    }, {
                        text: 'Preview'
                    }]
                }, {
                    text: 'Help',
                    iconCls: 'icon-help',
                    handler: function () {
                        $('body').desktop('openApp', {
                            name: 'Help'
                        })
                    }
                }, {
                    text: 'Logout',
                    iconCls: 'icon-lock',
                    handler: function () {
                        $.messager.confirm({
                            title: 'Confirm',
                            msg: 'Are you sure you want to logout?',
                            border: 'thin',
                            fn: function (confirmed) {
                                if (confirmed) {
                                    $('#fm-logout').submit();
                                }
                            }
                        })
                    }
                }],
                buttons: '#buttons'
            })
        });
        settingsApp = null;

        function settings() {
            if (settingsApp) {
                $('body').desktop('openApp', settingsApp);
                return;
            }
            window.settingsApp = {
                id: 'settings',
                name: 'Settings',
                width: window.innerWidth - (window.innerWidth * .3), // 960
                height: window.innerHeight - (window.innerHeight * .2),
                left: window.innerWidth * .15,
                top: window.innerHeight * .1,
                href: '{{ route('layout.setting') }}',
                onBeforeClose: function () {
                    window.settingsApp = null;
                }
            };
            // $('body').desktop('openApp', settingsApp);
            // const template = '<div>' +
            //     '<div region="north" style="padding:5px;height:45px;text-align:right"></div>' +
            //     '<div region="south" style="text-align:right;height:45px;padding:5px"></div>' +
            //     '<div region="west" title="Background" split="true" style="width:200px"><table id="settings-dl"></table></div>' +
            //     '<div region="center" title="Preview"><img id="settings-img" style="border:0;width:100%;height:100%"></div>' +
            //     '</div>';
            // const layout = $(template).appendTo('#settings');
            // layout.layout({
            //     fit: true
            // });
            // const combo = $('<input>').appendTo(layout.layout('panel', 'north'));
            // combo.combobox({
            //     data: [
            //         {value: 'default', text: 'Default', group: 'Base'},
            //         {value: 'gray', text: 'Gray', group: 'Base'},
            //         {value: 'metro', text: 'Metro', group: 'Base'},
            //         {value: 'material', text: 'Material', group: 'Base'},
            //         {value: 'material-teal', text: 'Material Teal', group: 'Base'},
            //         {value: 'bootstrap', text: 'Bootstrap', group: 'Base'},
            //         {value: 'black', text: 'Black', group: 'Base'},
            //     ],
            //     width: 300,
            //     label: 'Themes: ',
            //     value: 'material-teal',
            //     editable: false,
            //     panelHeight: 'auto',
            //     onChange: function (theme) {
            //         const link = $('head').find('link:first');
            //         link.attr('href', 'https://www.jeasyui.com/easyui/themes/' + theme + '/easyui.css');
            //     }
            // });
            // $('#settings-dl').datalist({
            //     fit: true,
            //     data: [
            //         {"text": "Desktop", "img": "images/bg.jpg"},
            //         {"text": "Desktop2", "img": "images/bg2.jpg"},
            //         {"text": "Desktop3", "img": "images/bg3.jpg"}
            //     ],
            //     onLoadSuccess: function () {
            //         $(this).datalist('selectRow', 0);
            //     },
            //     onSelect(index, row) {
            //         $('#settings-img').attr('src', row.img)
            //     }
            // });
            // $('<a style="margin-right:10px"></a>').appendTo(layout.layout('panel', 'south')).linkbutton({
            //     text: 'Ok',
            //     width: 80,
            //     onClick: function () {
            //         $('body').desktop('setWallpaper', $('#settings-dl').datalist('getSelected').img);
            //         $('#settings').window('close');
            //     }
            // })
            // $('<a></a>').appendTo(layout.layout('panel', 'south')).linkbutton({
            //     text: 'Cancel',
            //     width: 80,
            //     onClick: function () {
            //         $('#settings').window('close');
            //     }
            // })
        }
    </script>
</head>
<body>
<div class="loader">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<form action="{{ route('logout') }}" method="POST" id="fm-logout">
    @csrf
</form>
<div id="buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton" outline="true" plain="true" onclick="settings()">Settings</a>
</div>

{{--<div class="min-h-screen bg-gray-100">--}}
{{--    @include('layouts.navigation')--}}

{{--    <!-- Page Heading -->--}}
{{--    <header class="bg-white shadow">--}}
{{--        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--            {{ $header }}--}}
{{--        </div>--}}
{{--    </header>--}}

{{--    <!-- Page Content -->--}}
{{--    <main>--}}
{{--        {{ $slot }}--}}
{{--    </main>--}}
{{--</div>--}}
<script>
    $(window).on('load', function(){
        $('.loader').delay(1000).fadeOut(function(){
            $(this).remove()
        });
    });
    @if(\Illuminate\Support\Facades\Auth::user()->setting->theme_id)
    const link = $('head').find('link:first');
    link.attr('href', '{{ asset('jquery-easyui-1.10.3/themes/'. Illuminate\Support\Facades\Auth::user()->setting->theme->value .'/easyui.css') }}');
    @endif
</script>
</body>
</html>
