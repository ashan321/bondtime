/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    extend: {},
  },
  plugins: [
    function ({ addUtilities }) {
      addUtilities({
        '.gradient-border': {
          position: 'relative',
          border: '2px solid transparent',
          'background-origin': 'border-box',
          'background-clip': 'padding-box',
        },
        '.gradient-border::before': {
          content: '""',
          position: 'absolute',
          inset: '-2px',
          zIndex: '-1',
          borderRadius: 'inherit',
          background: 'linear-gradient(to right, #C78EE0, #F1AD87, #EB89BA)',
        },
      });
    },
  ],
};

