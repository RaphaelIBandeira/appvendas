<?php
    require_once '../includes/header.php';
    require_once '../php_action/db_connect.php';
    require_once '../includes/mesagem.php';
?>


<div class="row">
    <div class="col s12 m6 push-m3">
        <div class="col s4">
        <h3 class="light"> Entidades </h3>
        </div>

        <table class="stripe" >
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Apelido:</th>
                    <th>WhatsApp:</th>
                    <th>Instagram:</th>
                    <th>UF:</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT 
                            c.sigla, 
                            a.*  
                        FROM 
                            entidades a 
                        left join 
                            entidadesendereco b on a.id = b.identidade 
                        left join estados c on b.idestado = c.codigo";
                        
                $resultado = mysqli_query($connect, $sql);
                

                if(mysqli_num_rows($resultado) > 0){

                while($dados = mysqli_fetch_array($resultado)){
                ?>
                <tr>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php echo $dados['apelido']; ?></td>
                    <td><?php echo $dados['whatsapp']; ?></td>
                    <td><?php echo $dados['instagram']; ?></td>
                    <td><?php echo $dados['sigla']; ?></td>

                    <td><a href="editarEntidades.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

                    <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

                    <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['id']; ?>" class="modal">
                            <div class="modal-content">
                            <h4>ALERTA!</h4>
                            <p>Você tem certeza que deseja excluir esse registro?</p>
                            </div>
                            <div class="modal-footer">

                            <form action="../php_action/delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                <button type="submit" name="btn-deletar-cliente" class="btn red">Sim, quero deletar</button>
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                            </form>
                            </div>
                        </div>

                </tr>
                <?php 
                    }
                }else { ?>
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
        <br>
        <a href="adicionarEntidades.php" class="btn">Adicionar Entidades</a>
    </div>
</div>

<?php    
    require_once '../includes/footer.php';
 ?>       


        