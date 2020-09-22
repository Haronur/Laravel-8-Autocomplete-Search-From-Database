<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## -- Laravel 8 Autocomplete Search From Database -- 

Autocomplete Textbox in Laravel using Ajax jQuery

- Step 1 – Install Laravel 8 Application
- Step 2 – Database Configuration
- Step 3 – Add Dummy Record Into Database For Autocomplete Search
- Step 4 – Create Routes
- Step 5 – Creating Autocomplete Search Controller-
	```
	   - Create method to display autocomplete search form
    - Create method to search from database 
    ```  
- Step 6 – Create Blade File For Autocomplete Search Form
- Step 7 – Start Development Server
- Step 8 – Run Laravel 8 Autocomplete Textbox Search From Database On Browser

#### Step 1 – Install Laravel 8 Application

- In step 1, open your terminal and navigate to your local web server directory using the following command:

- Then install laravel 8 latest application using the following command:

`composer create-project --prefer-dist laravel/laravel Laravel-8-Autocomplete-Search-From-Database`

#### Step 2 – Database Configuration

In step 2, open your downloaded laravel 8 app into any text editor. Then find .env file and configure database detail like following:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-autocomplete-search
DB_USERNAME=root
DB_PASSWORD=
```
#### Step 3 – Add Dummy Record Into Database For Autocomplete Search

- In step 3, Generate dummy records into database table users. So, navigate `database/seeders/` directory and open `DatabaseSeeder.php` file. Then add the following two line of code it:
```
use App\Models\User;
User::factory(100)->create();
```
- After that, open command prompt and navigate to your project by using the following command:

`cd / Laravel-8-Autocomplete-Search-From-Database`

- Now, open again your terminal and type the following command on cmd to create tables into your selected database:

`php artisan migrate`

- Next, run the following database seeder command to generate dummy data into database:

`php artisan db:seed`

#### Step 4 – Create Routes

- In step 4, open your web.php file, which is located inside routes directory. Then add the following routes into `web.php` file:
```
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutocompleteSearchDBController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/autocomplete-textbox', [AutocompleteSearchDBController::class, 'index']);
Route::post('/search-from-db', [AutocompleteSearchDBController::class, 'searchDB']);
```

#### Step 5 – Creating Autocomplete Search Controller

- In step 5, create autocomplete textbox search controller by using the following command:

`php artisan make:controller AutocompleteSearchDBController`

- The above command will create `AutocompleteSearchDBController.php` file, which is located inside `Laravel-8-Autocomplete-Search-From-Database/app/Http/Controllers/` directory.
- The full source code of autocomplete search controller following:
```
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class AutocompleteSearchDBController extends Controller
{
    public function index()
    {
        return view('autocomplete-textbox-search');
    }
 
    public function searchDB(Request $request)
    {
          $search = $request->get('term');
      
          $result = User::where('name', 'LIKE', '%'. $search. '%')->get();
 
          return response()->json($result);
            
    } 
}
```

#### Step 6 – Create Blade File For Autocomplete Search Form

- In step 6, create new blade view file that named autocomplete-textbox-search.blade.php inside `resources/views` directory for ajax get data from database.

- So, you can add the following php and html form code into `autocomplete-textbox-search.blade.php`:
```
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Autocomplete Textbox From Database with jQuery UI</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="container mt-4">
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      <h2>Laravel 8 Autocomplete Textbox From Database</h2>
    </div>
    <div class="card-body">
      <form name="autocomplete-textbox" id="autocomplete-textbox" method="post" action="#">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Search By Name</label>
          <input type="text" id="name" name="name" class="form-control">
        </div>
      </form>
    </div>
  </div>
  
</div>    
</body>
<script>
 $(document).ready(function() {
    $( "#name" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            type:'post',
            url: "{{url('search-from-db')}}",
            dataType: "json",
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
            data: {
                    term : request.term
             },
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.name;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 2
 });
});
 
</script>   
</html>
```

#### Step 7 – Start Development Server

- Finally, open your command prompt again and run the following command to start development server:

`php artisan serve`

#### Step 8 – Run Laravel 8 Autocomplete Textbox Search From Database On Browser

- In step 8, open your browser and fire the following url into your browser:

`http://127.0.0.1:8000/autocomplete-textbox`

- When you fire the above given url on browser. So, you will look like laravel 8 autocomplete search textbox with jQuery ui and ajax:
