# Laravel AbuseReportable
This package will allow you to add a full abuse report system into your Laravel application.
Forked from AbdullahGhanem/reportable
## Installation

First, pull in the package through Composer.

```js
composer require alhad-lifeids/abuse-reportable
```

And then include the service provider within `app/config/app.php`.

```php
'providers' => [
    Lifeids\AbuseReportable\AbuseReportableServiceProvider::class
];
```

At last you need to publish and run the migration.

```bash
php artisan vendor:publish
```
and
```bash
php artisan migrate
```

## Setup a Model
```php
<?php

namespace App;

use Lifeids\AbuseReportable\Contracts\AbuseReportable;
use Lifeids\AbuseReportable\Traits\Reportable as AbuseReportableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements AbuseReportable
{
    use AbuseReportableTrait;
}

```

## Examples

#### The User Model abuse reports the Post Model
```php
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Post;
use Auth;

class PostController extends Controller
{
    public function makeReport()
    {
        $post = Post::find(1);
        $user = Auth::user();
        
        $post->abusereport([
            'reason' => str_random(10),
            'meta' => ['some more optional data, can be notes or something'],
        ], $user);
    }
```

#### Create a conclusion for a Report and add the User Model as "judge" (useful to later see who or what came to this conclusion)
```php
$abusereport->conclude([
    'conclusion' => 'Your report was valid. Thanks! We\'ve taken action and removed the entry.',
    'action_taken' => 'Record has been deleted.' // This is optional but can be useful to see what happend to the record
    'meta' => ['some more optional data, can be notes or something'],
], $user);
```

#### Get the conclusion for the Abuse Report Model
```php
$abusereport->conclusion;
```

#### Get the judge for the Report Model (only available if there is a conclusion)
```php
$abusereport->judge(); // Just a shortcut for $report->conclusion->judge
```

#### Get an array with all Judges that have ever "judged" something
```php
AbuseReport::allJudges();
