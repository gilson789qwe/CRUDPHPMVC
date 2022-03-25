# CRUDPHPMVC
Um site simples com CRUD, MVC usando a stack PHP8

#ATENÇÂO
Para funcionar perfeitamente o CRUD:
1 - Crie um banco com nome empresa.
2 - No banco de dados crie duas tabelas, uma com o nome cliente e a outra postagem.

####################################################################

3 - #Na tabela cliente vai receber colunas com os seguintes valores:
  # Field, Type, Null, Key, Default, Extra
  id, int(11), NO, PRI, , auto_increment
  user, varchar(200), NO, , , 
  password, varchar(200), NO, , , 
  
  ######################################################################
  
4 - Na tabela postagem vai receber colunas com os seguintes valores:
  # Field, Type, Null, Key, Default, Extra
  id, int(11), NO, PRI, , auto_increment
  assunto, varchar(200), YES, , , 
  descricao, text, YES, , , 
  data, date, YES, , , 
  ######################################
  #####################################
![postagem](https://user-images.githubusercontent.com/80110990/160109661-711e79ac-ca57-4ec4-976b-04339179faea.png)![cliente](https://user-images.githubusercontent.com/80110990/160109683-048b34ed-f4d5-4ebe-a826-9e7853fbcc55.png)

