
const development = {
    mode: 'development',
    devtool: 'source-map',
    module: {
        rules: [
            {
                test: /\.s?css$/i,
                use: ['css-loader',
                    {
                        loader: 'css-loader',
                        options: {
                            import: true,
                            sourceMap: true,
                        }
                    },
                    'sass-loader',
                ],
            },
            {
                test: /\.(png|jpe?g|gif)$/i,
                type: 'assets/resource',
                generator: {
                    filename: 'image/[name][ext]',
                }
            },
            {
                test: /\.tsx?$/,
                use: "ts-loader",
                exclude: /node_modules/,
            }
        ]
    },
    resolve: {
        extensions: ['.tsx', '.ts', '.js'],
    },
}

module.exports = development;
