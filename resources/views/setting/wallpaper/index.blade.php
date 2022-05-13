<script>
    (function() {
        const template = '<div>' +
            '<div region="west" title="Background" split="true" style="width:120px"><table id="wallpaper-dl"></table></div>' +
            '<div region="center" title="Preview"><img id="settings-img" style="border:0;width:100%;height:98%" alt="Wallpaper"></div>' +
            '</div>';
        const layout = $(template).appendTo($('#tt-setting').tabs('getTab', 'Wallpaper'));
        layout.layout({
            fit: true
        });
        const wallpaper = $('#wallpaper-dl');
        wallpaper.datalist({
            fit: true,
            data: [
                {"text": "Desktop", "img": "images/wallpapers/bg.jpg"},
                {"text": "Desktop2", "img": "images/wallpapers/bg2.jpg"},
                {"text": "Desktop3", "img": "images/wallpapers/bg3.jpg"}
            ],
            onLoadSuccess: function () {
                $(this).datalist('selectRow', 0);
            },
            onSelect(index, row) {
                $('#settings-img').attr('src', row.img);
                $('body').desktop('setWallpaper', wallpaper.datalist('getSelected').img);
            }
        });
        $('<a style="margin-right:10px"></a>').appendTo(layout.layout('panel', 'south')).linkbutton({
            text: 'Ok',
            width: 80,
            onClick: function () {
                $('body').desktop('setWallpaper', $('#settings-dl').datalist('getSelected').img);
                $('#settings').window('close');
            }
        })
        $('<a></a>').appendTo(layout.layout('panel', 'south')).linkbutton({
            text: 'Cancel',
            width: 80,
            onClick: function () {
                $('#settings').window('close');
            }
        })
    })();
</script>
