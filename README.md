<h1> Projeto Eva</h1>
<h3> TCC do programa de capacitação Entra21</h3>

<!-- TABLE OF CONTENTS -->
<details>
  <summary name="indice">Índice</summary>
  <ol>
    <li><a href="#projeto">Sobre o projeto</a></li>
    <li><a href="#estrutura">Estrutura do projeto</a></li>
     <li><a href="#backlog">Backlog do projeto</a></li>
    <li><a href="#log">Log de eventos</a></li>
    <li><a href="#tecnologias">Dependências e Tecnologias usadas</a></li>
    <li><a href="#link">Projeto online</a></li>
  </ol>
</details>
<h2 name="projeto"> Sobre o projeto  </h2>
Este projeto foi realizado pelos colaboradores Alessandro Geras, <a href="https://github.com/Eliabe-Ribeiro-22">Eliabe Ribeiro</a> e <a href="https://github.com/Vinnie-Jung">Vinícius Jung</a> com o objetivo de ajudar uma instituição não governamental, chamada Espaço Vida e Saúde, localizada na cidade de Garopaba, no qual são realizados vários tipos de atendimentos para atender pacientes com autismo. <br><br>

No projeto, estão presentes recursos que permitem o contato e a divulgação dos profissionais da área da psicologia, bem como a democratização do acesso a esse tipo de serviço. Existirá um recurso em que as pessoas cadastradas terão seu atendimento documentado e disponibilizado para acompanhamento familiar. Também será adicionada uma página de eventos onde serão exibidas diversas palestras educacionais a respeito do autismo. <br>
<p align="right">(<a href="#indice">voltar ao indice</a>)</p>

<h2 name="estrutura"> Estrutura do projeto  </h2>
Site com 4 páginas até o momento. O projeto está totalmente responsivo e seguindo os padrões REST.<br /><br />

<ul>
    <li>Cabeçalho adicionado como layout, contendo logo e menu, sendo replicado em todas as páginas automaticamente e totalmente responsivo.</li>
    <li>Rodapé adicionado como layout, contendo informações do projeto, link e QR Code para o usuário se cadastrar no grupo de Whatsapp da instituição, sendo replicado em todas as páginas automaticamente e totalmente responsivo.</li>
    <li>Página Home, contendo uma seção de boas-vindas com opção de login da plataforma e outra seção com flex-box com links atrelados a outras páginas.</li>
    <li>Página Palestras, contendo um formulário para criação de palestras e outro para pesquisar palestras na qual são mostradas em uma timeline em ordem de data descrescente.</li>
</ul>
<p align="right">(<a href="#indice">voltar ao indice</a>)</p>

<h2 name="backlog">Backlog do projeto</h2>
<a href="https://trello.com/b/eadpGobh/projeto-eva-scrum">Ver SCRUM</a><br/>
<a href="https://trello.com/b/IrQOIx85/projeto-eva-kanban">Ver KANBAN - Alessandro</a><br/>
<a href="https://trello.com/b/tEHIGePz/projeto-eva-kanban-eliabe">Ver KANBAN - Eliabe</a><br/>
<a href="https://trello.com/b/MHHX9mSR/projeto-eva-kanban">Ver KANBAN - Vinícius</a>
<p align="right">(<a href="#indice">voltar ao indice</a>)</p>

<h2 name="log">Log de eventos</h2>

<h4>01/08 - Alessandro</h4>
Criado repositório no Github chamado ProjetoEva <br/>
Criado conta no Heroku chamado ProjetoEva <br/>
Criado banco de dados PostgreSQL no Heroku<br/>
Criado layout com cabeçalho, contendo o logo da instituição e um menu responsivo que ganha características de um menu mobile.
Criada a branch <em>index</em> para ser utilizada como página principal.

<h4>03/08 - Eliabe</h4>
Criada a página principal do site, contendo uma seção de boas-vindas com opção de login da plataforma
e outra seção com flex-box com links atrelados a outras páginas

<h4>05/08 - Vinícius </h4>
Criada a estrutura do rodapé da página principal do site junto com a sua estilização, contendo dados como contatos e localização, além de possuir link e QR code de acesso ao grupo de Whatsapp da instituição.

