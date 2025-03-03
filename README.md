# hyperf BATCH (BULK)
Insert and update batch (bulk) in hyperf

# From
modify from mavinoo/laravel-batch,a coroutine-based
# Install
`composer require imactool/hyperf-batch`

# Example Update 1

```php
use App\Models\User;

$userInstance = new User;
$value = [
     [
         'id' => 1,
         'status' => 'active',
         'nickname' => 'Mohammad'
     ] ,
     [
         'id' => 5,
         'status' => 'deactive',
         'nickname' => 'Ghanbari'
     ] ,
];
$index = 'id';

Batch::update($userInstance, $value, $index);
```

# Example Update 2

```php
use App\Models\User;

$userInstance = new User;
$value = [
     [
         'id' => 1,
         'status' => 'active'
     ],
     [
         'id' => 5,
         'status' => 'deactive',
         'nickname' => 'Ghanbari'
     ],
     [
         'id' => 10,
         'status' => 'active',
         'date' => Carbon::now()
     ],
     [
         'id' => 11,
         'username' => 'mavinoo'
     ]
];
$index = 'id';

Batch::update($userInstance, $value, $index);
```

# Example Increment / Decrement

```php
use App\Models\User;

$userInstance = new User;
$value = [
     [
         'id' => 1,
         'balance' => ['+', 500] // Add
     ] ,
     [
         'id' => 2,
         'balance' => ['-', 200] // Subtract
     ] ,
     [
         'id' => 3,
         'balance' => ['*', 5] // Multiply
     ] ,
     [
         'id' => 4,
         'balance' => ['/', 2] // Divide
     ] ,
     [
         'id' => 5,
         'balance' => ['%', 2] // Modulo
     ] ,
];
$index = 'id';

Batch::update($userInstance, $value, $index);
```

# Example Insert

```php
use App\Models\User;

$userInstance = new User;
$columns = [
     'firstName',
     'lastName',
     'email',
     'isActive',
     'status',
];
$values = [
     [
         'Mohammad',
         'Ghanbari',
         'emailSample_1@gmail.com',
         '1',
         '0',
     ] ,
     [
         'Saeed',
         'Mohammadi',
         'emailSample_2@gmail.com',
         '1',
         '0',
     ] ,
     [
         'Avin',
         'Ghanbari',
         'emailSample_3@gmail.com',
         '1',
         '0',
     ] ,
];
$batchSize = 500; // insert 500 (default), 100 minimum rows in one query

$result = Batch::insert($userInstance, $columns, $values, $batchSize);
```


```php
// result : false or array

sample array result:
Array
(
    [totalRows]  => 384
    [totalBatch] => 500
    [totalQuery] => 1
)
```



# Helper batch()

```php
// ex: update

$result = batch()->update($userInstance, $value, $index);


// ex: insert

$result = batch()->insert($userInstance, $columns, $values, $batchSize);
```

# Tests
If you don't have phpunit installed on your project, first run `composer require phpunit/phpunit`

In the root of your hyperf app, run `./vendor/bin/phpunit ./vendor/ylnwqm/hyperf-batch/tests`