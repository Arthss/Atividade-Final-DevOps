# Atividade Final - DevOps na Prática (GCC270)

## Docente: Rafael Serapilha Durelli
## Discente: Arthur Eduardo Silva

Este projeto foi desenvolvido para fins de estudo do Kubernetes.

Foi criada uma API em PHP para uma lista de tarefas que permite cadastrar, consultar e deletar tarefas de uma lista. Como é apenas para fins de estudos, não foi criada uma conexão com o banco de dados. Dessa forma, não existe persistência dos dados, uma vez que a lista de tarefas está diretamente armazenada em um array.

Para executar este projeto, é necessário ter instalado o Docker, Kind, Kubectl e Helm.

Para executar este projeto, é necessário ter instalado o [Docker](https://www.docker.com/), [Kind](https://kind.sigs.k8s.io/), [Kubectl](https://kubernetes.io/docs/reference/kubectl/overview/) e [Helm](https://helm.sh/).

### Passos para execução:

1. Primeiro crie um cluster usando o comando:

   ```bash
   kind create cluster

2.  É preciso criar o namespace do projeto com o comando:

    ```bash
    kubectl create namespace api-todolist      

3.  Com o namespace criado já podemos criar o nosso chart do Helm:

    ```bash
    helm install todolist-release --namespace api-todolist ./chart-todolist       

4.  Agora podemos fazer um port-foward da nossa aplicação com o seguinte comando

    ```bash
	  kubectl port-forward --namespace api-todolist svc/todolist-release-chart-todolist-service 8080:80  

### Testes da aplicação:
   Podemos então acessar o link no navegador http://localhost:8080/apiTodoList.php para verificar o funcionamento da aplicação. Acessar o link apenas mostra as tarefas cadastradas no sistema.

  *  Como se trata de uma API, é recomendado usar uma aplicação como o Postman para realizar os testes.
  
  *  Para testar o cadastro, crie uma nova requisição do tipo POST para o endereço http://localhost:8080/apiTodoList.php. No corpo da requisição, selecione "raw" e, em seguida, altere para JSON. Insira a nova tarefa no campo disponível seguindo o formato {"task": "nome da tarefa"} e pressione o botão "SEND" para realizar o cadastro.
  
  *  Para a consulta das tarefas cadastradas, crie uma nova requisição do tipo GET para o caminho http://localhost:8080/apiTodoList.php e pressione o botão "SEND" para visualizar o retorno da API.
  
  *  Para testar a exclusão, crie uma nova requisição e selecione o tipo DELETE. Na barra de endereço, insira http://localhost:8080/apiTodoList.php?id=2. É possível alterar o ID de acordo com a tarefa que deseja excluir. Pressione o botão "SEND" para realizar a exclusão.
