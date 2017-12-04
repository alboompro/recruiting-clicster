# Teste Infra

Esse teste consiste em entendermos um pouco mais sobre seus conhecimentos com
Linux, Cloud Computing, AWS, Banco de dados e CLI.

## Esperamos que você

Projete uma estrutura para um servidor que deverá rodar um projeto web em PHP 7;

## Servidor WEB

O servidor web deverá ter as seguintes especificações:

* Banco de dados MySQL Community Server 5.6.38;
* Servidor Web Nginx;
* PHP 7.1 com PHP-FPM;

## Detalhes para a criação

* Será disponibilizado um servidor em AWS, utilizando Ubuntu Server;
* O Servidor deve ser configurado e colocado para funcionar rodando apenas um
	script, exemplo: “install.sh” mas fique a vontade para sugerir outro;
* Você deverá importar dados do arquivo `database.sql` para o banco de dados
	MySQL;
* Crie um script PHP para listar os dados importados no banco de dados;
* Crie um arquivo PHP chamado “ping.php”, este arquivo deverá estar no root do
	servidor web, exemplo: [http://127.0.0.1/ping.php](http://127.0.0.1/ping.php)
	, este arquivo sempre deverá responder um JSON como este: `{"message":
	"pong"}` ;

	    	    	Lembre-se que tudo deve ser feito rodando apenas um comando.

#### Requerimentos

* Tudo deve ser compatível com linux;
* Tudo deve ser feito utilizando tecnologias open-source;
* Otimize o servidor ao máximo;
* O arquivo de listagem do BD deve suportar pelo menos 500 requisições
	simultâneas;
* Você deve fazer **commits** para todo o processo até o arquivo final;
* Você pode nos surpreender, mas não se esqueça que o que pedimos deve ser
	prioridade;

<br><br><sub>Os dados presentes neste teste são totalmente fictícios.</sub>
