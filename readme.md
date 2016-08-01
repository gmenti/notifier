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
    Mentito\Notifier\NotifierServiceProvider::class,
];
```

(Optional) And, for convenience, add a facade alias to this same file at the bottom:

```php
'aliases' => [
    'Notifier' => Mentito\Notifier\Notifier:class,
];
```

## Usage

Within your controllers, before you perform a redirect...

```php
public function store()
{
    Notifier::success('Success title!', 'WTF, this notification is very good!');

    return view('welcome');
}
```

You may also do:

- `Notifier::info('Title', Message')`
- `Notifier::success('Title', 'Message')`
- `Notifier::error('Title', 'Message')`
- `Notifier::danger('Title', 'Message')`
- `Notifier::warning('Title', 'Message')`


## Example with Bootstrap

```html
@if (Notifier::hasNotification())
    @foreach (Notifier::getAll() as $notification)
        <div class = "alert alert-{{ $notification['type'] }}">
            <strong>{{ $notification['content']['title'] }}</strong> {{ $notification['content']['message'] }}
        </div>
    @endforeach
@endif
```
