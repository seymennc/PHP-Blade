# Luminance PHPBlade Templating Engine

Luminance PHPBlade is a lightweight templating engine built in PHP, inspired by Laravel's Blade templating system. It allows you to separate your application's logic from the presentation layer using clear, easy-to-use syntax.
## Badges

[![Latest Stable Version](https://poser.pugx.org/seymennc/php-blade/v?style=for-the-badge)](https://packagist.org/packages/seymennc/php-blade)

[![Total Downloads](https://poser.pugx.org/seymennc/php-blade/downloads?style=for-the-badge)](https://packagist.org/packages/seymennc/php-blade)

[![Latest Unstable Version](https://poser.pugx.org/seymennc/php-blade/v/unstable?style=for-the-badge)](https://packagist.org/packages/seymennc/php-blade)

[![License](https://poser.pugx.org/seymennc/php-blade/license?style=for-the-badge)](https://packagist.org/packages/seymennc/php-blade)

[![PHP Version Require](https://poser.pugx.org/seymennc/php-blade/require/php?style=for-the-badge)](https://packagist.org/packages/seymennc/php-blade)

[![Version](https://poser.pugx.org/seymennc/php-blade/version?style=for-the-badge)](https://packagist.org/packages/seymennc/php-blade)

## 🔗 Links
[![portfolio](https://img.shields.io/badge/my_portfolio-000?style=for-the-badge&logo=ko-fi&logoColor=white)](https://seymencayir.com.tr/)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/seymennc)
[![twitter](https://img.shields.io/badge/twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white)](https://twitter.com/benseymenemen)


## Features
- **Lightweight:** Minimal and easy to integrate into any PHP project.
- **Dynamic Templating:** Define sections, layouts, and reusable components
- **CSRF Protection:** Built-in support for including CSRF tokens in your forms.
- **View Caching:** Cache compiled views for improved performance.
- **Blade-style Syntax:** Utilizes similar directives as Laravel's Blade for a familiar experience.

## Installation

To use the project, follow these steps:

### Git Clone
```bash
git clone https://github.com/seymennc/php-blade.git
```
```bash
cd php-blade
```
```bash
php -S 127.0.0.1:8080
```

### Composer
#### If you create new project with php-blade
```bash
composer create-project seymennc/php-blade php-blade
```
```php
cd php-blade
```
```php
php -S 127.0.0.1:8080
```

#### If you will only use it in your project
```php
composer require seymennc/php-blade
```


## Usage

Include the autoloader in your project:
```bash
require 'vendor/autoload.php';
```
###
Make sure to define the paths for the view and cache directories in your configuration:

```php
// Example configuration in config.php
return [
    [
        'views' => dirname(__DIR__) . '/resources/views',
        'cache' => dirname(__DIR__) . '/storage/cache',
        'suffix' => '.blade.php'
    ]
];
```

### Rendering a View
To render a view, simply call the Blade::view() method:
```php
use Luminance\Service\phpblade\Blade\Blade;

echo Blade::view('home');
```

### Or you can use it like this

```php
use Luminance\Service\phpblade\Blade\Blade;

view('home');
```
###
Should you need to pass data to the view, you can do so by passing an array as the second argument:
```php
echo Blade::view('home', ['title' => 'Welcome Home']);
//Or use this
view('home', ['title' => 'Welcome Home']);
```
### Sections and Extending Layouts
You can define sections and extend layouts using the familiar Blade-style directives:
```css 
// layouts/master.blade.php
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>

// views/home.blade.php
@extends('layouts.master')

@section('title', 'Home Page')

@section('content')
<h1>Welcome to the Home Page</h1>
@endsection
```

### CSRF Tokens
For forms that require CSRF tokens:
```html
<form method="POST" action="/submit">
    @csrf
    <!-- form fields -->
</form>
```

### All Usable Directives
```php
@include('view')
```
```php
{{ /* For PHP Variables */}}
```
```php
@foreach(array)
    // Loop
@endforeach
```
```php
@section('section')
    // Section
@endsection
```
```php
@extends('layout')
```
```php
@yield('section')
```
```php
@csrf
```

More examples will be found in the [Asgard Docs](https://seymencayir.com.tr/asgard/docs/).

## Contributing
We welcome contributions! If you find a bug or have suggestions for improvements, please open an issue or contribute directly to the project.

## Our ♥️ Contributors
<a href="https://github.com/seymennc/PHP-Route/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=seymennc/PHP-Route" />
</a>


## License
Licensed under the  GNU GENERAL PUBLIC LICENSE, Copyright © 2024-present BLC Studio
