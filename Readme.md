# Requisitos
- PHP >= 7.4
- Composer
- Docker

---

# Tecnologias
<div align="center">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" height="40" width="52" alt="javascript logo"  />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/composer/composer-original.svg" height="40" width="52" alt="composer logo"  />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" height="40" width="52" alt="php logo"  />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/phpstorm/phpstorm-original.svg" height="40" width="52" alt="phpstorm logo"  />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg" height="40" width="52" alt="docker logo"  />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linux/linux-original.svg" height="40" width="52" alt="linux logo"  />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg" height="40" width="52" alt="postgresql logo"  />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/symfony/symfony-original.svg" height="40" width="52" alt="symfony logo"  />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/doctrine/doctrine-original.svg" height="40" width="52" alt="doctrine logo"  />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" height="40" width="52" alt="html5 logo"  />
</div>

###

---

# Passos
Siga os passos de forma ordenada.

### Clonar repositório
git clone git@github.com:KauanAmorim/symfony-uello.git

### Alterar dados no php.ini
- upload_max_filesize=40M
- post_max_size=40M 

### habilitar extensão postgresql  
**Windows**<br/>
extension=php_pdo_pgsql.dll<br/>
extension=php_pgsql.dll

**Linux**<br/>
sudo apt install php7.4-pgsql

### Levantar container de banco de dados.
sudo docker-compose up -d

### instalar dependências
composer install

### executar migrations
composer migrate-db

### iniciar aplicação
composer start-server

---

## Validação de PSRs

Para validar as PSRs, eu instalei uma dependência de 
desenvolvimento chamada php_codesniffer, use:

composer checkPSRs

---

### Database settings

host: 0.0.0.0
port: 5432
dbname: uello
password: password

---

### O que pode melhorar e será implementado futuramente

**Ambiente Docker**<br/>
Não consegui fazer a tempo um ambiente docker 100% para só subir o 
docker e entrar na aplicação, mas futuramente irei adicionar isso no repositório, 
mesmo que o teste tenha passado.

**Testes**<br/>
Acabou que eu fiz um curso inteiro de phpunit praticando bastante e não consegui
implementar os testes a tempo, futuramente será implementado para amadurecer o conhecimento.

---

## Observações

Foi a primeira vez que acabei me deparando como o PHP-FPM, ele pode acabar ajudar bastante na execução do código, e futuramente será implementado algo relacionado,
acabei descobrindo por causa de um video sobre PHP distribuido e paralelo e depois na alura vi um curso de php paralelo e me deparei com o PHP-FPM

video - https://www.youtube.com/watch?v=exf0HPoV1MA&t=179s&ab_channel=iMasters
curso - https://www.alura.com.br/curso-online-php-parallel-programacao-paralela
      - https://www.alura.com.br/conteudo/php-parallel-programacao-paralela
