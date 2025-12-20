/** @type {import('tailwindcss').Config} */

export default {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        // إضافة الخطوط العربية
        'cairo': ['Cairo', 'sans-serif'],
        'tajawal': ['Tajawal', 'sans-serif'],
      },
      colors: {
        // تعريف الألوان الأساسية
        gold: {
          50: '#fffbf0',
          100: '#fff7e0',
          200: '#ffedbe',
          300: '#ffe69c',
          400: '#ffdb72',
          500: '#ffc107',
          600: '#f59e0b',
          700: '#d97706',
          800: '#b45309',
          900: '#92400e',
        },
        // الأسود والرمادي والأبيض موجودة بالفعل في Tailwind
      },
      backgroundImage: {
        'gradient-gold': 'linear-gradient(135deg, #ffc107 0%, #f59e0b 100%)',
        'gradient-dark': 'linear-gradient(135deg, #1f2937 0%, #111827 100%)',
      },
      spacing: {
        // مسافات إضافية
        'safe': 'env(safe-area-inset-bottom)',
      },
      animation: {
        'fade-in': 'fadeIn 0.3s ease-in-out',
        'slide-in': 'slideIn 0.3s ease-in-out',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideIn: {
          '0%': { transform: 'translateY(-10px)', opacity: '0' },
          '100%': { transform: 'translateY(0)', opacity: '1' },
        },
      },
    },
  },
  plugins: [
    // استيراد المكونات المخصصة
    ({ addComponents, theme }) => {
      addComponents({
        // Custom Button Components
        '.btn-primary': {
          '@apply': 'bg-gold-600 text-white px-4 py-2 rounded-lg hover:bg-gold-700 transition',
        },
        '.btn-secondary': {
          '@apply': 'bg-gray-300 text-gray-900 px-4 py-2 rounded-lg hover:bg-gray-400 transition',
        },
        '.btn-danger': {
          '@apply': 'bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition',
        },

        // Custom Text Classes
        '.text-primary': {
          '@apply': 'text-gray-900',
        },
        '.text-secondary': {
          '@apply': 'text-gray-600',
        },

        // Custom Container
        '.container-safe': {
          '@apply': 'max-w-7xl mx-auto px-4 sm:px-6 lg:px-8',
        },

        // Custom Card
        '.card-base': {
          '@apply': 'bg-white rounded-lg shadow-md p-6',
        },

        // RTL Support (اللغة العربية)
        '[dir="rtl"] .mr-auto': {
          '@apply': 'ml-auto mr-0',
        },
        '[dir="rtl"] .ml-auto': {
          '@apply': 'mr-auto ml-0',
        },
      });
    },
  ],
};
