<?php 

include 'conexao.php';
include 'header.html';


function mostrarPost(){
    global $con; //Importante para acessar a conexão dentro da função.

    //Função para recuperar os posts feitos
    $sql = "SELECT nm_nome, nm_email, indentificacao, mensagem FROM tbl_post";

    $result = mysqli_query($con, $sql);

    if($result){
        //Verifica se há peloa menos um post
        if(mysqli_num_rows($result) > 0){
            echo"<h2>Comentários Sobre o projeto: </h2>";

            //Loop atraves dos resultados e exibir na tela
            while($row = mysqli_fetch_assoc($result)){
                echo "<p><strong>Nome:</strong>" . $row['nm_nome'] . "</p>";
                echo "<p><strong>Email:</strong>" . $row['nm_email'] . "</p>";
                echo "<p><strong>Indentificação:</strong>" . $row['indentificacao'] . "</p>";
                echo "<p><strong>Mensagem:</strong>" . $row['mensagem'] . "</p>";
                echo "<hr>";
            }
        }else {
            echo "Nenhum post encontrado.";
        }

        mysqli_free_result($result); //Liberar o resultado da consulta
    }else{
        echo "Erro na consulta: " . mysqli_error($con);
    }

}

mostrarPost();
mysqli_close($con); 



include 'footer.html';
?>