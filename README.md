# AirEscape-Soft
Projet escape game pour les lycéens créé par Dimitry Benjamin et Rémi RT2

## Description 
**Synopsis** : Votre ami, le capitaine Antoine Leclerc, a disparu juste avant son vol. En fouillant son bureau, vous découvrez des indices menant à un complot. 
**Votre mission** : Vous devez retrouver Antoine, mais faites vite ! Les ravisseurs savent déjà que vous êtes à sa recherche ! 

### Épreuve 1 : Un code couleur
**M5 Stack** : On peut voir devant nous un appareil inconnu que l'on a trouvé dans le bureau d'Antoine. En regardant sur son bureau on voit plusieurs post-it de couleur avec des numéros. En testant le code couleur, on pourra voir une fréquence.

### Épreuve 2 : Un code mystérieux
**Audio GQRX** : Avec la fréquence trouvée précédement, on va sur <u>gqrx</u> pour écouter un audio émit. Dans cet audio, on pourra entendre une phrase utilisant la phraséologie de l'aviation. En prenant en compte la première lettre de chaques mot de la phraséologie de l'aviation, on trouve le mot ARMOIRE. Dans l'armoire, vous trouverez une feuille avec l'inscription suivante : *dlu-exv! 15 mars 44 av J.C 3* qui est un code en Cesar.

### Épreuve 3 : Déchiffrage du code César
*dlu-exv!* : correspond à la suite de lettres à déchiffrer
*15 mars 44 av J.C* : correspond à la mort de César (pour que l’étudiant rentre la date sur internet et pense au code César)
*3* : correspond au décalage des lettres pour le code César

Ce code, une fois déchiffré, nous permet de nous connecter sur la session d'Antoine.

### Épreuve 4 : Ou se trouve Antoine ? 
**Session** : On se connecte à sa session où l'on trouvera un fichier audio nommé secret-morse dans lequel on pourra visualiser et entendre un code morse.
En déchiffrant ce morse on déchiffrera l'endroit où se trouve Antoine.
