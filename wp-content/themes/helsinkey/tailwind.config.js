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
        'helsinkey-blue': '#0D5A8A',
        'background': '#1a202c',
        'text': '#FFFFFF',
        'hover-blue': '#0B4F7C',
      },
      fontFamily: {
        'sans': ['Raleway'],
      },
      boxShadow: {
        'header-shadow': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
      },
      spacing: {
        '72': '18rem',
        '80': '20rem',
      },
      screens: {
        '850px': '850px',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
};
