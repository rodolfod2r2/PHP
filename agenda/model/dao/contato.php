<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo
 * Date: 15/01/2018
 * Time: 12:22
 */

namespace app\model\dao;

class Contato implements InterfaceContato {

    public function criarForm() {
        $provider = Provider::getProvider();
        $contato = new \app\model\vo\Contato();
        $elemento = @$_REQUEST['item'] === 'editar' ? 'editar' : 'salvar';
        if ($elemento === 'editar') :
            $elementoID = @$_REQUEST['id'];
            $exibir = $provider->prepare("SELECT * FROM contato WHERE id = '$elementoID'");
            $exibir->execute();
            $exibidor = $exibir->fetch(Provider::FETCH_ASSOC);
            $contato->setID($exibidor['id']);
            $contato->setNome($exibidor['nome']);
            $contato->setTelefone($exibidor['telefone']);
            $contato->setEmail($exibidor['email']);
            $inputIDForm = '<input type="hidden" name="id" value="' . $contato->getID() . '"/>';
            $inputNomeForm = '<input type="text" name="nome" class="form-control" value="' . $contato->getNome() . '"/>';
            $inputTelefoneForm = '<input type="text" name="telefone" class="form-control" value="' . $contato->getTelefone() . '"/>';
            $inputEmailForm = '<input type="text" name="email" class="form-control" value="' . $contato->getEmail() . '"/>';
        else:
            $inputIDForm = '';
            $inputNomeForm = '<input type="text" name="nome" class="form-control">';
            $inputTelefoneForm = '<input type="text" name="telefone" class="form-control">';
            $inputEmailForm = '<input type="text" name="email" class="form-control">';
        endif;
        $form  = '<input type="hidden" name="' . $elemento . '" value="' . $elemento . '">';
        $form .= $inputIDForm;
        $form .= '<div class="form-group">';
        $form .= '    <label for="nome">Nome:</label>';
        $form .= $inputNomeForm;
        $form .= '</div>';
        $form .= '<div class="form-group">';
        $form .= '    <label for="telefone">Telefone:</label>';
        $form .= $inputTelefoneForm;
        $form .= '</div>';
        $form .= '<div class="form-group">';
        $form .= '    <label for="email">Email:</label>';
        $form .= $inputEmailForm;
        $form .= '</div>';
        $form .= '<button type="submit" class="btn btn-default">Salvar</button>';
        print($form);
    }

    public function criarListagem() {
        $provider = Provider::getProvider();
        $contato = new \app\model\vo\Contato();
        $exibir = $provider->prepare("SELECT * FROM contato");
        $exibir->execute();
        while ($exibidor = $exibir->fetch(Provider::FETCH_ASSOC)) {
            $contato->setID($exibidor['id']);
            $contato->setNome($exibidor['nome']);
            $contato->setTelefone($exibidor['telefone']);
            $contato->setEmail($exibidor['email']);
            $elemento = '
                <div class="list-group-item">
                    <h4 class="list-group-item-heading">%s</h4>
                    <p class="list-group-item-text">Telefone: %s | Email: %s</p>
                    <p class="list-group-item-text"><a href="#"> detalhe </a> | <a href="form.php?item=editar&id=%s"> editar </a> | <a href="#"> excluir </a> </p>
                </div>
            ';
            printf($elemento, $contato->getNome(), $contato->getTelefone(), $contato->getEmail(), $contato->getID());
        };
    }

    public function salvar() {
        $provider = Provider::getProvider();
        $contato = new \app\model\vo\Contato();
        $contato->setNome($_POST['nome']);
        $contato->setTelefone($_POST['telefone']);
        $contato->setEmail($_POST['email']);
        $inserir = $provider->prepare(
            "INSERT INTO contato (
              nome,
              telefone,
              email
            ) VALUES (
              :fnome,
              :ftelefone,
              :femail
            )"
        );
        $inserir->bindValue(":fnome", $contato->getNome(), Provider::PARAM_STR);
        $inserir->bindValue(":ftelefone", $contato->getTelefone(), Provider::PARAM_STR);
        $inserir->bindValue(":femail", $contato->getEmail(), Provider::PARAM_STR);
        $inserir->execute();
    }

    public function atualizar($Id) {
        $provider = Provider::getProvider();
        $contato = new \app\model\vo\Contato();
        $contato->setID($Id);
        $contato->setNome($_POST['nome']);
        $contato->setTelefone($_POST['telefone']);
        $contato->setEmail($_POST['email']);
        $atualizar = $provider->prepare(
            "UPDATE contato SET 
              nome = :fnome,
              telefone = :ftelefone,
              email = :femail
            WHERE id = :fid"
        );
        $atualizar->bindValue(":fid", $contato->getID(), Provider::PARAM_STR);
        $atualizar->bindValue(":fnome", $contato->getNome(), Provider::PARAM_STR);
        $atualizar->bindValue(":ftelefone", $contato->getTelefone(), Provider::PARAM_STR);
        $atualizar->bindValue(":femail", $contato->getEmail(), Provider::PARAM_STR);
        $atualizar->execute();
    }

    public function remover($Id) {
        $provider = Provider::getProvider();
        $contato = new \app\model\vo\Contato();
        $contato->setID($Id);
        $remover = $provider->prepare("DELETE FROM contato WHERE id = :fid");
        $remover->bindValue(":fid", $contato->getID(), Provider::PARAM_INT);
        $remover->execute();
    }

    public function exibirDetalhe($Id) {
        $provider = Provider::getProvider();
        $contato = new \app\model\vo\Contato();
        $exibir = $provider->prepare("SELECT * FROM contato WHERE id = '$Id'");
        $exibir->execute();
        $exibidor = $exibir->fetch(Provider::FETCH_ASSOC);
        $contato->setID($exibidor['id']);
        $contato->setNome($exibidor['nome']);
        $contato->setTelefone($exibidor['telefone']);
        $contato->setEmail($exibidor['email']);
        $elemento = '<li> Nome: %s | Telefone: %s | Email: %s</li>';
        printf($elemento, $contato->getNome(), $contato->getTelefone(), $contato->getEmail());
    }
}