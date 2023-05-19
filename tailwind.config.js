/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
  ],
  theme: {
      extend: {
          colors:{
              "primary": '#00A888',
              "secondary":'#FFAA00',
              "text-default": '#666666',
              "search": '#CBCCCC',
              "text-default-darker":"#333333",
              "text-tag" : "#99999A"
          },
          border:{
              '1.5':'1.5px',
          },
          borderWidth: {
              '1/2':'0.5px',
              '1':'1px'
          },
          boxShadow: {
              '3xl': '0px 5px 5px -5px rgba(0, 0, 0, 0.25)',
          },
          borderRadius:{
              '4xl':'30px',
              '2lg' : '10px',
          },
          fontSize:{
              '3.25xl': ['32px', {
                  lineHeight: '48px',
              }],
          },
          fontFamily: {
              libre: ['"Be Vietnam Pro"', ...defaultTheme.fontFamily.sans]
          },
          margin:{
              '5.5':'22px',
          },
          minWidth: {
              '1/2': '50%',
          }
      },
  },
    plugins: [
        require('flowbite/plugin')
    ],
}

