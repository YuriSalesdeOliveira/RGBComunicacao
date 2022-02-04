<p align="center">
  <img src="https://user-images.githubusercontent.com/54549125/152555128-7976e745-f464-445e-a134-e24ab4f59880.gif" width="500"/> 
</p>

# RGBComunicacao

Esse projeto é minha solução para o teste técnico da empresa RGB Comunicação.

### Como usar

- Suba as imagens docker
- Crie a pasta cache dentro da pasta source
- Crie o arquivo "app.php" no diretório config usando o arquivo exemplo "app.sample.php"
- Rode as migrations com o comando abaixo
```bash
vendor/bin/phinx migrate
```
- Rode os seeds com o comando abaixo
```bash
vendor/bin/phinx seed:run
```
Obs: Eu deixei tudo preenchido no arquivo app de exemplo para que não tenha complicação desnecessária, mas, sei que em um projeto real isso não é correto.
