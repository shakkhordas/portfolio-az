# Sakhor Das Opi Portfolio

This is a personal portfolio web application for Sakhor Das Opi, built with Laravel, Tailwind CSS, and Vite. It showcases academic achievements, professional experience, research, skills, projects, and more, with a modern, responsive UI and dynamic backend.

## Features

- Responsive design for all devices
- Sidebar navigation with smooth scrolling
- Dynamic sections: About, Experience, Academics, Activities, Achievements, Research, Test Scores, Skills, Projects, Contact
- Image carousel for photo gallery
- Modals for detailed views (Experience, Academics, Research, Projects)
- Blinking text and transitions for interactive UI
- CRUD backend for all resources
- Image upload and conversion (JPG)
- Data validation matching migration files

## Tech Stack

- Laravel (Backend, Routing, Eloquent ORM)
- Tailwind CSS (Styling, Responsive Design)
- Vite (Asset Bundling)
- JavaScript (UI Interactivity)
- Intervention Image (Image Processing)
- SQLite/MySQL (Database)

## Getting Started

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js & npm

### Installation

1. Clone the repository:
	```sh
	git clone https://github.com/shakkhordas/portfolio.git
	cd portfolio
	```
2. Install PHP dependencies:
	```sh
	composer install
	```
3. Install Node.js dependencies:
	```sh
	npm install
	```
4. Copy `.env.example` to `.env` and set your environment variables:
	```sh
	cp .env.example .env
	```
5. Generate application key:
	```sh
	php artisan key:generate
	```
6. Run migrations:
	```sh
	php artisan migrate
	```
7. (Optional) Seed the database:
	```sh
	php artisan db:seed
	```
8. Build frontend assets:
	```sh
	npm run build
	```
9. Start the development server:
	```sh
	php artisan serve
	```

## Usage

- Access the app at `http://localhost:8000` (or your configured host)
- Use the sidebar to navigate between sections
- Add, edit, or delete resources via the backend (CRUD)
- Upload images for the photo gallery

## Customization

- Modify Blade views in `resources/views/frontend/`
- Update Tailwind styles in `resources/css/`
- Add new models, migrations, or controllers for additional resources

## Credits

- Built by Sakhor Das Opi
- Powered by Laravel, Tailwind CSS, Vite

## License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
