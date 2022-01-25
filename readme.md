# Cinema CESI

## install

```bash
composer # vérifier que composer est bien installer
composer init # initialise un projet composer php
# recherche de dépendence no, no et entrer pour le reste
Would you like to define your dependencies (require) interactively [yes]? no
Would you like to define your dev dependencies (require-dev) interactively [yes]? no
Do you confirm generation [yes]? yes
# installer les dépenses du projet
composer install
```

ajouter l'autoad au composer.json
```json
    {
    "name": "krake/cinema",
    "autoload": {
        "psr-4": {
            "App\\": "src"
        }
    },
    "authors": [
        {
            "name": "Olivier Poussel",
            "email": "olivier.poussel@gmail.com"
        }
    ],
    "require": {}
}
```

- créer un repertoire src
- créer un fichier index.php a la racine du projet

## lancer le serveur PHP

```bash
php -S localhost:8000
```