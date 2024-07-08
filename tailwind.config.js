/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    colors: {
      green: '#3F8D72',
    },
    backgroundImage: {
        'bg-solo-safari': "url('/img/bg-solo-safari.png')",
    }
  },
  
  fontFamily: {
      'body': [
    'Inter'
  ],
      'sans': [
    'Inter', 
  ]
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
