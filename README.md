# Como rodar o projeto? #

## front-end ##
A parte do front-end necessita de um servidor simples, apenas para que o ngRoute funcione, 
pode-se usar o bult-in do php, apenas rodando o comando php -S localhost:7000 dentro da pasta 
front-end e tudo irá funcionar perfeitamente, a única configuração no arquivo front-end que pode ser necessária é a constante que define o end-point da API. Precisará ser altearada, apenas se a porta e host
do projeto back-end for alterado. Atualmente o servidor back-end funciona, após iniciado, em `http://localhost:8080`.


## back-end ##
A parte do back-end também é bem simples, porém é necessária algumas configurações antes de colocar o servidor
para rodar o projeto. 

* Iniciar um servidor de banco de dados mysql.
* Ir até um arquivo chamado `back-end/phinx.php` e colocar as configurações do banco de dados. Por padrão 
o nome do banco será "clicster", mas pode ser modificado desde que o nome seja alterado tanto no arquivo quanto no próprio servidor de banco de dados. 
* Após configurar, estando no arquivo `back-end` basta rodar o comando `php console migrate:run`, pois fora utilizado a biblioteca do Symfony para trabalhar com linha de comando. Esse comando irá criar as tabelas necessárias no banco de dados. Tabelas necessárias para o funcionamento do projeto. 
* Feita as configurações básicas, o comando `php console serve` pode ser utilizado, ele irá iniciar um servidor na porta 8080 que pode ser acessada através de `http://localhost:8080`.


