const ExtractTextPlugin = require('extract-text-webpack-plugin');

const path = require('path');

module.exports = {
    entry: {
        admin: './src/admin/index.js',
        web: './src/web/index.js',
    },
    output: {
        path: path.resolve(__dirname, 'public/assets'),
        filename: '[name].js'
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: ExtractTextPlugin.extract({
                fallback: 'style-loader',
                use: [
                    {
                        loader: 'css-loader',
                        options: {
                            url: false,
                            minimize: true,
                            sourceMap: true,
                        }   
                    },
                    {
                        loader: 'postcss-loader'
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true
                        }
                    }
                ]
                })
            },
            { 
                test: /\.js$/, 
                exclude: /node_modules/, 
                loader: "babel-loader" 
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin({
            filename:  (getPath) => {
                return getPath('[name].css').replace('css/js', 'css');
            },
            allChunks: true
        })
    ]
};