# Este archivo es una guía de comando para que puedan subir sus 
# avances al repositorio de github

# COSAS PARA HACER LA PRIMERA VEZ

# en este comando tiene que poner su nombre para crea la rama 
# en la que van a trabajar
git branch <suNombre>

# para subir commits git necesita que asocien un correo
# y nombre de usuario. Para hacer eso se ejecutan estos comandos

# para su username
git config --global user.name "suUserDeGitHub"

# para su email
git config --global user.email "suEmailDeGitHub@algo.com"

# luego de que crean su rama de trabajo, se meten dentro
# con este comando
git checkout <suNombre>

# con todos esos comandos hechos solo una vez, se pueden
# subir cosas al repositorio

# agregar archivos para el commit
# tiene que estar en la raíz del proyecto para hacerlo 
# correctamente
git add .

# para hacer un commit
git commit -m "dentro de estas comillas ponen un mensaje"
# traten de que el mensaje sea corto, pero descriptivo
# de lo que hicieron

# para subir su trabajo al repositorio
git push
