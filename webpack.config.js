const path = require('path');
// const WebpackDevServer = require('webpack-dev-server');
const webpack = require('webpack');
const TerserPlugin = require('terser-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const PATHS = {
    source: path.join(__dirname, 'app/jscss'),
    build: path.join(__dirname, 'public/build')
};

module.exports = {
    devtool: "source-map",
    entry: {
        services: PATHS.source + '/Main/services/services.js',
        admin: PATHS.source + '/Adminsc/admin.js',
        mainIndex: PATHS.source + '/Main/main.js',
    },
    output: {
        chunkFilename: '[name].bundle.js',
        path: PATHS.build,
        filename: "[name].js"
    },
    resolve: {
        modules: ['node_modules']
    },
    optimization: {
        minimize: true,
        minimizer: [
            new TerserPlugin({
                parallel: true,
                sourceMap: true,
            }),
            new OptimizeCSSAssetsPlugin({
                cssProcessorOptions: { map: { inline: false, annotation: true, } }

            })
        ],
    },

    module: {
        rules: [
            {
                test: /\.(png|jpe?g|gif)$/i,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[path][name].[ext]',
                        },
                    }
                ]
            },
            {
                test: /\.js/,
                loader: 'babel-loader',
                exclude: /(node_modules)/
            },
            {
                test: /\.(sa|sc|c)ss$/,
                use: [

                    'style-loader',
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {sourceMap: true}
                    }, {
                        loader: 'sass-loader',
                        options: {sourceMap: true}
                    }

                ],
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name].css',
            chunkFilename: '[id].css',
        }),
        new CleanWebpackPlugin(),
    ]

}



