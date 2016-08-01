# Flash notifications for Laravel

## Installation

First, pull in the package through Composer.

Add the repository in your composer.json:

```json
"repositories": [
    {
        "url": "https://github.com/mentito/notifier.git",
        "type": "git"
    }
],
```

And, add the notifier in require dependecies:

```json
"mentito/notifier": "dev-master"
```


And then, if using Laravel 5, include the service provider within `config/app.php`.

```php
'providers' => [
    Menti\Flash\FlashServiceProvider::class,
];
```

(Optional) And, for convenience, add a facade alias to this same file at the bottom:

```php
'aliases' => [
    'Flash' => Menti\Flash\Flash:class,
];
```

## Usage

Within your controllers, before you perform a redirect...

```php
public function store()
{
    Flash::success('Success title!', It's very good!');

    return Redirect::home();
}
```

You may also do:

- `Flash::info('Title', Message')`
- `Flash::success('Title', 'Message')`
- `Flash::error('Title', 'Message')`
- `Flash::danger('Title', 'Message')`
- `Flash::warning('Title', 'Message')`


## Example with Bootstrap

```html
@if (Flash::hasNotification())
    @foreach (Flash::getAll() as $notification)
        <div class = "alert alert-{{ $notification['type'] }}">
            <strong>{{ $notification['content']['title'] }}</strong> {{ $notification['content']['message'] }}
        </div>
    @endforeach
@endif
```
