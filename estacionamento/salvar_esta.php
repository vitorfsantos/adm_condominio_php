<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    switch ($_REQUEST["acao"]) {
        
        case 'cadastrar':
            // var_dump($_POST);
            $nr_cadastrado = "SELECT * from apartamentos WHERE numero =".$_REQUEST["numero"];
            $res_nr = $conn->query($nr_cadastrado);
            $row = $res_nr->fetch_object();

            // var_dump($_REQUEST);

            $vaga_cadastrada = "SELECT * FROM estacionamento WHERE vaga =".$_REQUEST["vaga"];
            $res_nr_esta = $conn->query($vaga_cadastrada);
            $row_esta = $res_nr_esta->fetch_object();

            if($row_esta == NULL)
            {
                $apartamento_id = $row->id;
                $placa = $_POST["placa"];
                $vaga = $_POST["vaga"];
                $tipo_veiculo = $_POST["veiculo"];
                $marca = $_POST["marca"];
                $modelo = $_POST["modelo"];
                $cor = $_POST["cor"];


                $sql = "INSERT INTO estacionamento 
                        (apartamento_id, placa, vaga, tipo_veiculo, marca, modelo, cor) 
                        VALUES ('{$apartamento_id}', '{$placa}', '{$vaga}', '{$tipo_veiculo}', '{$marca}', '{$modelo}', '{$cor}')";
                
                $res = $conn->query($sql);

                if($res==true)
                {
                    print "<script>alert('Cadastrado com sucesso!'); </script>";
                    // print "<script>location.href='?page=listar_esta';</script>";
                } else {
                    print "<script>alert('Não foi possível cadastrar'); </script>";
                    print "<script>location.href='?page=listar_esta';</script>";
                }
            } else {
                print "<script>alert('Esse número de vaga já está ocupado.'); </script>";
                print "<script>location.href='?page=listar_esta';</script>";
                
            }
            
            break;
            
        case 'editar':
            $nr_cadastrado = "SELECT * from apartamentos WHERE numero =".$_REQUEST["numero"];
            $res_nr = $conn->query($nr_cadastrado);
            $row = $res_nr->fetch_object();

            var_dump($row);
            
            $apartamento_id = $row->id;
            $placa = $_POST["placa"];
            $vaga = $_POST["vaga"];
            $tipo_veiculo = $_POST["veiculo"];
            $marca = $_POST["marca"];
            $modelo = $_POST["modelo"];
            $cor = $_POST["cor"];

            $sql = "UPDATE estacionamento 
                    SET apartamento_id='{$apartamento_id}',
                    placa='{$placa}',
                    vaga='{$vaga}',
                    tipo_veiculo='{$tipo_veiculo}',
                    marca='{$marca}',
                    modelo='{$modelo}',
                    cor='{$cor}'
                    WHERE 
                        id=".$_REQUEST["id"];
            $res = $conn->query($sql);

            var_dump($res);

            if($res==true)
            {
                print "<script>alert('Atualizado com sucesso!'); </script>";
                print "<script>location.href='?page=listar_esta';</script>";
            } else {
                print "<script>alert('Não foi possível atualizar'); </script>";
                print "<script>location.href='?page=listar_esta';</script>";
            }

            break;

        case 'excluir':
            $sql = "DELETE FROM estacionamento WHERE id=" .$_REQUEST["id"];
            
            $res = $conn->query($sql);

            if($res==true)
            {
                print "<script>alert('Excluído com sucesso!'); </script>";
                print "<script>location.href='?page=listar_esta';</script>";
            } else {
                print "<script>alert('Não foi possível excluir'); </script>";
                print "<script>location.href='?page=listar_esta';</script>";
            }

            break;
        
        default:
            # code...
            break;
    }
?>
