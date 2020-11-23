module.exports = {
    transpileDependencies: ["vuetify"],
    chainWebpack: (config) => {
        config.plugins.delete("prefetch");
        config.plugins.delete("preload");
    },
    css: {
        extract: true,
    },
    publicPath: process.env.NODE_ENV === 'production'
        ? '/vendor/admin-dog/'
        : 'http://192.168.31.2:8080/',
    devServer: {
        proxy: 'http://192.168.31.2:8000/',
    },
    outputDir: '../public',
    indexPath: '../resources/views/index.blade.php',
};
