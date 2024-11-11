/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}",    // Para incluir todos los archivos HTML, JS y PHP en src
    "./src/fronted/**/*.{html,js,php}",  // Para incluir HTML, JS y PHP en fronted
    "./src/backend/**/*.{html,js,php}",  // Para incluir HTML, JS y PHP en backend
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
tailwind.config = {
  darkMode: 'class',
  theme: {
    extend: {}
  }
}

