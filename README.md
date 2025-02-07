# Doctrine-MariaDB
 MariaDB-specific extensions for Doctrine ORM (for now, just the NATURAL_SORT_KEY() function - see: https://mariadb.com/kb/en/natural_sort_key/).

 To configure this function in a Symfony project using Doctrine, add the following to `/config/packages/doctrine.yaml`:

 ```yaml
 doctrine:
    # ... #
    orm:
        # ... #
        dql:
            string_functions:
                NATURAL_SORT_KEY: WHDoctrine\DQL\NaturalSortKeyFunction
        # ... #
 ```
