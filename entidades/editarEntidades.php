<?php
    require_once '../php_action/db_connect.php';
    require_once '../includes/header.php';


    if(isset($_GET['id'])){
        $id = mysqli_escape_string($connect, $_GET['id']); 
        $sql = "SELECT 
                    a.id, a.nome, a.apelido, a.email, a.idade, a.idtipo, b.tipo as tipoatual, a.instagram, a.whatsapp, c.logradouro, c.complemento, c.numero, c.cep, d.nome as nomeestado, a.idestado
                FROM 
                    entidades a 
                left join 
                    entidadestipos b on a.idtipo = b.id
                left join
                    entidadesendereco c on a.id = c.identidade 
                left join
                    estados d on c.idestado = d.codigo
                where a.id = '$id'";

        $sql2 = "SELECT id as idtipo2, tipo FROM entidadestipos";
        $resultado = mysqli_query($connect, $sql);
        
        $dados = mysqli_fetch_array($resultado);
        $resultado2 = mysqli_query($connect, $sql2);

        $sql3 = "SELECT id as idestado, codigo, nome, sigla FROM estados";
        $resultado3 = mysqli_query($connect, $sql3);

    }

?>
 

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editar Entidades </h3>
        <form action="../php_action/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

            <div class="input-field col s10 ">
                <input type="text" name="nome" id="nome" value= " <?php echo $dados['nome']; ?>">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s2">                
                <input type="text" name="idade" id="idade" value="<?php echo $dados['idade']; ?>">
                <label for="idade">Idade</label>
            </div>
            <div class="input-field col s4">                
                <input type="text" name="apelido" id="apelido" value="<?php echo $dados['apelido']; ?>">
                <label for="apelido">Apelido</label>
            </div>   
            <div class="input-field col s8">
                <input type="text" name="email" id="email" value="<?php echo $dados['email']; ?>">
                <label for="email">E-mail</label>
            </div>   
            <div class="input-field col s4">
                <input type="text" name="whatsapp" id="whatsapp" value="<?php echo $dados['whatsapp']; ?>">
                <label for="whatsapp">WhatsApp</label>
            </div>  
            <div class="input-field col s4">
                <input type="text" name="instagram" id="instagram" value="<?php echo $dados['instagram']; ?>">
                <label for="instagram">Instagram</label>
            </div>  
            <div class="input-field col s4">
                <select name="idtipo" id="idtipo">
                    <option value="<?php echo $dados['idtipo']; ?>"><?php echo $dados['tipoatual']; ?></option>
                    <?php 
                    while($tipo = mysqli_fetch_array($resultado2)) { ?>
                        <option value="<?php echo($tipo['idtipo2']); ?>"><?php echo($tipo['tipo']);?> </option>
                    <?php 
                    }
                    ?>
                </select> 
                <label>Selecione</label>
            </div>  
            <div class="input-field col s3">
                <input type="text" name="cep" id="cep" value="<?php echo $dados['cep']; ?>">
                <label for="cep">CEP</label>
            </div> 
            <div class="input-field col s9">
                <input type="text" name="logradouro" id="logradouro" value="<?php echo $dados['logradouro']; ?>">
                <label for="logradouro">Logradouro</label>
            </div> 
            <div class="input-field col s2">
                <input type="text" name="numero" id="numero" value="<?php echo $dados['numero']; ?>">
                <label for="numero">Numero</label>
            </div>   
            <div class="input-field col s5">
                <input type="text" name="complemento" id="complemento" value="<?php echo $dados['complemento']; ?>">
                <label for="complemento">Complemento</label>
            </div>
            <div class="input-field col s5">
                <select name="idestado" id="idestado">
                    <option value="<?php echo $dados['idestado']; ?>" selected><?php echo $dados['nomeestado']; ?></option>
                    <?php 
                    while($tipo2 = mysqli_fetch_array($resultado3)) { ?>
                        <option value="<?php echo($tipo2['codigo']); ?>"><?php echo($tipo2['nome']);?> </option>
                    <?php 
                    }
                    ?>
                </select> 
                <label>Selecione</label>
            </div>  

            <button type="submit" name="btn-editar-cliente" class="btn"> Atualizar </button>
            <a href="entidades.php" type="submit" class="btn blue"> Lista de Entidades </a>
        </form>

    </div>
</div>

<?php    
    require_once '../includes/footer.php';
 ?>       


        