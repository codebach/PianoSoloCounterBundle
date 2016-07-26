## PianoSolo Counter Bundle

Symfony bundle helps to easily add a counter to entities. Using `CounterTrait` in entities will create a Counter entity
relation automatically. Then you can easily add clicks to the counter. You can also add fake counts to your entites by keeping the real count.

[![Latest Stable Version](https://poser.pugx.org/pianosolo/counter-bundle/v/stable)](https://packagist.org/packages/pianosolo/counter-bundle)
[![Latest Unstable Version](https://poser.pugx.org/pianosolo/counter-bundle/v/unstable)](https://packagist.org/packages/pianosolo/counter-bundle)
[![License](https://poser.pugx.org/pianosolo/counter-bundle/license)](https://packagist.org/packages/pianosolo/counter-bundle)

### Installation 

1-) Tell composer to download by running the command:

```bash
composer require pianosolo/counter-bundle
```
 
2-) Add the bundle to AppKernel

```php
<?php
// app/AppKernel.php
	
public function registerBundles()
{
    $bundles = array(
        // ...
        new PianoSolo\CounterBundle\PianoSoloCounterBundle(),
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
2-) EventListener will create a new `Counter` for your entity while persisting your entity.
```php
    $myEntity = new MyEntity();
    $entityManager->persist($myEntity);
    $entityManager->flush();
```

3-) Call Counter and add clicks.

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
        $myEntity->getCounter()->addClick(5); // Default value of parameter is 1
        
        $entityManager->persist($myEntity);
        $entityManager->flush();
    }
}

```

4-) Get Count
```php
    $count = $myEntity->getCounter()->getCount();
```

```twig
    {{ myEntity.counter.count }}
```

### Adding Fake Count

You can add fake counts to your entities and keep the real counts. Whenever you want you can delete this fake counts.

```php
    // Example initial count values of entity
    $count = $myEntity->getCounter()->getCount(); // return 10
    $realCount = $myEntity->getCounter()->getRealCount(); // return 10

    // Adding fake count
    $myEntity->getCounter()->setCorrectionCount(100);
    $entityManager->persist($myEntity);
    $entityManager->flush();

    // Keeping real count
    $count = $myEntity->getCounter()->getCount(); // return 110
    $realCount = $myEntity->getCounter()->getRealCount(); // return 10

    // Delete fake count
    $myEntity->getCounter()->setCorrectionCount(0):
    $entityManager->persist($myEntity);
    $entityManager->flush();
```


