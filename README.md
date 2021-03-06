
# ApplicationWeb
Mini-projet du module <b>INFO642</b> à Polytech Annecy.

###### Le contenu du projet est en français, pour accéder à sa description en anglais, cliquez <a href="https://github.com/paul-mathieu/school-staff-management/blob/master/README.en.md">ici</a>
###### The content of the project is in French, to access its description in English, click <a href="https://github.com/paul-mathieu/school-staff-management/blob/master/README.en.md">here</a>


## Contexte
Dans le cadre de notre projet de technologie web, nous avons décidé de choisir le deuxième sujet qui traite de la gestion des intervenants experts dans une école. Ces experts peuvent intervenir dans un cours suite à la requête d’un étudiant auprès d’un professeur.
Nous avons créé une interface web pour les interactions entre les professeurs et les étudiants et une base de données pour stocker toutes les informations utiles.

## Conception du site
### Interface web

Pour l'interface, nous avons utilisé la mise en page proposée par Bootstrap et nous avons utilisé le serveur de l'école pour stocker les fichiers php et css. Tous les accès se font sur la page : <a href="http://tp-epu.univ-savoie.fr/~mathieu9/school-staff-management/index.php">school-staff-management/index.php</a>.

L'accès à l'interface générale se fait après avoir renseigné un login et un mot de passe valides dans la popup qui s’affiche si personne n’est encore connecté. Si un utilisateur n’a pas encore de compte, il peut s’en créer un à l’aide de la popup à côté. Il pourra alors se connecter juste après.

![alt text](/readme/1_popup.png "" | width=100)

&#x1F53C; _Popups de connexion_

La page d’accueil est identique pour chaque personne qui se connecte. Les utilisateurs peuvent juste voir leur statut de compte : Etudiant, Enseignant ou Expert. Sur la partie droite se trouve un menu permettant d’accéder à différentes informations : Accueil, Informations Utilisateur, Messagerie, Contacter les experts et Emploi du temps. 

L'onglet Informations Utilisateur contient toutes les informations du compte à savoir : la photo de profil et le CV, le login, le mot de passe, le nom et le prénom, le mail et un choix de spécialité si c’est un expert. A par le login, toutes ces informations peuvent être modifiées par l'utilisateur. 

![alt text](/readme/2_info.png "")

&#x1F53C; _Informations utilisateur pour un expert_

La messagerie permet aux étudiants et aux intervenants d'échanger toutes les informations nécessaires au cours. Si c’est un étudiant qui est connecté, il a accès à une box lui permettant de créer une nouvelle requête. Une fois cette requête créée, il peut envoyer des messages au prof et ce dernier peut lui répondre. Par message, les étudiants comme les professeurs concernés peuvent suggérer l’intervention d’un expert, mais seul le professeur peut parler directement à l’expert. Toutes les personnes concernées ont accès à l’ensemble des messages de la requête. Par exemple, une fois qu’un professeur s’adresse à un enseignant, cet expert pout voir tous les messages.

![alt text](/readme/3_message.png "")

&#x1F53C; _Système de messagerie pour un étudiant_

Pour pouvoir mieux connaître un expert ou tout simplement en rechercher un, tout utilisateur peut avoir accès à certaines informations de tous les experts. Les deux premières liste de sélection permettent d’accéder aux information d’un expert dont on connait le nom ou le login. La troisième liste permet de rechercher un expert selon sa spécialité. Une fois la liste des experts par spécialité chargée, il est possible d’envoyer directement un mail pour rentrer en contact.

![alt text](/readme/4_expert.png "")

&#x1F53C; _Recherche d'un expert par spécialité_

Le dernier onglet inclut l’emploi du temps des professeurs et des étudiants de l’université Savoie Mont Blanc pour pouvoir rapidement fixer une date pour une possible intervention.  


### Data-base

Pour stocker toutes les données, nous avons mis en place une base de donnée SQL par le biais de phpMyadmin avec la structure suivante :

![alt text](/readme/5_db.png "")

&#x1F53C; _Architecture de la base de données_ 

Lors de l’ajout d’un nouvel utilisateur dans la base de données, c’est la table utilisateur qui sera alimentée en premier, ainsi que la table acces qui permet de différencier les admin des autres utilisateurs. Au départ, son statut (profession) est obligatoirement renseigné et chaque utilisateur pourra compléter les informations liées à son compte par la suite, via la plateforme. Il pourra notamment :
-	ajouter un CV
-	ajouter une photo de profil
-	modifier ses données personnelles

Tout étudiant se verra attribuer au moins un groupe qu’il peut modifier. Les experts peuvent posséder autant de spécialité qu’ils le souhaitent. Enfin, les étudiants euvent créer des requêtes, par exemple une demande d’intervention d’un expert pour mieux comprendre un cours. Celles-ci sont destinées au professeur responsable du groupe concerné par la requête, mais d’autres professeurs peuvent être inclus dans la requête si un étudiant ou un professeur s’adresse à lui. Tous les membres de la requête auront accès aux contenu des requêtes les concernant, notamment les messages échangés entre un étudiant et un professeur mais aussi avec un potentiel intervenant expert qui peut être contacté et intégré à la requête par l’enseignant responsable.
