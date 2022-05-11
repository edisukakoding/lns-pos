const {BrowserWindow, app} = require('electron');
const phpServer = require('node-php-server');
const path = require('path');
const dotenv = require('dotenv');
dotenv.config();

const port = 8000;
const host = '127.0.0.1';
const protocol  = 'http';
const serverUrl = `${protocol}://${host}:${port}`;

/**
 * Application lifecycle
 */
app.disableHardwareAcceleration();
app.whenReady().then(async () => {
    await createWindow();

    //code for mac os
    app.on('activate', () => {
        if (BrowserWindow.getAllWindows().length === 0) createWindow();
    })
});
app.on('window-all-closed', () => {

    if (process.platform !== 'darwin') {
        phpServer.close();
        app.quit();
    }
});


/**
 * Functions & Methods
 */
const createWindow = async () => {
    phpServer.createServer({
        port: port,
        hostname: host,
        base: path.join(__dirname, 'public'),
        keepalive: false,
        open: false,
        bin: path.join(__dirname, 'php/php.exe'),
        // bin: 'C:\\tools\\php81\\php.exe',
        router: path.join(__dirname, 'server.php')
    });

    let window = new BrowserWindow({
        // fullscreen: true,
        webPreferences: {
            sandbox: true,
        }
    });

    await window.loadURL(serverUrl);
    window.on('closed', () => {
        phpServer.close();
        window = null;
    });
}
