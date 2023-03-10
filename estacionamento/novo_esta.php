<style>
      /* Works for Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

     
</style>
<h1>Novo Estacionamento</h1>
<form action="?page=salvar_esta" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="row mb-3">
        <div class="col-3">
                <label for="numero">Apartamento</label>
                <select class="form-select" name="numero">
                    <!-- passa os dados pro select/ -->
                    <?php 
                        $query ="SELECT * FROM apartamentos";
                        $res = $conn->query($query);
                        if($res->num_rows> 0)
                        {
                            while($optionData=$res->fetch_assoc()){
                            $option =$optionData['numero'];
                    ?>
                    <?php
                    //selected option
                    if(!empty($courseName) && $courseName== $option){
                    // selected option
                    ?>
                    <option value="<?php echo $option; ?>" selected><?php echo $option; 
                    ?> </option>
                    <?php 
                    continue;
                    }?>
                        <option value="<?php echo $option; ?>" ><?php echo $option; ?> </option>
                    <?php
                        }}
                    ?>

                    
                </select>
            
        </div>

        <div class="col-5">
            <label for="vaga">Número da Vaga</label>
            <input type="number" name="vaga" class="form-control">
        </div>

        <div class="col-4">
            <label for="vaga">Placa</label>
            <input type="text" name="placa" class="form-control">
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-6">
            <label for="veiculo">Veículo</label>
            <select class="form-select" name="veiculo">
                        <option value="Carro">Carro</option>    
                        <option value="Moto">Moto</option>  
            </select>
            
        </div>

        <div class="col-6">
            <label for="marca">Marca</label>
            <select class="form-select" name="marca">
                        <option value="Chevrolet">Chevrolet</option>    
                        <option value="Fiat">Fiat</option>
                        <option value="Volkswagen">Volkswagen</option>
                        <option value="Hyundai">Hyundai</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Outra">Outra</option>
            </select>
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-6">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" class="form-control">
        </div>
        <div class="col-6">
            <label for="cor">Cor</label>
            <input type="text" name="cor" class="form-control">
        </div>
    </div>

    
    <div class="row mb-3">
        <div class="col-12">
            
            <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar</button>
        </div>
    </div>

    
    
    
    

</form>