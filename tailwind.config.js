/** @type {import('tailwindcss').Config} */
import daisyui from 'daisyui'
import twelements from 'tw-elements/dist/plugin.cjs'


export default {
  content: [
      // You will probably also need these lines
      "./resources/**/**/*.blade.php",
      "./resources/**/**/*.js",
      "./app/View/Components/**/**/*.php",
      "./app/Livewire/**/**/*.php",
      // Add mary
      "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',

  ],
  daisyui: {
    themes: [
        {
            onlytheme1: {
                "primary": "#C87D83",
                "secondary": "#EABFBF",
                "accent": "#37cdbe",
                "neutral": "#3d4451",
                "base-100": "#ffffff",
            },
          onlytheme2: {
            "primary": "#5D1222",
            "secondary": "#7C223A",
            "accent": "#37cdbe",
            "neutral": "#3d4451",
            "base-100": "#ffffff",
          },
          onlytheme3: {
            "primary": "#C87D83",
            "secondary": "#EABFBF",
            "accent": "#37cdbe",
            "neutral": "#3d4451",
            "base-100": "#ffffff",
          },
          onlytheme4: {
            "primary": "#C87D83",
            "secondary": "#EABFBF",
            "accent": "#37cdbe",
            "neutral": "#3d4451",
            "base-100": "#ffffff",
          },
        },
        "dark",
        "cupcake",
    ],
},
  theme: {
    extend: {
    },

  },
  plugins: [
		daisyui,

	],

}

