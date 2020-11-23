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
        : '/',
    devServer: {
        proxy: {
            '/api-admin-dog': {
                target: 'http://127.0.0.1:8000',
                changeOrigin: true,
            },
        },

    },
    outputDir: '../public',
    indexPath: '../resources/views/index.blade.php',
};
