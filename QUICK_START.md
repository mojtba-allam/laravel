# Quick Start Guide - Job for all

## 🚀 Start Development

### Option 1: Using Composer Script (Recommended)
```bash
composer dev
```
This starts all services concurrently:
- Laravel server (http://localhost:8000)
- Queue worker
- Log viewer
- Vite dev server

### Option 2: Manual Start
```bash
# Terminal 1: Laravel
php artisan serve

# Terminal 2: Vite
npm run dev
```

## 🌐 Access the Application

**URL**: http://localhost:8000

### Available Pages
- **Home**: `/` - Hero section with features
- **Jobs**: `/jobs` - Browse all jobs with search/filter
- **Contact**: `/contact` - Contact form
- **Login**: `/login` - User authentication
- **Register**: `/register` - New user registration
- **Create Job**: `/jobs/create` - Post a new job (auth required)

## 🎨 Branding

- **Site Name**: Job for all
- **Developer**: Mojtba Allam (shown in footer)
- **Theme**: Blue primary color (#2563eb)
- **Font**: Figtree

## 📦 Tech Stack

- **Backend**: Laravel 11
- **Frontend**: Vue 3 + Inertia.js
- **UI**: PrimeVue 4 (Aura theme)
- **Styling**: Tailwind CSS
- **Build**: Vite 6

## 🔨 Common Commands

### Development
```bash
npm run dev          # Start Vite dev server
php artisan serve    # Start Laravel server
```

### Build
```bash
npm run build        # Build for production
```

### Database
```bash
php artisan migrate        # Run migrations
php artisan db:seed        # Seed database
php artisan migrate:fresh  # Fresh migration
```

### Cache
```bash
php artisan cache:clear    # Clear application cache
php artisan config:clear   # Clear config cache
php artisan view:clear     # Clear view cache
```

## 📁 Key Files

### Configuration
- `vite.config.js` - Build configuration
- `tailwind.config.js` - Styling configuration
- `app/Http/Middleware/HandleInertiaRequests.php` - Shared data

### Components
- `resources/js/Pages/Layout.vue` - Main layout with nav & footer
- `resources/js/Components/ApplicationLogo.vue` - Site logo
- `resources/js/app.js` - Vue application entry point

### Styling
- `resources/css/app.css` - Global styles
- `public/build/` - Compiled assets (after build)

## ✨ Features

### Navigation
- ✅ Responsive (desktop + mobile)
- ✅ Active page highlighting
- ✅ Auth-aware menu items

### Footer
- ✅ Three-column layout
- ✅ Quick links
- ✅ Developer credit: "Mojtba Allam"
- ✅ Dynamic copyright year

### Jobs DataTable
- ✅ Search functionality
- ✅ Sortable columns
- ✅ Pagination (10/25/50 per page)
- ✅ Edit/Delete actions

### Forms
- ✅ Real-time validation
- ✅ Loading states
- ✅ Error messages
- ✅ Success notifications

### User Feedback
- ✅ Toast notifications (top-right)
- ✅ Progress bar (page transitions)
- ✅ Confirmation dialogs

## 🐛 Troubleshooting

### Assets not loading?
```bash
npm run build
php artisan cache:clear
```

### Database errors?
```bash
php artisan migrate:fresh --seed
```

### Port already in use?
```bash
php artisan serve --port=8001
```

### Vite connection issues?
```bash
# Kill existing Vite process
pkill -f vite
npm run dev
```

## 📚 Documentation

- **Full Implementation**: See `IMPLEMENTATION_SUMMARY.md`
- **Changes Made**: See `CHANGES.md`
- **Laravel Docs**: https://laravel.com/docs
- **Inertia.js Docs**: https://inertiajs.com
- **Vue 3 Docs**: https://vuejs.org
- **PrimeVue Docs**: https://primevue.org

## 🎯 Next Steps

1. ✅ Start development server
2. ✅ Test all pages in browser
3. ✅ Customize colors/fonts if needed
4. ✅ Add your content
5. ✅ Deploy to production

---

**Site**: Job for all  
**Developer**: Mojtba Allam  
**Status**: ✅ Ready to use
