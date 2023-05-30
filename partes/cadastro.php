<div class="container">
        <div class="container__translate">
            <div class="container__1">
                <form data-user method="post">
                    <div class="container__formulario">
                        
                        <div class="form-user">
                            <P class="title">Cadastro</P>    
                            <div class="input__box">
                                <span class="detalhes">Nome</span>
                                <input data-nome class="form-control" type="text" placeholder="Digite seu Nome" maxlength="20" autocomplete="on" name="nome" required>
                            </div>
                            <div class="input__box">
                                <span class="detalhes">Sobrenome</span>
                                <input data-sobrenome class="form-control" type="text" placeholder="Digite seu Sobrenome" maxlength="20" autocomplete="on" name="sobrenome" required>
                            </div>
                            <div class="input__box">
                                <span class="detalhes">Email</span>
                                <input data-email class="form-control" type="email" placeholder="Digite seu Email" maxlength="100" name="email" required>
                            </div>
                            <div class="input__box cpf">
                                <span class="detalhes">CPF</span>
                                <input data-cpf class="form-control" type="text" placeholder="Digite seu CPF" minlength="14" maxlength="14" autocomplete="on" name="cpf" required>
                                <span data-invalid-cpf></span>
                            </div>
                            <div class="input__box">
                                <span class="detalhes">Data de Nascimento</span>
                                <input data-data class="form-control" type="date" name="data" required>
                            </div>
                            <div class="input__box">
                                <span class="detalhes">Telefone</span>
                                <input data-telefone class="form-control" type="text" placeholder="Digite seu Telefone" minlength="14" maxlength="14" autocomplete="on" name="telefone" required>
                            </div>
                            <div class="input__box">
                                <span class="detalhes">Senha</span>
                                <input data-senha class="form-control" type="password" placeholder="Digite sua Senha" minlength="8" maxlength="32" autocomplete="off" name="senha"  required>
                            </div>
                            <div class="input__box">
                                <span class="detalhes">Repetir Senha</span>
                                <input data-senha2 class="form-control" type="password" placeholder="Repita sua Senha" minlength="8" maxlength="32" autocomplete="off" name="senha2" required>
                            </div>
                            
                            <div class="Genero__Detalhes">
                                <input data-radio class="none" type="radio" name="genero1" id="opção-1">
                                <input data-radio class="none" type="radio" name="genero2" id="opção-2">
                                <input data-radio class="none" type="radio" name="genero3" id="opção-3">
                                <span class="Genero__Titulo">Genero</span>
                                <div class="categorias">
                                    <label for="opção-1">
                                        <span class="radio-genero um"></span>
                                        <span class="genero">Masculino</span>
                                    </label>

                                    <label for="opção-2">
                                        <span class="radio-genero dois"></span>
                                        <span class="genero">Feminino</span>
                                    </label>

                                    <label for="opção-3">
                                        <span class="radio-genero tres"></span>
                                        <span class="genero">Outro</span>
                                    </label>
                                </div>  
                            </div>

                            <div class="botoes">
                                <button class="btn" disabled="disabled">VOLTAR</button>
                                    <div class="navegação">
                                        <label class="navegação__label nav_on" for=""></label>
                                        <label class="navegação__label nav_of" for=""></label>
                                    </div>
                                <button data-btn class="btn ativado">PROXIMO</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container__translate">
            <div class="container__2">

                <form data-end method="post">
                    <div class="container__formulario2">
                        
                        <div class="form-end">
                            <div>
                                <P class="title endereco">Endereço</P>  
                                <span><i data-load class="bi bi-arrow-clockwise"></i></span>
                            </div>
                            <div class="input__box__end cep">
                                <span class="detalhes__end">CEP</span>
                                <input data-input data-cep class="form-control-end" type="text" placeholder="Seu CEP" minlength="9" maxlength="9" autocomplete="on" name="cep" required>
                                <span data-cepalert class="alert"></span>
                            </div>
                            <div class="input__box__end rua">
                                <span class="detalhes__end">Rua</span>
                                <input data-input data-rua class="form-control-end" type="text" placeholder="Nome da Rua" maxlength="50" name="rua" required>
                            </div>
                            <div class="input__box__end num">
                                <span class="detalhes__end">Numero</span>
                                <input data-numero class="form-control-end" type="text" placeholder="Informe o N°"  maxlength="5" name="numero" required>
                            </div>
                            <div class="input__box__end complemento">
                                <span class="detalhes__end">Complemento</span>
                                <input data-complemento class="form-control-end invalid" type="text" placeholder="Informe o Complemento (Opcional)" name="complemento" maxlength="100">
                            </div>
                            <div class="input__box__end bairro">
                                <span class="detalhes__end">Bairro</span>
                                <input data-input data-bairro class="form-control-end" type="text" placeholder="Informe o Bairro" maxlength="50" name="bairro" required>
                            </div>
                            <div class="input__box__end estado">
                                <span class="detalhes__end">Estado</span>
                                <select data-input data-estado class="form-control-end" name="estado" required>
                                    <option value="" selected disabled >Estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                            </div>
                            <div class="input__box__end cidade">
                                <span class="detalhes__end">Cidade</span>
                                <input data-input data-cidade class="form-control-end" type="text" placeholder="Informe a Cidade" maxlength="50" name="cidade" required>
                            </div>
                        
                            <div class="botoes">
                                <button data-btn class="btn ativado" >VOLTAR</button>
                                    <div class="navegação">
                                        <label class="navegação__label nav_of" for=""></label>
                                        <label class="navegação__label nav_on" for=""></label>
                                    </div>
                                <button data-submit class="btn ativado" type="submit" name="submit" >FINALIZAR</button>
                            </div>

                        </div>
                    </div>
                </form>


            </div>
        </div>

    </div>
    
