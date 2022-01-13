const path = require('path');

const ts = {
  test: /\.tsx?$/,
  loader: 'swc-loader',
};

const scss = {
  test: /\.s[ac]ss$/i,
  use: [
    'style-loader',
    {
      loader: 'css-loader',
      options: {
        import: false,
        modules: {
          localIdentName: '[local]_[hash:base64:5]',
        },
      },
    },
    {
      loader: 'sass-loader',
      options: {
        additionalData: '@import "~/frontend/styles/globals.scss";',
      },
    },
  ],
  include: /\.module\.s[ac]ss$/,
};

// Define Entry points separately, leverages webpacks multi-compiler 
// https://github.com/webpack/webpack/blob/main/examples/multi-compiler/webpack.config.js
function generateExport(filename) {
  return {
    name: filename,
    mode: process.env.ENV === 'production' ? 'production' : 'development',
    entry: `./frontend/entrypoints/${filename}.tsx`,
    output: {
      path: path.join(__dirname, `src/resources/${filename}/dist`),
      filename: '[name].bundle.js'
    },
    resolve: {
      extensions: ['.tsx', '.ts', '.js'],
      alias: {
        '@': __dirname,
      },
    },
    module: {
      rules: [ts, scss],
    },
    optimization: {
      minimize: true,
    },
  }
}

module.exports = [
  generateExport('forms'), 
  generateExport('fields')
]