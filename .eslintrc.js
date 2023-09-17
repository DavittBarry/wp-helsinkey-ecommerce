module.exports = {
  parserOptions: {
    ecmaVersion: 2021,
    sourceType: 'module',
  },
  env: {
    browser: true,
    node: true,
  },
  plugins: ['react', 'vue'],
  extends: [
    'eslint:recommended',
    'plugin:react/recommended',
    'plugin:vue/recommended',
  ],
  settings: {
    react: {
      version: 'detect',
    },
  },
  rules: {
  },
};
