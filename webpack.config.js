// Generated using webpack-cli https://github.com/webpack/webpack-cli
/* eslint no-undef: 'off' */
const path = require('path');
const { ProgressPlugin } = require('webpack')
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const WorkboxWebpackPlugin = require('workbox-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const CleanTerminalPlugin = require('clean-terminal-webpack-plugin');
const ESLintWebpackPlugin = require('eslint-webpack-plugin');
const configuration = require('./compiler.option');

const isProduction = process.env.NODE_ENV == 'production';


const stylesHandler = MiniCssExtractPlugin.loader;

const entries = {};
const entries_raw = [...configuration.sass, ...configuration.js].map((entry) => {
    if (typeof entry === 'string') {
        const name = path.parse(path.basename(entry)).name;
        return {
            name,
            src: entry
        }
    }
    return entry;
});

entries_raw.forEach((item) => {
    const cssExt = /\.(css|sass|scss)$/;
    const jsExt = /\.(js)$/;
    const isCss = cssExt.test(item.src);
    const isJs = jsExt.test(item.src);
    const prefix = isCss ? "css/" : isJs ? "js/" : false;
    if (prefix) entries[`${prefix}${item.name}`] = item.src;
});

const config = {
    entry: entries,
    output: {
        path: path.resolve(__dirname, './assets/dist'),
        filename: (pathData) => {
            return pathData.chunk.name.indexOf("css/") !== -1
              ? "[name].__unused__.js"
              : "[name].min.js";
          },
    },
    stats: 'minimal',
    performance: {
        hints: false,
    },
    watchOptions: {
        ignored: /node_modules/,
    },
    resolveLoader: {
        modules: ["node_modules"],
        extensions: [".js", ".json"],
        mainFields: ["loader", "main"],
    },
    performance: {
        hints: false,
    },
    plugins: [

        new MiniCssExtractPlugin({
            filename: "[name].min.css"
        }),
        new CleanTerminalPlugin({
            beforeCompile: true,
            onlyInWatchMode: false,
        }),

        new BrowserSyncPlugin(configuration.browserSync),

        new ESLintWebpackPlugin({
            extensions: ['js', 'mjs', 'jsx', 'ts', 'tsx'],
            formatter: 'visualstudio',
        }),

        new CleanWebpackPlugin({
            protectWebpackAssets: false,
            cleanOnceBeforeBuildPatterns: ["css/dist/**", "js/dist/**"],
            cleanAfterEveryBuildPatterns: ["**/*.__unused__.*"],
        }),

        new ProgressPlugin()

        // Add your plugins here
        // Learn more about plugins from https://webpack.js.org/configuration/plugins/
    ],
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [stylesHandler, 'css-loader', 'postcss-loader', 'sass-loader'],
            },
            {
                test: /\.css$/i,
                use: [stylesHandler, 'css-loader', 'postcss-loader'],
            },
            {
                test: /\.(eot|svg|ttf|woff|woff2|png|jpg|gif)$/i,
                type: 'asset',
            },

            // Add your rules for custom modules here
            // Learn more about loaders from https://webpack.js.org/loaders/
        ],
    },
    externals: {
        jquery: 'jQuery'
    }
};

module.exports = () => {
    if (isProduction) {
        config.mode = 'production';
        
        
        config.plugins.push(new WorkboxWebpackPlugin.GenerateSW());
        
    } else {
        config.mode = 'development';
    }
    return config;
};
