# Criação de um Widget  #

## Objectivos :##
- Criação de um widget (JS/DOM/AJAX/PHP), que possa ser facilmente inserido, à semelhança do google maps, numa página web de uma loja de livros online.
- Permitir ao utilizador visualizar a informação disponiblizada por qualquer uma das editoras. 
Todos os pedidos realizados ao servidor deve ser feitos usando AJAX, para páginas php alojadas numa máquina servidora.

## Funcionalidades: ##
- Carregar as categorias existentes de várias editoras sem as repetir
- Ao selecionar uma categoria serem apresentados todos os livros dessa categoria existentes nas editoras (Deve-se poder limitar o numero de livros a apresentar)
- Permitir ver os N primeiros livros de cada editora. Cada título deve ser apresentado com um link para a informação completa do livro
- Implementação de paging na funcionalidade anterior
- Guardar numa base de dados a informação de pedidos efectuados

## Valorizações: ##
- Acrescentar á apresentação da informação do livro a possiblidade de o utilizador poder pedir um resumo do livro e a sua capa. Esta informação deve ser pedida ao GoogleBooks ou GoodReads, etc.
- Criar uma editora que devolva livros e informação sobre os mesmos em JSON
- Disponiblizar os dados em HTML complementado com RDFa

## Tecnologias a usar ##
- Javascript para validação de dados de entrada e tratamento de eventos
- Ajax para fazer pedidos aos servidores
- PHP nas páginas servidoras
- DOM para agregação dos dados recebidos e na apresentação dos mesmos no browser


## Desenvolvido por: ##
**Marcio Martins** (martinsmas)
&
**Ricardo Brandão** (1111121RicardoBrandao)
