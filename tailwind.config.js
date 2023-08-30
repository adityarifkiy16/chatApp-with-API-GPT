/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,php,js}"],
  theme: {
    container: {
      center: true,
    },
    extend: {
      boxShadow: {
        pinkCyber: "-5px -6px 22px -11px rgba(219, 39, 119, 1)",
      },
      ringWidth: {
        "ring-1": "1px",
      },
    },
  },
  plugins: [],
};
