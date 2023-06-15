/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    'templates/**/*.html.twig',
    './node_modules/tw-elements/dist/js/**/*.js'
  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('tw-elements/dist/plugin')
  ],
}

