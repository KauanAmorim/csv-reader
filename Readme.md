
Para não dar erro em pelo menos 3 arquivos CSV de 10MB, será necessário mudar o php.ini e atualizar para 30 MB:
- upload_max_filesize
- post_max_size


Windows
extension=php_pgsql.dll

Linux
Para liberar o driver do postgresql
- sudo apt install php7.4-pgsql


php bin/console doctrine:migrations:migrate 