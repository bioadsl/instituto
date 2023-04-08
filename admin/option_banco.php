

<?php
                    require "conexaoExcel.php";
                    #seleciona os dados da tabela produto
                    $query = mysqli_query($link, "SELECT id, nome FROM tab_bravos" );
                       // acentuação
                    mysqli_query($link,"SET NAMES 'utf8'");  
                    mysqli_query($link,'SET character_set_connection=utf8');
                    mysqli_query($link,'SET character_set_client=utf8');
                    mysqli_query($link,'SET character_set_results=utf8');
                    ?>


                       
                 
                        <div class="col-lg-2">
                            <div class="form-group">     
                                <label for="turma">Turma: </label>
                                <input type="text" class="form-control" id="turma" name="turma"
                                placeholder="Informe a turma" value="<?php echo '1-'.date('Y');?>" disabled>
                                <span class='msg-erro msg-turma'></span>
                            </div>
                        </div>
                  

                        <div class="col-lg-3">
                            <div class="form-group">     
                                <label for="id_produto">Matricula: </label>
                                <input type="text" class="form-control" id="matricula" name="matricula"
                                placeholder="Informe a matricula" value="<?php echo date('yhmi');?>" disabled>
                                <span class='msg-erro msg-matricula'></span>
                            </div>
                        </div>
                
                        <div class="col-lg-6">
                                <div class="form-group">     
                                <label for="nome">Nome: </label>
								<select class="form-control" name="nome" id="nome">
                                    <option>Selecione...</option>
                                        <?php while($reg = mysqli_fetch_array($query)) { ?>
                                            <option value="<?php echo $reg['id'] ?>"><?php echo $reg['nome'] ?></option>
                                        <?php } ?>
                                </select>
                                <span class='msg-erro msg-nome'></span>
                            </div>
                        </div>  