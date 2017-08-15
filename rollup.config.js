import babel from 'rollup-plugin-babel'
import uglify from 'rollup-plugin-uglify'

export default {
  entry: './assets/js/src.js',
  format: 'iife',
  dest: './assets/js/dist.js',
  plugins: [
    babel({
      exclude: 'node_modules/**'
    }),
    uglify()
  ]
}
