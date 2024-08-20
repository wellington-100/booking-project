# Booking project / v2.0

    + VCS: git
    > docker:
        - php   <---------------- image
                                    |
                                    +-- + gd / imagick (image processing)
                                    +-- + mysql
                                    +-- + composer
                                            |
                                            +-- class autoloading
                                            +-- ..

                                    +-- + mysqlnd
                                    +-- + zlib
        - mysql/mariadb
        - react ?



# COMPOSER => make easier templating

    * native php <tag><?= $variable ?></tag>
        - complex syntax
        - universal
        - blocks
        - security / XXS / injection
        - caching
    
    * TEMPLATING ENGINE:
        + twig (Symfony, Drupal)
        + blade (Laravel)
        + wordpress (basic)


# TEMPLATING ENGINE:

    [TEMPLATE / view] ----> render() -----> PAGE
                               ^
                               |
                            data + extensions