/** @type {import('tailwindcss').Config} */

module.exports = {
  content: ["./Public/**/*.{html,php,js,mjs}", "./App/View/**/*.{html,php}"],
  theme: {
    container: {
      center: true,
    },
    extend: {
      animation: {
        blob: "blob 7s  linear infinite",
        blobb: "blobb 7s linear  infinite",
      },
      boxShadow: {
        blueSea: "-5px -6px 22px -11px rgba(0, 167, 255, 0.8)",
      },
      ringWidth: {
        "ring-1": "1px",
      },
      keyframes:{
        blob: {
          '0%': {
            transform: 'translate(0px, 0px) scale(1)'
          },
          '25%': {
            transform: 'translate(50px, -50px) scale(1.2)'
          },
          '50%': {
            transform: 'translate(100px, 0px) scale(1)'
          },
          '75%': {
            transform: 'translate(50px, 50px) scale(1.2)'
          },
          '100%': {
            transform: 'translate(0px, 0px) scale(1)'
          },
        },
        blobb: {
          '0%': {
            transform: 'translate(0px, 0px) scale(1)'
          },
          '25%': {
            transform: 'translate(-50px, 50px) scale(1.2)'
          },
          '50%': {
            transform: 'translate(0px, -100px) scale(1)'
          },
          '75%': {
            transform: 'translate(50px, -50px) scale(1.2)'
          },
            '100%': {
              transform: 'translate(0px, 0px) scale(1)'
          },
        }
      }
    },
  },
  plugins: [],
};
