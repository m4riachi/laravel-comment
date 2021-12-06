# Laravel comment package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/m4riachi/laravel-comment.svg?style=flat-square)](https://packagist.org/packages/m4riachi/laravel-comment)
[![Total Downloads](https://img.shields.io/packagist/dt/m4riachi/laravel-comment.svg?style=flat-square)](https://packagist.org/packages/m4riachi/laravel-comment)

This package add a comment block in the page where it is inserted, the comment is linked to a page (link) not to a model.

## Installation

You can install the package via composer:

```bash
composer require m4riachi/laravel-comment
```
\
You have publish and run the migrations with:
```shell script
php artisan vendor:publish --provider="M4riachi\LaravelComment\LaravelCommentServiceProvider" --tag=migrations
php artisan migrate
```
\
You can publish the config file with:
```shell script
php artisan vendor:publish --provider="M4riachi\LaravelComment\LaravelCommentServiceProvider" --tag=config
```
##
#### Optional
If you need to make change in the html design the views files with:
```shell script
php artisan vendor:publish --provider="M4riachi\LaravelComment\LaravelCommentServiceProvider" --tag=views
```
## Usage
For the **front side** there is two tags to include in the html of the page where you want to add the comment block.
```html
<x-m4-comment-front-bloc  />
```
This tag will show the comment form and a list of inserted comment on this page.
```html
<x-m4-comment-front-javascript  />
```
This one will add the javascript needed.

\
For the **back side** there is just one tag.
```html
<x-m4-comment-back-list />
```
This tag need to use it in the back office, will show all the comment inserted with pagination and two action.
- An action to change the comment status
- And delete action

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email taoufiq.benmessaoud@gmail.com instead of using the issue tracker.

## Credits

-   [Taoufiq BEN](https://github.com/m4riachi)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
