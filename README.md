# **Aperçu**

Ce plugin permet de changer les messages de connexion et deconnexion d'un joueur.

---

# **Fonctionnalités**

- **Message de connexion :** Définissez des messages personnalisés pour accueillir les joueurs lorsqu'ils rejoignent votre serveur. Activé ou non un message de bienvenue lors de la première connexion.
- **Message de déconnexion :** Personnalisez les messages affichés lorsque les joueurs quittent votre serveur.
- **Optimisé :** Conçu pour être léger et efficace, garantissant un impact minimal sur les performances du serveur.

---

# **Installation**

Pour installer le plugin, téléchargez le, puis glissez le dans le dossier `plugins` de votre serveur PocketMine.

---

# **Configuration de base :**

```yaml
first-join-message:
  enabled: false
  type : "popup"
  message: "Bienvenue, {player} ! Amuses toi bien sur le serveur !"

join-message:
  type: "popup"
  message: "{player} à rejoint le serveur !"

quit-message:
  type: "message"
  message: "{player} à quitté le serveur !"
```

---

# **Contributions**

Les contributions sont les bienvenues ! Si vous avez des suggestions pour de nouvelles fonctionnalités, des corrections de bugs ou des améliorations, n'hésitez pas à ouvrir une issue ou à soumettre une pull request.

---