/** @type {import('tailwindcss').Config} */
module.exports = {
  purge: {
    content: [
      './**/*.php',
      // './assets/js/**/*.js'
    ],
  },
  theme: {
    extend: {
      colors: {
        'helsinkey-blue': '#1D72B8',
      },
      fontFamily: {
        'sans': ['Helvetica', 'Arial', 'sans-serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
};
