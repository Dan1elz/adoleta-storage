<main>
      <div class="fundo">
        <div class="grid">
          <div class="card__usuario">
            <span class="usuario__span"><i class="bi bi-person icon"></i></span>
            <div>
              <p class="usuario__nome"><?php echo $dados->nome. " ". $dados->sobrenome;?></p>
              <p class="usuario__email"><?php echo $dados->email;?></p>
            </div>
            <p class="usuario__compras">Você já fez: 15 compras!</p>
          </div>
          
          <div class="dados">
            <p class="dados__title">Dados da conta</p>
            <div class="card__dados">
    
              <a data-modal-elemento ><div class="item">
                <p class="item__title">Nome</p>
                <p class="item__dado"><?php echo $dados->nome;?></p>
                <i class="bi bi-pencil arrow"></i>
              </div></a>
              <a data-modal-elemento2 ><div class="item">
                <p class="item__title">Sobrenome</p>
                <p class="item__dado"><?php echo $dados->sobrenome;?></p>
                <i class="bi bi-pencil arrow"></i>
              </div></a>
             <div class="item">
                <p class="item__title">Email</p>
                <p class="item__dado"><?php echo $dados->email;?></p>
                <i class="bi bi-x-lg arrow"></i>
              </div>
              <div class="item">
                <p class="item__title">CPF</p>
                <p class="item__dado"><?php echo $dados->cpf;?></p>
                <i class="bi bi-x-lg arrow"></i>
              </div>
              <a data-modal-elemento3 ><div class="item">
                <p class="item__title">Data de Nasc</p>
                <p class="item__dado"><?php echo $dados->data;?></p>
                <i class="bi bi-pencil arrow"></i>
              </div></a>
              <a data-modal-elemento4 ><div class="item">
                <p class="item__title">Telefone</p>
                <p class="item__dado"><?php echo $dados->telefone;?></p>
                <i class="bi bi-pencil arrow"></i>
              </div></a>
              <a data-modal-elemento5 ><div class="item">
                <p class="item__title">Genero</p>
                <p class="item__dado"><?php echo $dados->genero;?></p>
                <i class="bi bi-pencil arrow"></i>
              </div></a>
            </div>
          </div>

          <div class="endereco">
            <p class="endereco__title">Endereço</p>
            <div class="card__endereco">  

              <a data-modal-elemento6 ><div data-1 class="item">
                <p class="item__title">CEP</p>
                <p class="item__dado"><?php echo $dados->cep;?></p>
                <i class="bi bi-pencil arrow"></i>
              </div></a>
              <a data-modal-elemento7 ><div class="item">
                <p class="item__title">Rua</p>
                <p class="item__dado"><?php echo $dados->rua;?></p>
                <i class="bi bi-pencil arrow"></i>
              </div></a>
              <a data-modal-elemento8 ><div class="item">
                <p class="item__title">Numero</p>
                <p class="item__dado"><?php echo $dados->numero;?></p>
                <i class="bi bi-pencil arrow"></i>
              </div></a>
              <a data-modal-elemento9 ><div class="item">
                <p class="item__title">Complemento</p>
                <p class="item__dado"><?php echo $dados->complemento;?></p>
                <i class="bi bi-pencil arrow"></i>
              </div></a>
              <a data-modal-elemento10 ><div class="item">
                <p class="item__title">Bairro</p>
                <p class="item__dado"><?php echo $dados->bairro;?></p>
                <i class="bi bi-pencil arrow"></i>
              </div></a>
              <a data-modal-elemento11 ><div class="item">
                <p class="item__title">Estado</p>
                <p class="item__dado"><?php echo $dados->estado;?></p>
                <i class="bi bi-pencil arrow"></i>
              </div></a>
              <a data-modal-elemento12 ><div class="item">
                <p class="item__title">Cidade</p>
                <p class="item__dado"><?php echo $dados->cidade;?></p>
                <i class="bi bi-pencil arrow"></i>
              </div></a>
              
            </div>
          </div>
        </div>
      </div>

      <dialog data-modal >
        <form name="form-nome" method="post">
          <div class="modal__header">
            <p>Modificar Nome</p>
            <button btn-close class="btn__close"><i class="bi bi-x"></i></button>
          </div>
          <div class="modal__content">
            <input data-nome class="form-control" type="text" placeholder="Digite seu Nome" maxlength="20" autocomplete="off" required>
          </div>
          <div class="modal__footer">
            <button btn-close class="btn cancelar">Cancelar</button>
            <button class="btn enviar" type="submit" name="submit">Enviar</button>
          </div>
        </form>
      </dialog>

      <dialog data-modal2 >
        <form name="form-sobrenome" method="post">
          <div class="modal__header">
            <p>Modificar Sobrenome</p>
            <button btn-close2 class="btn__close"><i class="bi bi-x"></i></button>
          </div>
          <div class="modal__content">
            <input data-sobrenome class="form-control" type="text" placeholder="Digite seu Sobrenome" maxlength="20" autocomplete="off" required>
          </div>
          <div class="modal__footer">
            <button btn-close2 class="btn cancelar">Cancelar</button>
            <button class="btn enviar" type="submit" name="submit">Enviar</button>
          </div>
        </form>
      </dialog>

      <dialog data-modal3 >
        <form name="form-data" method="post">
          <div class="modal__header">
            <p>Modificar Data de Nascimento</p>
            <button btn-close3 class="btn__close"><i class="bi bi-x"></i></button>
          </div>
          <div class="modal__content">
            <input data-data class="form-control" type="date" required>
          </div>
          <div class="modal__footer">
            <button btn-close3 class="btn cancelar">Cancelar</button>
            <button class="btn enviar" type="submit" name="submit">Enviar</button>
          </div>
        </form>
      </dialog>

      <dialog data-modal4 >
        <form name="form-telefone" method="post">
          <div class="modal__header">
            <p>Modificar Telefone</p>
            <button btn-close4 class="btn__close"><i class="bi bi-x"></i></button>
          </div>
          <div class="modal__content">
            <input data-telefone class="form-control" type="text" placeholder="Digite seu Telefone" minlength="14" maxlength="14" autocomplete="off" required>
          </div>
          <div class="modal__footer">
            <button btn-close4 class="btn cancelar">Cancelar</button>
            <button class="btn enviar" type="submit" name="submit">Enviar</button>
          </div>
        </form>
      </dialog>

      <dialog data-modal5 >
        <form name="form-genero" method="post">
          <div class="modal__header">
            <p>Modificar Genero</p>
            <button btn-close5 class="btn__close"><i class="bi bi-x"></i></button>
          </div>
          <div class="modal__content">
            <select data-input data-estado  class="form-control" name="estado" required>
              <option value="" selected disabled >Informe seu Genero</option>
              <option value="M">Masculino</option>
              <option value="F">Feminino</option>
              <option value="O">Outro</option>
            </select>
          </div>
          <div class="modal__footer">
            <button btn-close5 class="btn cancelar">Cancelar</button>
            <button class="btn enviar" type="submit" name="submit">Enviar</button>
          </div>
        </form>
      </dialog>

      <dialog data-modal6 >
        <form name="form-cep" method="post">
          <div class="modal__header">
            <p>Modificar CEP</p>
            <button btn-close6 class="btn__close"><i class="bi bi-x"></i></button>
          </div>
          <div class="modal__content">
            <input data-input data-cep class="form-control" type="text" placeholder="Seu CEP" minlength="9" maxlength="9" autocomplete="off" name="cep" required>
          </div>
          <div class="modal__footer">
            <button btn-close6 class="btn cancelar">Cancelar</button>
            <button class="btn enviar" type="submit" name="submit">Enviar</button>
          </div>
        </form>
      </dialog>

      <dialog data-modal7 >
        <form name="form-rua" method="post">
          <div class="modal__header">
            <p>Modificar Rua</p>
            <button btn-close7 class="btn__close"><i class="bi bi-x"></i></button>
          </div>
          <div class="modal__content">
            <input data-input data-rua class="form-control" type="text" placeholder="Nome da Rua" maxlength="50" name="rua" required>
          </div>
          <div class="modal__footer">
            <button btn-close7 class="btn cancelar">Cancelar</button>
            <button class="btn enviar" type="submit" name="submit">Enviar</button>
          </div>
        </form>
      </dialog>

      <dialog data-modal8 >
        <form name="form-numero" method="post">
          <div class="modal__header">
            <p>Modificar Numero</p>
            <button btn-close8 class="btn__close"><i class="bi bi-x"></i></button>
          </div>
          <div class="modal__content">
            <input data-numero class="form-control" type="text" placeholder="Informe o N°"  maxlength="5" name="numero" required>
          </div>
          <div class="modal__footer">
            <button btn-close8 class="btn cancelar">Cancelar</button>
            <button class="btn enviar" type="submit" name="submit">Enviar</button>
          </div>
        </form>
      </dialog>

      <dialog data-modal9 >
        <form name="form-complemento" method="post">
          <div class="modal__header">
            <p>Modificar Complemento</p>
            <button btn-close9 class="btn__close"><i class="bi bi-x"></i></button>
          </div>
          <div class="modal__content">
            <input data-complemento class="form-control invalid" type="text" placeholder="Informe o Complemento (Opcional)" name="complemento" maxlength="100">
          </div>
          <div class="modal__footer">
            <button btn-close9 class="btn cancelar">Cancelar</button>
            <button class="btn enviar" type="submit" name="submit">Enviar</button>
          </div>
        </form>
      </dialog>

      <dialog data-modal10 >
        <form name="form-bairro" method="post">
          <div class="modal__header">
            <p>Modificar Bairro</p>
            <button btn-close10 class="btn__close"><i class="bi bi-x"></i></button>
          </div>
          <div class="modal__content">
            <input data-input data-bairro class="form-control" type="text" placeholder="Informe o Bairro" maxlength="50" name="bairro" required>
          </div>
          <div class="modal__footer">
            <button btn-close10 class="btn cancelar">Cancelar</button>
            <button class="btn enviar" type="submit" name="submit">Enviar</button>
          </div>
        </form>
      </dialog>

      <dialog data-modal11 >
        <form name="form-estado" method="post">
          <div class="modal__header">
            <p>Modificar Estado</p>
            <button btn-close11 class="btn__close"><i class="bi bi-x"></i></button>
          </div>
          <div class="modal__content">
            <select data-input data-estado class="form-control" name="estado" required>
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
          <div class="modal__footer">
            <button btn-close11 class="btn cancelar">Cancelar</button>
            <button class="btn enviar" type="submit" name="submit">Enviar</button>
          </div>
        </form>
      </dialog>

      <dialog data-modal12 >
        <form name="form-cidade" method="post">
          <div class="modal__header">
            <p>Modificar Cidade</p>
            <button btn-close12 class="btn__close"><i class="bi bi-x"></i></button>
          </div>
          <div class="modal__content">
            <input data-input data-cidade class="form-control" type="text" placeholder="Informe a Cidade" maxlength="50" name="cidade" required>
          </div>
          <div class="modal__footer">
            <button btn-close12 class="btn cancelar">Cancelar</button>
            <button class="btn enviar" type="submit" name="submit">Enviar</button>
          </div>
        </form>
      </dialog>

    </main>