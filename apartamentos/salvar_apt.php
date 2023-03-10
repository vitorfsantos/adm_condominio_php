<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    switch ($_REQUEST["acao"]) {
        
        case 'cadastrar':

            $nr_cadastrado = "SELECT * from apartamentos WHERE numero =".$_REQUEST["numero"];
            $res_nr = $conn->query($nr_cadastrado);
            $row = $res_nr->fetch_object();

            if($row == NULL)
            {
                $numero = $_POST["numero"];
                $nome_morador = $_POST["nome_morador"];
                $telefone_morador = $_POST["telefone_morador"];
                $email_morador = $_POST["email_morador"];
                $obs = $_POST["obs"];


                $sql = "INSERT INTO apartamentos 
                        (numero, nome_morador, telefone_morador, email_morador, obs) 
                        VALUES ('{$numero}', '{$nome_morador}', '{$telefone_morador}', '{$email_morador}', '{$obs}')";
                
                $res = $conn->query($sql);

                if($res==true)
                {
                    print "<script>alert('Cadastrado com sucesso!'); </script>";
                    print "<script>location.href='?page=listar';</script>";
                } else {
                    print "<script>alert('Não foi possível cadastrar'); </script>";
                    print "<script>location.href='?page=listar';</script>";
                }
            } else {
                print "<script>alert('Esse número de apartamento já foi cadastrado.'); </script>";
                print "<script>location.href='?page=listar';</script>";
                
            }
            
            break;
            
        case 'editar':
            
            $numero = $_POST["numero"];
            $nome_morador = $_POST["nome_morador"];
            $telefone_morador = $_POST["telefone_morador"];
            $email_morador = $_POST["email_morador"];
            $obs = $_POST["obs"];

            $sql = "UPDATE apartamentos 
                    SET numero='{$numero}',
                        nome_morador='{$nome_morador}',
                        telefone_morador='{$telefone_morador}',
                        email_morador='{$email_morador}',
                        obs='{$obs}'
                    WHERE 
                        id=".$_REQUEST["id"];
            $res = $conn->query($sql);

            var_dump($res);

            if($res==true)
            {
                print "<script>alert('Atualizado com sucesso!'); </script>";
                print "<script>location.href='?page=listar';</script>";
            } else {
                print "<script>alert('Não foi possível atualizar'); </script>";
                print "<script>location.href='?page=listar';</script>";
            }

            break;

        case 'excluir':
            $sql = "DELETE FROM apartamentos WHERE id=" .$_REQUEST["id"];
            
            $res = $conn->query($sql);

            if($res==true)
            {
                print "<script>alert('Excluído com sucesso!'); </script>";
                print "<script>location.href='?page=listar';</script>";
            } else {
                print "<script>alert('Não foi possível excluir'); </script>";
                print "<script>location.href='?page=listar';</script>";
            }

            break;
        
        default:
            # code...
            break;
    }
?>
