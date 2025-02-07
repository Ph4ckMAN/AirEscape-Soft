# AirEscape-Soft
Projet escape game pour les lycéens créé par Dimitry, Benjamin et Rémi en classe de Réseaux et Télécommunications à l'IUT de Kourou en Guyane années 2024-2025.

## Description
**Synopsis** : Votre ami, le capitaine Antoine Leclerc, a disparu juste avant son vol. En fouillant son bureau, vous découvrez des indices menant à un complot.

**Votre mission** : Vous devez retrouver la trace d'Antoine, mais faites vite ! Les ravisseurs savent déjà que vous êtes à sa recherche !

### Épreuve 1 : Un code couleur
**M5 Stack** : Devant vous se trouve un appareil inconnu découvert dans le bureau d'Antoine. Sur son bureau, plusieurs post-it de couleur portent des numéros. En testant le code couleur, vous obtiendrez une fréquence.

### Épreuve 2 : Un code mystérieux
**Audio GQRX** : Grâce à la fréquence trouvée précédemment, vous vous connectez à <u>GQRX</u> pour écouter un audio émis. Dans cet audio, une phrase utilise la phraséologie de l'aviation. En déchiffrant cet audio, vous comprendrez où chercher dans la salle.

Vous y trouverez un indice avec un code écrit dessus.

### Épreuve 3 : Déchiffrage du code César
*dlu-exv!* : correspond à la suite de lettres à déchiffrer
*15 mars 44 av. J.-C.* : fait référence à l’assassinat de Jules César, ce qui incite les joueurs à penser au chiffrement César
*3* : correspond au décalage des lettres dans ce chiffrement

Une fois déchiffré, ce code permet d’accéder à la session d’Antoine.

### Épreuve 4 : Où se trouve Antoine ?
**Session** : En vous connectant à sa session, vous trouvez un e-mail contenant une pièce jointe : un fichier audio nommé *"important"*. En l’écoutant et en le visualisant, vous y détectez un code morse.
En le traduisant, vous découvrirez l'endroit sur lequel Antoine enquêtait et où il pourrait être retenu.

### Fin & Conclusion :
**Victoire** : Découvrez où Antoine a disparu.

**Échec** :  Les ravisseurs arrivent et vous kidnappent.


Un tableau avec le temps de chaque équipes sera affiché à la fin de la partie.


## Réponses

### Épreuve 1 : Un code couleur
Sur le M5 STACK, il faut taper la combinaison **abacabb** ce qui nous affiche la fréquence **95 MHz** que nous devons écouter. Sur cette fréquence sera diffusé l'audio *DERNIER-MESSAGE.wav*. 

### Épreuve 2 : Un code mystérieux
On écoute sur GQRX l'audio émit sur la fréqunce 95 MHz. En prenant la première lettre de chaque mot de cette phrase, on obtient le mot **ARMOIRE**.
Dans l'armoire, se trouvera le papier avec le code César.

### Épreuve 3 : Déchiffrage du code César
Pour déchiffrer le code César, il faut prendre une clé de décalage de *3*. Ce qui nous donne le mot de passe de la session d'Antoine : **air-bus!**

### Épreuve 4 : Où se trouve Antoine ?
En se connectant à sa session, on trouve un e-mail contenant l'audio *SECRET.wav* qui est en code morse. En le traduisant, on trouve le flag de l'escape game qui est **Pekin Daxing**.
