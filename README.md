Visualier:
==========
HOARAU Alexandre
TETIA Thomas
Etudiants DUT Réseaux & Télécoms
2012 - 2013
---------------------------------
Projet:

Mise en place d'un Agent en langage Java, permettant la récupération d'informations diverses 7
et nombreuses d'une machine branché sur le réseau.

Ces informations seront alors envoyées vers un fichier PHP, dans notre cas, ce fichier est home.php,
ce fichier affiche les informations générales de la machine.
Il est possible de consulter plus d'information sur chaque machine active, en cliquant sur le +, 
qui nous renvoi vers le fichier info.php regroupant l'ensemble des informations pour la machine concerné.

---------------------------------
Tutoriel:

Tout dabord placez les dossier de l'interface web dans le répertoire /IC4 à la racine de votre serveur apache sur la
machine sur laquelle vous souhaitez voir les informations des machines connectées.
Afin d'avoir un chemin du type localhost/IC4.
La page d'acceuil de l'application WEB est la page home.php

Dans un deuxième temps, exécutez sur les machines agents, les programmes JAVA via les commandes suivantes:

1 - Compilez les programmes Agents.java & Socket_agent.java:

      #javac Agents.java && Socker_agent.java
      
2 - Lancez dans un premier terminal le programme Agent :

      #java Agents @_du_serveur
      
      @_du_serveur = la machine où l'interface web est en fonctionnement
      
3 - Lancez dans un deuxième terminal le programme Socket_agent : 

      #java Socket_agent @_du_serveur
      
---------------------------------

