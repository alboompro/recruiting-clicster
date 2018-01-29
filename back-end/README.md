# O que foi usado no back-end? #

Algumas tecnologias simples foram implementadas, pois o slim é um framework feito para ser leve, ao mesmo tempo que totalmente customizável, isso que o faz ser tão podereoso. 

Alem do que já vem instalado junto com o skeleton do slim, também fora implementado:

* Phinx: Uma biblioteca que facilita bastante o processo de migração em banco de dados, permitindo que se crie sementes, migrations e diversas outras coisas, além de ajudar a separar os ambientes e com isso facilitar o deploy. 

* Eloquent: Além de ser um dos melhores ORM, também provê toda uma interface simples para trabalhar com CRUD de uma forma bem mais rápida e com menos linhas de código.

* Symfony console: É a biblioteca do framework Symfony e utilizada pelo artisan, porém é totalmente customizável e provê métodos simples para que você possa criar seus próprios command lines. 