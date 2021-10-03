# biography

## change tables

## tips and tricks

### what about relationships in models

```
bio
id, name

port
id, bio_id, name

port[bio_id] <------> bio[id]
model1[local_key] <-----> model2[foreign_key]

bio 1 <------> * port

$this->hasOne(Bio::class, 'id', 'bio_id');
```

### Automatically deleting related rows in Laravel (Eloquent ORM)

@see https://stackoverflow.com/questions/14174070/automatically-deleting-related-rows-in-laravel-eloquent-orm

### how to change password from tinker

```
$user = App\Model\User::where('email', 'user@example.com')->first();
$user->password = Hash::make('password');
$user->save();
```

### how to implement deleting a model

@see https://laracasts.com/discuss/channels/laravel/destroy-method-in-resource-controller-in-laravel-7

## references

https://laravel.com/docs/5.0/schema

https://laravel.com/docs/8.x/eloquent-relationships

https://laravelcollective.com/docs/6.x/html

https://laravel.com/docs/4.2/html#form-model-binding

https://laravel.com/docs/8.x/validation

https://laravel.com/docs/8.x/eloquent

https://laravel.com/docs/8.x/controllers#actions-handled-by-resource-controller

https://laravel.com/docs/8.x/blade

https://mactavish10101.medium.com/how-to-upload-images-in-laravel-7-7a7f9982ebba

https://stackoverflow.com/questions/37948764/laravel-uuid-generation

https://laravel.com/docs/8.x/middleware

change password of the user with tinker:
https://medium.com/qunabu-interactive/quick-tip-how-to-change-laravel-user-password-from-command-line-515f55c9d295