<h4>08/08 - Eliabe</h4>
Criada a branch <em>courses</em> para a permitir ao usuário a possibilidade de inserção de cursos na agenda exibida na plataforma.

<h4>08/08 - Vinícius </h4>
Realizado o merge das branchs <em>master</em> e <em>index</em>.

<h4>17/08 - Vinícius </h4>
Criado o formulário de criação e busca de palestras da página "palestras". <br/>
Adicionados os estilos do formulário.

<h4>18/08 - Alessandro </h4>
Criada a timeline de eventos da página "palestras". <br/>
Adicionado os estilos da timeline e configurado para ser responsivo, fazendo com que a timeline de duas colunas, fique apenas com uma na versão mobile.

<h4>19/08 - Alessandro </h4>
Criado JS para redirecionar uma palestra clicada na página "palestras" para uma rota dinâmica na página "palestra". Também para fazer a passagem de dados desta palestra para autocompletar o formulário de edição de palestras e para identificar a palestra nas rotas dinâmicas de edição e exclusão para administradores e ingresso e saída para usuários. <br>
Realizado o merge das branchs <em>master</em> e <em>palestras</em>.<br>

<h4>26/08 - Alessandro </h4>
Criada a branch <em>palestra</em> para ser utilizada para visualizar dinamicamente cada palestra, na qual os administradores e usuários poderão interagir com suas respectivas regras de usuário.<br>
Configurado rotas para autenticação de usuários.
<p align="right">(<a href="#indice">voltar ao indice</a>)</p>

<h2 name="tecnologias">Dependências e Tecnologias usadas</h2>

O site será feito em PHP utilizando ferramentas do framework Laravel e terá um auxílio de Javascript para o controle de alguns eventos e interações com CSS. O banco de dados que será utilizado é o PostgreSQL e terá um vínculo com o sistema de cadastros do JetStream para criar, editar e excluir usuários de acordo com as regras do Spatie sobre hierarquia de usuários. O projeto terá seu deploy feito no Heroku.

<a href="heroku.com">Heroku</a> <br/>
<a href="https://laravel.com/">Laravel</a> <br/>
<a href="https://www.php.net/">PHP</a> <br/>
<a href="https://www.javascript.com/">Javascript</a> <br/>
<a href="https://www.postgresql.org/">PostgreSQL</a> <br/>
<a href="https://spatie.be/">Spatie</a> <br/>
<a href="https://jetstream.laravel.com/">Jetstream</a> <br/>
<a href="https://nodejs.org/">NodeJS</a> <br/>
<a href="https://github.com/CodeSeven/toastr">Toastr</a> <br/>
<a href="https://jquery.com/">jQuery</a> <br/><br/>

<p align="right">(<a href="#indice">voltar ao indice</a>)</p>

<h2 name="link">Projeto online</h2>
<a href="https://projetoeva.herokuapp.com/">Projeto Eva</a> <br/>
<p align="right">(<a href="#indice">voltar ao indice</a>)</p>

## Developers<br /> <a name="developers"></a>
Alessandro Geras<br/>
[Curriculum Vitae](https://alessandrogeras.github.io/Curriculum) <br/>
[Linkedin](https://www.linkedin.com/in/alessandrogeras) <br/>
[Github](https://github.com/AlessandroGeras) <br>
[Gmail](mailto:alessandrogeras@gmail.com) <br>
#
Eliabe<br/>
[Curriculum Vitae](https://github.com/Eliabe-Ribeiro-22/Eliabe-Ribeiro-22/blob/main/README.md) <br>
[Linkedin](https://www.linkedin.com/in/eliabe-ribeiro-mota-b9a1b7233/) <br>
[Github](https://github.com/Eliabe-Ribeiro-22) <br>
[Gmail](mailto:developer.eliabe@gmail.com) <br>
[Outlook](mailto:eliaberibeiro06@hotmail.com)<br/>

#
Vinícius Jung<br/>
[Linkedin](https://www.linkedin.com/in/vinicius-jung) <br>
[Github](https://github.com/Vinnie-Jung) <br>
[Outlook](mailto:viniciusjung@outlook.com) <br><br>

<p align="right">(<a href="#indice">voltar ao indice</a>)</p>
