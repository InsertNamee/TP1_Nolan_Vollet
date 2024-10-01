FROM mysql:latest

# Variables d'environnement pour configurer MySQL
ENV MYSQL_ROOT_PASSWORD=root_password
ENV MYSQL_DATABASE=my_database
ENV MYSQL_USER=my_user
ENV MYSQL_PASSWORD=my_password 

# Copier un script SQL d'initialisation (si nécessaire)
COPY ./init.sql /docker-entrypoint-initdb.d/

# Exposer le port MySQL
EXPOSE 3306

# Utiliser le script d'entrée MySQL fourni avec l'image officielle
CMD ["mysqld"]
