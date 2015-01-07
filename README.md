Symfony Addressable Bundle
==========================

This is a Symfony2 bundle which facilitates making entities addressable and geo location aware.

It includes a map form type to set address by searching  in a google map.


Status
------

Under development.

Next steps:

- Add Bing map option/alternative
- Geo-location awareness (search by radius, distance calculator, route mapping, etc)


Installation
------------

Add the following to ``:

```yaml
#composer.json

"require": {
    ...
    "daa/addressable-bundle": "dev-master"
}
```

Register the bundle in your app/AppKernel.php:

```php
new Daa\AddressableBundle\DaaAddressableBundle(),
```

Add the bundle to assetic in your config file:

```yaml
# app/config/config.yml
  
# Assetic Configuration
assetic:
    bundles: [ 'DaaAddressableBundle' ]
```

Include the twig template for the type layout.

```yaml
# app/config/config.yml

twig:
    form:
        resources:
            - 'DaaAddressableBundle:Form:fields.html.twig'
```


Usage
-----

Now make the entity you want to make addressable implement the included AddressableInterface and use the relevant trait (ORM or PHPCR version) or manually implement the specified fields in your entity.

```php
    namespace Your\Project;

    use Daa\AddressableBundle\Model\AddressableInterface;
    use Daa\AddressableBundle\Model\ORM\AddressableTrait;

    class YourEntity implementes AddressableInterface 
    {

        use AddressableTrait;
        
        /**
         * @ORM\Column(type="text")
         */
        protected $yourOtherField;
        
        ...
        
    }
```

Note, if you are using an older version of PHP which does not support traits, then you are forced to copy the trait code manually into your entity.

Once your entity is setup, we can add the address map selector to your forms in the following ways:

```php

// if you are using Sonata Admin
protected function configureFormFields(FormMapper $formMapper)
{
    $formMapper
        ->with('Location')
            ->add('address', 'addressable_type', array())
        ->end()
        ...
}

// if you are using standard symfony form type
public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder
        ->add('address', 'addressable_type', array())
    ...
}

```

Options
-------

We can override several options:

```php
->add(
    'address',
    'addressable_type',
    array(
        'type' => 'text',  // the types to render the lat and lng fields as
        'latlng_type' => 'hidden',  // the types to render the lat and lng fields as
        'options' => array('read_only' => true), // default options for all fields
        'streetnumber_options' => array(),   // the options for just the street number field
        'streetname_options' => array(),   // the options for just the street name field
        'city_options' => array(),   // the options for just the city field
        'country_options' => array(),   // the options for just the country field
        'zipcode_options' => array(),   // the options for just the zip code field
        'lat_options' => array(),   // the options for just the lat field
        'lng_options' => array(),    // the options for just the lng field
        'error_bubbling' => false,
        'map_width' => '100%',  // the width of the map
        'map_height' => 300,     // the height of the map
        'default_lat' => 51.5,    // the starting position on the map
        'default_lng' => -0.1245, // the starting position on the map
        'include_jquery' => false,   // include jquery if needed
        'include_gmaps_js' => true,     // include google maps js if needed
        'include_current_pos_link' => false, // show use my current location button
        'country_field' => 'country', // country field name to use
        'zipcode_field' => 'zipCode', // zipcode field name to use
        'streetnumber_field' => 'streetNumber', // country field name to use
        'streetname_field' => 'streetName', // street name field name to use
        'city_field' => 'city', // city field name to use
        'lat_field' => 'latitude', // lat field name to use
        'lng_field' => 'longitude' // lng field name to use
    )
)
```


Screenshot
----------

Sonata implementation:

![View screenshot](https://raw.githubusercontent.com/danielanteloagra/addressable-bundle/master/screenshot.png)