/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
  theme: {
    extend: {
        screens: {
            'sm': '480px',
        },
    },
  },
  plugins: [],
}
