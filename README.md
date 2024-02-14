# Challenge - rattrapage

## Etape1
Dupliquez le fichier .env.example et renommez la copie en .env. Assurez-vous de configurer les informations de base de données appropriées dans ce fichier.

## Etape2
Accédez au répertoire du projet et installez les dépendances Laravel en utilisant Composer. Exécutez la commande suivante :
composer install

## Etape3
Laravel utilise une clé d'application pour sécuriser divers aspects de l'application. Générez-la avec la commande suivante :
php artisan key:generate

## Etape4
Maintenant, vous pouvez exécuter les migrations pour mettre à jour la base de données. Utilisez la commande artisan suivante :
php artisan migrate

## Etape5
Une fois que les migrations ont été exécutées avec succès, vous pouvez démarrer l'application Laravel avec la commande suivante :
php artisan serve 
