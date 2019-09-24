<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Risky Jobs - Busca</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <img src="image/riskyjobs_title.gif" alt="Risky Jobs" />
        <img src="image/riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />
        <h3>Risky Jobs - Resultados da Busca</h3>

        <?php
          
            include_once 'function/lib_function.php';

            // Obtém a configuração de classificação e as palavras-chave da busca através do URL utilizando GET
            $sort = $_GET['sort'] ?? '';
            $user_search = $_GET['usersearch'] ?? '';

            // Calcula a informação de paginação
            $cur_page = isset ( $_GET['page'] ) ? $_GET['page'] : 1;
            $results_per_page = 5;  // número de resultados por página
            $skip = ( ( $cur_page - 1 ) * $results_per_page );

            // Inicia gerando a tabela de resultados
            echo '<table border="0" cellpadding="2">';

            // Gera os tópicos do resultado da busca
            echo "<tr class='heading'>" .
                    generate_sort_links ( $user_search, $sort ) .
                '</tr>';

            // Conecta-se ao banco de dados
            require_once 'config/connectvars.php';
            $dbc = new SQL ( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

            // Consulta para obter o total de resultados
            $query = build_query ( $user_search, $sort );
            $result = $dbc -> select ( $query );
            $total = $result -> num_rows;
            $num_pages = ceil ( $total / $results_per_page );

            // Consulta novamente para obter apenas o subconjunto de resultados
            $query =  $query . " LIMIT $skip, $results_per_page";
            $result = $dbc -> select ( $query );
            while ( $row = $result -> fetch_assoc ( ) ) {
                echo "<tr class='results'>
                        <td valign='top' width='20%'>{$row['title']}</td>
                        <td valign='top' width='50%'>" . substr ( $row['description'], 0, 100 ) . "...</td>
                        <td valign='top' width='10%'>{$row['state']}</td>
                        <td valign='top' width='20%'>" . substr ( $row['date_posted'], 0, 10 ) . '</td>
                    </tr>';
            }
            echo '</table>';

            // Gera os links de navegação de página se tivermos mais do que uma página
            if ( $num_pages > 1 ) {
                echo generate_page_links ( $user_search, $sort, $cur_page, $num_pages );
            }

        ?>

    </body>
</html>