# VMarker CRUD

![Logo](https://github.com/Vbanety/mvmarker_test/blob/main/public/assets/images/vmarker.jpeg)


Aplicação em PHP para efetuar as funções de um CRUD estruturada no formato MVC.

## Índice

- [Instalação](#instalação)
- [Ambiente Linux](#linux)
- [Ambiente Windows](#windows)
- [OBS](#OBS)

## Ambientes:

### LINUX

## Instalação

Faça o clone do projeto, e siga os passos abaixo para efetuar instalação e rodar o projeto.

### Pré-requisitos

- [PHP](https://www.php.net/releases/7_4_33.php) - Versão PHP 7.4.33 (cli)
- [MYSQPL](https://www.ubuntuupdates.org/package/core/jammy/main/base/mysql-8.0) - Versão 8.0.39-0ubuntu0.22.04.1 for Linux on x86_64 ((Ubuntu))


### Passos

1. Clone o repositório

```bash
git clone https://github.com/usuario/nome-do-projeto.git
```

2. Acessar o arquivo db.sql no diretório /database/db.sql da raiz do projeto

3. Criar um banco de dados com o nome db_vmarker com seu gerenciador de bancos ou via terminal, acessando o bash do mysql.

4. Efetuar o upload do arquivo db.sql através do gerenciador de banco dados no banco db_vmarker, ou executar os seguintes comandos:

```bash
mysql -u seu_usuário -p db_vmarker < database/db.sql
```
5. Vá o diretório raís do prejeto, abra o arquivo .env.example, copie o conteúdo, e crie um arquivo novo ".env", adicione o conteúdo copiado no .env adicionado as credênciais de acessso ao banco com seu usuário.

6. Após criar o banco de dados e fazer o restore das tabelas,  abra o projeto com seu editor de texto de preferência, vá até o terminal do seu editor e rode o seguinte comando:

```bash
php -S 127.0.0.1:9000
```
e acesse essa a rota 'http://127.0.0.1:9000' no navegador de preferência

## OBS:
Esse projeto foi desenvolvido em ambiente LINUX, caso queira rodar em ambiente WINDOWS, siga os passos abaixo:

### WINDOWS

1. Após criar o banco de dados e fazer o restore das tabelas, siga os passos abaixo:

2. Certifique-se de que o PHP está instalado e configurado corretamente no seu PATH. Para verificar, abra o prompt de comando e digite:

```bash
php -v
```
4. Vá o diretório raís do prejeto, abra o arquivo .env.example, copie o conteúdo, e crie um arquivo novo ".env", adicione o conteúdo copiado no .env adicionado as credênciais de acessso ao banco com seu usuário.

5. Caso esteja utilizando o XAMP:
- Coloque seu projeto na pasta htdocs do XAMPP:
 - Localização padrão: C:\xampp\htdocs
 - Para o WAMP, a pasta é www: C:\wamp\www
 - Acesse seu projeto via navegador:
 - Coloque a pasta baixada do repositório dentro de htdocs ou www.
Abra o navegador e vá para http://localhost/meuprojeto