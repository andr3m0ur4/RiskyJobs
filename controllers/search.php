<?php
          
    // Obtém a configuração de classificação e as palavras-chave da busca através do URL utilizando GET
    $sort = $_GET['sort'] ?? '';
    $user_search = $_GET['usersearch'] ?? '';

    // Calcula a informação de paginação
    $cur_page = $_GET['page'] ?? 1;
    $results_per_page = 5;  // número de resultados por página
    $skip = ( ( $cur_page - 1 ) * $results_per_page );

    // Consulta para obter o total de resultados
    $query = $dal -> build_query ( $user_search, $sort );

    $total = $dal -> getTotal ( $query );
    
    $num_pages = ceil ( $total / $results_per_page );

    // Consulta novamente para obter apenas o subconjunto de resultados
    $query .= " LIMIT $skip, $results_per_page";
    $jobs = $dal -> select ( $query );

    require __DIR__ . '/../views/template-search.php';
    