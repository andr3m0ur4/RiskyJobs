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
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <img src="image/riskyjobs_title.gif" alt="Risky Jobs" />
        <img src="image/riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />
        <h3>Risky Jobs - Cadastro</h3>

        <?php
            if ( isset ( $_POST['submit'] ) ) {
                $first_name = $_POST['firstname'];
                $last_name = $_POST['lastname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $job = $_POST['job'];
                $resume = $_POST['resume'];
                $output_form = 'no';

                if ( empty ( $first_name ) ) {
                    // $first_name está em branco
                    echo '<p class="error">Você esqueceu de digitar seu nome.</p>';
                    $output_form = 'yes';
                }

                if ( empty ( $last_name ) ) {
                    // $last_name está em branco
                    echo '<p class="error">Você esqueceu de digitar seu sobrenome.</p>';
                    $output_form = 'yes';
                }

                if ( !preg_match ( '/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', $email ) ) {
                    // $email é inválido
                    echo '<p class="error">Seu endereço de email é inválido.</p>';
                    $output_form = 'yes';
                } else {
                    // Remove tudo, exceto o domínio do email
                    $domain = preg_replace ( '/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', '', $email );
                    // Agora verifica se $domain está registrado
                    if ( !checkdnsrr ( $domain ) ) {
                        echo '<p class="error">Seu endereço de email é inválido.</p>';
                        $output_form = 'yes';
                    }
                }

                if ( !preg_match ( '/^\(?[1-9]\d{1}\)?[-\s]\d{4}-\d{4}$/', $phone ) ) {
                    // $phone não é válido
                    echo '<p class="error">Seu número de telefone é inválido.</p>';
                    $output_form = 'yes';
                }

                if ( empty ( $job ) ) {
                    // $job está em branco
                    echo '<p class="error">Você esqueceu de digitar seu trabalho desejado.</p>';
                    $output_form = 'yes';
                }

                if ( empty ( $resume ) ) {
                    // $resume está em branco
                    echo '<p class="error">Você esqueceu de digitar seu currículo.</p>';
                    $output_form = 'yes';
                }
            } else {
                $first_name = '';
                $last_name = '';
                $email = '';
                $phone = '';
                $job = '';
                $resume = '';
                $output_form = 'yes';
            }

            if ( $output_form == 'yes' ) {
            ?>

            <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
                <p>Cadastre-se com Risky Jobs, e publique seu currículo.</p>
                <table>
                    <tr>
                        <td><label for="firstname">Nome:</label></td>
                        <td>
                            <input id="firstname" name="firstname" type="text" value="<?=$first_name?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="lastname">Sobrenome:</label></td>
                        <td>
                            <input id="lastname" name="lastname" type="text" value="<?=$last_name?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input id="email" name="email" type="email" value="<?=$email?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Telefone:</label></td>
                        <td>
                            <input id="phone" name="phone" type="tel" pattern="\([0-9]{2}\) [0-9]{4}-[0-9]{4}" 
                                value="<?=$phone?>" required placeholder="(00) 0000-0000">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="job">Trabalho Desejado:</label></td>
                        <td><input id="job" name="job" type="text" value="<?=$job?>" required/></td>
                    </tr>
                </table>
                <p>
                    <label for="resume">Cole seu currículo aqui:</label><br />
                    <textarea id="resume" name="resume" rows="4" cols="40" required><?=$resume?></textarea><br />
                    <button name="submit">Cadastrar</button>
                </p>
            </form>

            <?php
            } else if ( $output_form == 'no' ) {
                echo "<p>$first_name $last_name, obrigado por se cadastrar em Risky Jobs!<br />";
                $pattern = '/[\(\)\-\s]/';
                $replacement = '';
                $new_phone = preg_replace ( $pattern, $replacement, $phone );
                echo 'Seu número de telefone foi registrado como ' . $new_phone . '.</p>';

                // code to insert data into the RiskyJobs database...
            }
            ?>

    </body>
</html>