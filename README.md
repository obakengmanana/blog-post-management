# Laravel Blog Post Management Application

## Overview
This is a simple blog post management application built with Laravel. It allows users to create, view, update, and delete blog posts. The application includes basic authentication, authorization, and CRUD operations.

### Features
User authentication (registration, login, logout)
CRUD operations for blog posts
Authorization to ensure only authors can edit or delete their own posts
Basic form validation

## Setup Process

### 1. Clone the Repository
```
git clone <repository-url>
```
```
cd <repository-name>
```

### 2. Install Dependencies
Make sure you have Composer installed, then run:

```
composer install
```

### 3. Create Environment File
Copy the .env.example file to .env:

```
cp .env.example .env
```

### 4. Generate Application Key
Run the following command to generate the application key:

```
php artisan key:generate
```

### 5. Configure Database
Edit the .env file to configure your database settings. For example:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```
Or use sqlite:
```
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

### 6. Run Migrations
To set up the database schema, run the migrations:

```
php artisan migrate
```

### 7. Seed the Database (Optional)
If you want to seed the database with some sample data, you can run:

```
php artisan db:seed
```

### 8. Serve the Application
You can serve the application using Laravel’s built-in development server:

```
php artisan serve
```

Visit http://localhost:8000 in your browser to access the application.

## Application Structure

app/Models: Contains the Post model representing the blog posts.
app/Http/Controllers: Contains the PostController which handles the CRUD operations for posts.
app/Policies: Contains the PostPolicy which defines the authorization logic.
resources/views: Contains the Blade templates used for rendering the application’s frontend.
layouts/app.blade.php: The main layout file.
 - posts/index.blade.php: Displays all posts.
 - posts/create.blade.php: Form for creating a new post.
 - posts/edit.blade.php: Form for editing a post.
 - posts/show.blade.php: Displays a single post.

 ## Considerations

- Authorization: Policies are implemented to ensure only the author of a post can edit or delete it.
- Validation: The application validates the title and content fields for posts to ensure they are required and within the specified length.
- Eager Loading: Eager loading is used when retrieving posts to optimize performance by minimizing the number of queries executed.
- Responsive Design: Basic Bootstrap classes are used to ensure the application is responsive and mobile-friendly.


## Loom video
https://www.loom.com/share/9a374277836948cc8739604e45432dfd?sid=10e52aad-e16c-4253-88c3-ae48e78368a7

## License

This project is open-source and available under the [MIT license](https://opensource.org/licenses/MIT).
