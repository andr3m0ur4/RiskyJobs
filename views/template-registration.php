<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Risky Jobs - Cadastro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Aplicação WEB com o propósito de realizar uma busca no dados no banco">
        <meta name="keywords" content="php mysql trabalho perigoso">
        <meta name="autor" content="André Moura">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" type="text/css" href="assets/style.css" />
    </head>
    <body>
        <a href="/riskyjobs"><img src="image/riskyjobs_title.gif" alt="Risky Jobs" /></a>
        <a href="/riskyjobs?rota=registration">
            <img src="image/riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />
        </a>
        <h3>Risky Jobs - Cadastro</h3>

        <?php if ( $output_form == 'yes' ) : ?>

            <?php if ( count ( $error_validate ) > 0 ) : ?>
                <?php foreach ( $error_validate as $error ) : ?>
                    <p class="error"><?= $error ?></p>
                <?php endforeach; ?>
            <?php endif; ?>

            <form method="post">
                <p>Cadastre-se com Risky Jobs, e publique seu currículo.</p>
                <table>
                    <tr>
                        <td><label for="firstname">Nome:</label></td>
                        <td>
                            <input id="firstname" name="firstname" type="text" value="<?= $jobber -> getFirstName ( ) ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="lastname">Sobrenome:</label></td>
                        <td>
                            <input id="lastname" name="lastname" type="text" value="<?= $jobber -> getLastName ( ) ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input id="email" name="email" type="email" value="<?= $jobber -> getEmail ( ) ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Telefone:</label></td>
                        <td>
                            <input id="phone" name="phone" type="tel" pattern="\([0-9]{2}\) [0-9]{4}-[0-9]{4}" value="<?= $jobber -> getPhone( ) ?>" required placeholder="(00) 0000-0000">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="job">Trabalho Desejado:</label></td>
                        <td><input id="job" name="job" type="text" value="<?= $jobber -> getJob ( ) ?>" required/></td>
                    </tr>
                </table>
                <p>
                    <label for="resume">Cole seu currículo aqui:</label><br />
                    <textarea id="resume" name="resume" rows="4" cols="40" required><?= $jobber -> getResume ( ) ?></textarea>
                    <br />
                    <button name="submit">Cadastrar</button>
                </p>
            </form>

        <?php elseif ( $output_form == 'no' ) : ?>
            <p>
                <?= $jobber -> getFirstName ( ) . ' ' . $jobber -> getLastName ( ) ?>, obrigado por se cadastrar em Risky Jobs!<br />
                Seu número de telefone foi registrado como <?= $new_phone ?>.
            </p>
        <?php endif; ?>

    </body>
</html>