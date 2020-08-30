# Hotel Scheduling #
* Laravel 7.2
* PHP 7.4

### Rodando o projeto no Docker ###

```
### Requisitos ###

### Não possuir serviços locais rodando nas seguintes portas: ###

| SERVIÇOS | PORTAS |
| apache2  | 8080   | 
| postgres | 5432   |
| redis    | 6379   |

### Podem ocorrer conflitos com as portas listadas acima disponibilizadas pelo docker. ###

### Instalar aplicação ###
make setup

### Iniciar aplicação ###
make start

### Parar aplicação ###
make stop

### Desinstalar aplicação ###
make clean

```

### Acessando o projeto na web  ###

```
http://localhost
```

### Acessando o visualizador de emails (Mailcatcher)  ###

```
http://localhost:1080
```

### Acessando o visualizador de filas (Horizon)  ###

```
http://localhost/horizon
```