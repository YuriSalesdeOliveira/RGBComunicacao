<p align="center">
  <img src="https://user-images.githubusercontent.com/54549125/152555128-7976e745-f464-445e-a134-e24ab4f59880.gif" width="500"/> 
</p>

# RGBComunicacao

Esse projeto é minha solução para o teste técnico da empresa RGB Comunicação.

### Como usar

- Suba as imagens docker
```bash
docker-compose up -d
```
- Instale as dependências
```bash
docker-compose exec php composer install
```
- Crie a pasta cache dentro da pasta source
- Crie o arquivo "app.php" no diretório config usando o arquivo exemplo "app.sample.php"
- Crie a base de dados com o nome 'rgb_comunicacao'
```bash
docker-compose exec db mysql -u root -p
Enter password: root
```
```bash
mysql> create schema rgb_comunicacao;
```
- Rode as migrations com o comando abaixo
```bash
docker-compose exec php vendor/bin/phinx migrate
```
- Rode os seeds com o comando abaixo
```bash
docker-compose exec php vendor/bin/phinx seed:run
```
- Permissão
```bash
docker-compose exec php chmod -R 777 ./
```
- Acesse a url: http://localhost/public/

Obs: Eu deixei tudo preenchido no arquivo app de exemplo para que não tenha complicação desnecessária, mas, sei que em um projeto real isso não é correto.
