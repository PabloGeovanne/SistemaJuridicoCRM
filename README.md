# SystemJuridicoCRM
Sistema Jurídico Small-CRM - Calculo trabalhista - Geração de documentos Jurídicos e controle de dados dos clientes

Se trata de um sistema totalmente web, desenvolvido esporadicamente no ano de 2016, 2017 e 2018 para Advocacia do Brasil, adaptada focando principalmente para o hambiente jurico do estado de São Paulo.

Sistema foi desenvolvido usando linguagens de programação e feramentas...
PHP(HTML como linguagem de marcação), JQuery(para realizar efeitos/eventos Front End, e calculos matematicos), JavaScript(para realizar calculos matematicos e pequenos efeitos em elementos do HTML), Banco de dados MySql, FrameWorks BootStrap 3.3(Para estilizar o layout das paginas, e alguns efeitos usando o JS do Bootstrap), foi integrado alguns script e mini sistema: tais como calendario OpenSource(FullCalendar), Chosen para efeito em elementos do HTML(Input Select search), Script Word Export(para a criação de documentos do formato .DOC).

O Projeto foi desenvolvido usando o PHP de forma estruturada.

##PRÓS##
Sistema funciona perfeitamente, é possivel acessar usando as credenciais de acesso, é possivel se cadastrar no sistema(sendo necessario ser aprovado o cadastro), é possivel cadastrar cliente usando dados pessoais tais como (Nome, CPF , endereço, informações do trabalho: salario, periodo trabalhado, etc..), realiza calculos trabalhista tais como (Férias, Décimo Terceiro, FGTS, INSS, etc..), gerá documentos para a edição no WORD ou para a impressão pelo navegador, realiza a gestão de documentos usando a metodologia de estoque e localização de arquivamento(cadastro de pasta de cliente, cadastro de local arquivado), é possivel cadastrar evento tais como (Audiência, Prazo de peticionamento, reunião, e outras) para que possa ser acompanhada em calendario os eventos cadastrados juntamente com os horarios agendado.

##CONTRA##
Em algumas paginas falta um toque de simplicidade para aperfeiçoar a usabilidade do usuario(Pagina de cadastro de cliente, pagina de gerar petição inicial, pagina de ajustar fundamentos juridicos), O uso ainda é um pouco complexo para iniciantes no sistema, algoritmo de calculos são exibidos no front end, oque não é ideal, o algoritmo que gera os fundamentos através dos dados cadastrado, não é 100% perfeito, a organização dos texto e fundamentos juridicos estão em estruturação procedural, não sendo o ideal, podendo ser melhorada para requisições GET e SET usando o POO, O nivel de segurança dos dados é baixa(sensível a SQL inject em alguns aspectos) a conexão com o banco é variada em MSQLi, MYSQL e PDO(o que não é ideal, é indicado usar apenas o PDO e excluir a outras conexões inclusive a MSQL), as senhas dos usuarios não são criptografada, é ideal usar procedimentos de criptografia tais como HASH1 ou MD5 ou mesclar entre as duas, falta sistema de gestão Administrativa do sistema(Gestão Web Master), possuindo apenas no projeto o sistema para o Cliente Advogado.
