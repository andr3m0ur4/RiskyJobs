<?php

    $errors = false;
    $error_validate = [];

    $jobber = new Jobber ( );

    if ( isset ( $_POST['submit'] ) ) {

        $jobber -> setFirstName ( $con -> escape_string ( trim ( $_POST['firstname'] ) ) );
        $jobber -> setLastName ( $con -> escape_string ( trim ( $_POST['lastname'] ) ) );
        $jobber -> setEmail ( $con -> escape_string ( trim ( $_POST['email'] ) ) );
        $jobber -> setPhone ( $con -> escape_string ( trim ( $_POST['phone'] ) ) );
        $jobber -> setJob ( $con -> escape_string ( trim ( $_POST['job'] ) ) );
        $jobber -> setResume ( $con -> escape_string ( trim ( $_POST['resume'] ) ) );

        $output_form = 'no';

        if ( empty ( $jobber -> getFirstName ( ) ) ) {
            // $first_name está em branco
            $errors = true;
            $error_validate['first_name'] = 'Você esqueceu de digitar seu nome.';
            $output_form = 'yes';
        }

        if ( empty ( $jobber -> getLastName ( ) ) ) {
            // $last_name está em branco
            $error_validate['last_name'] = 'Você esqueceu de digitar seu sobrenome.';
            $output_form = 'yes';
        }

        if ( !preg_match ( '/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', $jobber -> getEmail ( ) ) ) {
            // $email é inválido
            $error_validate['email'] = 'Seu endereço de email é inválido.';
            $output_form = 'yes';
        } else {
            // Remove tudo, exceto o domínio do email
            $domain = preg_replace ( '/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', '', $jobber -> getEmail ( ) );
            // Agora verifica se $domain está registrado
            if ( !checkdnsrr ( $domain ) ) {
                $error_validate['email'] = 'Seu endereço de email é inválido.';
                $output_form = 'yes';
            }
        }

        if ( !preg_match ( '/^\(?[1-9]\d{1}\)?[-\s]\d{5}-\d{4}$/', $jobber -> getPhone ( ) ) ) {
            // $phone não é válido
            $error_validate['phone'] = 'Seu número de telefone é inválido.';
            $output_form = 'yes';
        }

        if ( empty ( $jobber -> getJob ( ) ) ) {
            // $job está em branco
            $error_validate['job'] = 'Você esqueceu de digitar seu trabalho desejado.';
            $output_form = 'yes';
        }

        if ( empty ( $jobber -> getResume ( ) ) ) {
            // $resume está em branco
            $error_validate['resume'] = 'Você esqueceu de digitar seu currículo.';
            $output_form = 'yes';
        }

    } else {

        $jobber -> setFirstName ( '' );
        $jobber -> setLastName ( '' );
        $jobber -> setEmail ( '' );
        $jobber -> setPhone ( '' );
        $jobber -> setJob ( '' );
        $jobber -> setResume ( '' );

        $output_form = 'yes';
    }

    $pattern = '/[\(\)\-\s]/';
    $replacement = '';
    $new_phone = preg_replace ( $pattern, $replacement, $jobber -> getPhone ( ) );

    require __DIR__ . '/../views/template-registration.php';
 
    // code to insert data into the RiskyJobs database...
    