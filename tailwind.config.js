/** @type {import('tailwindcss').Config} */

module.exports = {
  content: ["./Public/**/*.{html,php,js,mjs}", "./App/View/**/*.{html,php}"],
  theme: {
    container: {
      center: true,
    },
    extend: {
      boxShadow: {
        blueSea: "-5px -6px 22px -11px rgba(0, 167, 255, 0.8)",
      },
      ringWidth: {
        "ring-1": "1px",
      },
    },
  },
  plugins: [],
};
