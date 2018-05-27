const path = require('path')
const webpack = require('webpack')

module.exports = {
  mode: 'development',

  entry: {
    app: ['babel-polyfill', path.join(__dirname, 'resources/assets/js/main.jsx')]
  },

  output: {
    filename: 'js/[name].js',
    path: path.join(__dirname, 'public/'),
    publicPath: '/'
  },

  module: {
    rules: [
      {
        test: /\.jsx?$/,
        loader: 'babel-loader',
        exclude: /node_modules/
      },
      {
        test: /\.(png|jpg|jpeg|gif)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: 'img/[name].[ext]'
            }
          }
        ]
      }
    ]
  },

  resolve: {
    modules: ['node_modules', path.join(__dirname, 'resources/assets/js'), path.join(__dirname, 'resources/assets/img')],
    extensions: ['.js', '.jsx', '.json']
  },

  plugins: [
    new webpack.EnvironmentPlugin(['NODE_ENV'])
  ]
}
