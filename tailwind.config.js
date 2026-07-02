/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Livewire/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        'geartrail-red': '#E31E24',
        'geartrail-dark': '#1A1A1B',
        'geartrail-gray': '#3D3D3F',
      }
    },
  },
  plugins: [],
}
