# API de teste para a fase de candidatura à vaga.
## Introdução
Implementação de uma API usando Laravel.

### Instruções
<details>
<summary>
INSTRUÇÕES E DETALHES DO TESTE
</summary>

## Crie uma aplicação Laravel API para uma suposta agência de viagens.
### Glossário
A Viagem (**travel**) é a unidade principal do projeto: contém todas as informações necessárias, como o número de dias, as imagens, o título, etc. Um exemplo é o São Paulo: Arquitetura, arte no MASP e compras ou Florianópolis: Praias, trilhas e resorts;

**Tour** é um intervalo de datas específico de uma viagem com preço e detalhes. São Paulo: Entre os dias 10 a 27 de maio, por R$ 5.000, o melhor da arquitetura e compre de tudo, outro de 10 a 15 de setembro por R$ 2.300 etc.

### Metas
Ao final o projeto deverá ter:

1. Um endpoint privado (admin) para criar novos usuários. Se você quiser, também pode ser um comando artisan, como quiser. Será utilizado principalmente para gerar usuários para este exercício;
2. Um endpoint privado (admin) para criar novas viagens;
3. Um endpoint privado (admin) para criar novos tours para uma viagem;
4. Um endpoint privado (editor) para atualizar uma viagem;
5. Um endpoint público (sem autenticação) para obter uma lista de viagens paginadas. Deve retornar apenas `is_public`;
6. Um endpoint público (sem autenticação) para obter uma lista de passeios paginados pelo `slug` de viagem (por exemplo, todos os passeios do `exemplo-de-link` de viagem). Os usuários podem filtrar (pesquisar) os resultados por `priceFrom`, `priceTo`, `dateFrom` (a partir de `starting_date`) e dateTo (data até `ending_date`). O usuário pode classificar a lista por preço asc e desc. Eles sempre serão classificados, após cada filtro adicional fornecido pelo usuário, por `startingDate` asc.

### Models
#### User
* ID
* E-mail
* Password
* Roles (relacionamento M2M)

#### Roles
* ID
* Name

#### Travels
* ID
* Is Public (bool)
* Slug
* Name
* Description
* Number of days
* Number of nights (campo virtual, calculado como numberOfDays - 1)

#### Tours
* ID
* Travel ID (M2O relationship)
* Name
* Starting date
* Ending date
* Price (integer, veja abaixo)

##### Notas
* Sinta-se à vontade para usar a autenticação nativa do Laravel.
* Usamos UUIDs como chaves primárias em vez de IDs incrementais, mas não é obrigatório usá-los, embora seja muito apreciado;
* Os valores (`price`) dos tours são números inteiros multiplicados por 100: por exemplo, 999 reais serão `99900`, mas, quando devolvidos ao Frontends, serão formatados (`99900/100`);
* Os nomes dos tours dentro das amostras são algo que usamos internamente, mas você pode usar o que quiser;
* Cada usuário administrador (`admin`) também terá a role de `editor`;
* Cada endpoint de criação, é claro, deve criar um e apenas um recurso. Você não pode, por exemplo, enviar um array de recursos para criar;
* O uso de php-cs-fixer e larastan é uma ***vantagem***;
* Criar documentos é uma ***grande vantagem***;
* Os testes de recursos são uma ***mega grande vantagem***.
</details>

## Requerimentos
- PHP ^8.1
- Composer ^2.0
- Laravel (v10)
- Banco de dados (usei o MySQL 5.4)
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
## Ambiente 	:footprints: 	:footprints: 	:footprints:
### CLONE DO PROJETO
- Navegue até o diretório desejado e siga as seguintes instruções:
```
git clone https://github.com/wagnerbugs/travel-api.git
```
&nbsp;&nbsp;&nbsp;

### CRIAR O ARQUIVO `.env` A PARTIR DO `.env.example`
```
cp .env.example .env
```
- ***No Linux, Mac***
```
nano .env
```
- ***No Windows***
```
notepad .env
```
- Altere o nome do projeto (`APP_NAME`)
- Defina o banco de dados de sua preferência e os dados de conexão (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`)
- Salve as alterações `CTRL` + `X` , `Y` , `ENTER` (Mac.: `Command` + `X` , `Y` , `ENTER`)

&nbsp;&nbsp;&nbsp;
### INSTALAÇÃO DAS DEPENDÊNCIAS
```
composer update
```
&nbsp;&nbsp;&nbsp;

### CHAVE HASH DA APLICAÇÃO
```
php artisan key:generate
```
&nbsp;&nbsp;&nbsp;
### BANCO DE DADOS .env
```
mysql -u root -p
```
- ***Digite a senha***
```
create database nome_do_banco_de_dados;
exit;
```
&nbsp;&nbsp;&nbsp;
### MIGRAÇÃO DAS TABELAS
```
php artisan migrate
```
- ***"Rode" a seed (Role ['admin', 'editor'])***
```
php artisan db:seed
```
- ***Alternativamente, você pode utilizar o comando migrate + seed***
```
php artisan migrate:fresh --seed
```
&nbsp;&nbsp;&nbsp;
### TESTES (PHPUnit)
```
php artisan test
```
&nbsp;&nbsp;&nbsp;

### CRIAR USUÁRIO
```
php artisan user:create
```
- Nome, E-mail, Senha e Role (Função) ['admin', 'editor']

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

### IN PROGRESS
- Documentação. (Vou usar o swagger ou scribe =P)
