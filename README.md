# Teste-Koode
 Teste prático Koode
 
## Como rodar?
### Faça o download ou 'push' e com o terminal no diretório do projeto, rode o comendo abaixo para instalar todas as dependências (isso considerando que tenha o composer instalado na sua máquina)
```
composer install
```
### Depois, coloque seu arquivo .env para conectar ao seu banco de dados local e rode o seguinte comando no mesmo diretório
```
php artisan key:generate
```
#### Seu arquivo .env precisa ter isso (mas com as suas credenciais, claro)
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hackernews
DB_USERNAME=root
DB_PASSWORD=
```
### Depois disso, rode as migrations com
```
php artisan migrate
```
### Não esqueça das seeders
```
php artisan db:seed
```
### E por último este comando para ver rodando no seu navegador
```
php artisan serve
```

