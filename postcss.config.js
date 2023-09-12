// postcss.confing.js
const tailwindcss = require("tailwindcss");
const autoprefixer = require("autoprefixer");

module.exports = {
    "plugins": [
      require('tailwindcss')('tailwind.config.js'), // name your custom tailwind
      require('autoprefixer')(),
    ]
  }
