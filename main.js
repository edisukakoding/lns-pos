const {BrowserWindow, app} = require('electron');
const phpServer = require('node-php-server');
const path = require('path');

const port = 8000;
const host = '127.0.0.1';
const serverUrl = `http://${host}:${port}`;

app.whenReady().then(async () => {
    await createWindow();

    //code for mac os
    app.on('activate', () => {
        if (BrowserWindow.getAllWindows().length === 0) createWindow();
    })
});

app.on('window-all-closed', () => {
    if (process.platform !== 'darwin') app.quit();
    phpServer.close();
});


const createWindow = async () => {
    phpServer.createServer({
        port: port,
        hostname: host,
        base: path.join(__dirname, 'public'),
        keepalive: false,
        open: false,
        debug: true,

        bin: path.join(__dirname, 'php/php.exe'),
        // bin: 'C:\\tools\\php81\\php.exe',
        router: path.join(__dirname, 'server.php')
    })

    const window = new BrowserWindow();
    await window.loadURL(serverUrl);
    window.webContents.openDevTools();
}
