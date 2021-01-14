<b>DESCRIPTION</b><br>

API prête à l'emploi avec documentation & dashboard, développée sous <b>Symfony 5.1</b>.<br>

 Recipes :<br>
 `api-platform/core`<br>
 `doctrine/annotations`<br>
 `doctrine/doctrine-bundle`<br>
 `doctrine/doctrine-migrations-bundle`<br>
 `easycorp/easyadmin-bundle`<br>
 `nelmio/cors-bundle`<br>
 `symfony/apache-pack`<br>
 `symfony/console`<br>
 `symfony/flex`<br>
 `symfony/framework-bundle`<br>
 `symfony/maker-bundle`<br>
 `symfony/routing`<br>
 `symfony/security-bundle`<br>
 `symfony/translation`<br>
 `symfony/twig-bundle`<br>
 `symfony/validator`<br>

La route `http://localhost:8000` donne accès à la page de base de Symfony et aux informations de version<br>

La route `http://localhost:8000/login` donne accès au formulaire de connexion<br>
  Par défaut :<br>
      `Nom d'utilisateur : Admin`<br>
      `Mot de passe: admin`<br>
  La connexion fait apparaitre les boutons de navigation vers la doc et le dashboard.<br>

La route `http://localhost:8000/api` donne accès à la documentation de l'API (<i>apiplatform</i>)<br>

La route `http://localhost:8000/admin` donne accès au tableau de bord (<i>easyadmin</i>)<br>

<b>INSTALLATION :</b><br>

Installation de Symfony (sous Windows)</br>
  `https://symfony.com/download`</br>

Installation de Composer</br>
`https://getcomposer.org/Composer-Setup.exe`</br>

La base de données fournies est de type MySQL. Le plus simple est d'installer WampServer64.</br>
  `https://www.wampserver.com/en/download-wampserver-64bits/`</br>

Ouvrez votre terminal (<i>cmder pour ma part</i>):<br>
<i>Téléchargeable à cette adresse :</i> https://cmder.net/</br>

`symfony check:requirements` <i>Vérifie que votre environnement est prêt pour un projet Symfony...</i><br>

`cd nom-du-projet` <i>Placez-vous à la racine du projet. Là aussi, c'est assez logique ! (Vous pouvez évidemment renommer le dossier)</i><br>

C'est maintenant que tout commence :<br>
`composer install` ou `composer update`<br> <i>Permet d'installer toutes les dépendances nécessaires pour faire tourner l'application</i></br>
Attention : pas de `composer upgrade` <i>Ceci aurait pour effet d'installer d'éventuelles versions majeures. Risque d'incompatibilité entre dépendances...</i><br>
 
Renommez le fichier SQL fourni selon votre convenance.</br>
Lancez WampServer</br>
Ouvrez PHPMyAdmin</br>
Importez le fichier SQL pour non seulement créer la base mais également importer l'utilisateur Admin au passage.</br>
Ouvrez le fichier `.env.local` et configurez la ligne suivante selon vos ; nom d'utilisateur `root`, mot de passe `root` et nom de la database `sandbox_db`:</br>
  - DATABASE_URL=mysql://root:root@127.0.0.1:3306/sandbox_db?serverVersion=5.7</br>

Enregistrez...</br>

Demarrez le serveur de votre choix :</br>
`symfony serve`ou `php -S localhost:8000 -t public`</br>

Dans le navigateur :</br>
  Accès au projet symfony :</br>
    `localhost:8000`</br>
    
  Accès à la page de connexion :</br>
    `localhost:8000/login`</br>
    
  Accès à la documentation de l'API :</br>
    `localhost:8000/api` <i>Une fois connecté. Le bouton `API doc` renvoi sur cette page</i></br>
    
  Accès au tableau de bord :</br>
    `localhost:8000/admin` <i>Une fois connecté. Le bouton `Dashboard` renvoi sur cette page</i></br>
    
A ce stade, tout est prêt pour bien commencer.</br>

Pour infos, l'authentification est ici mise en place via le maker et est tout à fait opérationnelle.</br>
Pour des raisons de sécurité et donc d'usage, le dashboard n'autorise pas la création d'un utilisateur. Le mot de passe nécessite un cryptage.</br>
Il vous reste donc uniquement la partie `register` à créer & les méthodes qui vont bien à implémenter, pour pouvoir créer ou modifier vos users.</br>
C'est pour cette raison d'ailleurs, que je fournis ici le fichier sql avec l'admin déjà créé. Vous l'aurez compris.</br>

"Un bon développeur est un développeur faignant !" ...celle-là vous l'aurez sûrement déjà entendue.</br>
Mon conseil donc : si vous prévoyez de créer plusieurs API, avant de modifier d'avantage le code source, je vous invite fortement à dupliquer le projet dans un dossier boîte à outils. (<i>chez moi ToolBox</i>).</br>
Conserver vos codes sources les plus souvent réutilisés de cette manière est une bonne habitude à prendre.</br>

Vous avez à présent tout ce dont vous avez besoin pour démarrer facilement un projet d'API.</br>
Créez vos entités rapidement avec un `php bin/console doctrine:make:entity`</br>
Intégrez-les dans les ressources d'API platform pour les exposer (<i>regardez la class `User.php` pour exemple si besoin</i>)</br>
Mettez à jour la base de données `php bin/console doctrine:schema:update` ...ou via les migrations `make:migration` & `do:mi:mi`</br>
Et voilà !</br>

 ...
