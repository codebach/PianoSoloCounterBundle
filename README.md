## PianoSolo Counter Bundle

Symfony bundle helps to easily add a counter to entities. Using `CounterTrait` in entities will create a Counter
relation automatically. Then you can easily add clicks to the counter.

### Installation 

1-) Tell composer to download by running the command:

```bash
composer require pianosolo/weather-bundle
```
 
2-) Add the bundle to AppKernel

```php
<?php
// app/AppKernel.php
	
public function registerBundles()
{
    $bundles = array(
        // ...
        new PianoSolo\WeatherBundle\PianoSoloWeatherBundle(),
    );
}
```

### Usage

1-) Add `CounterTrait` to your entity.

```php
<?php

namespace MyBundle\Entity;

use PianoSolo\Traits\CounterTrait;

class MyEntity
{
    use CounterTrait;
    
    //...
}

```

2-) Call Counter and add clicks.

```php
<?php

namespace MyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function showEntityAction()
    {
        //...
        
        $myEntity = $myEntityRepository->findOneBy(array('id' => $id));
        $counter = $myEntity->getCounter()->addClick(5); // Default value of parameter is 1
        
        $entityManager->persist($myEntity);
        $entityManager->flush();
    }
}

```

