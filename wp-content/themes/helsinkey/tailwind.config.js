/** @type {import('tailwindcss').Config} */
module.exports = {
  purge: {
    content: [
      './**/*.php',
    ],
  },
  theme: {
    extend: {
      colors: {
        'helsinkey-blue': '#1D72B8',
      },
      fontFamily: {
        sans: ['Raleway'],
      },
      boxShadow: {
        'header-shadow': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
      },
      spacing: {
        72: '18rem',
        80: '20rem',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
};
