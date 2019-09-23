<?php  
// Esta função cria uma consulta de busca a partir das palavras-chave da busca e configuração de classificação
function build_query ( $user_search, $sort ) {
    $search_query = "SELECT * FROM riskyjobs";

    // Extrair as palavras-chave da busca em um vetor
    $clean_search = str_replace ( ',', ' ', $user_search );
    $search_words = explode ( ' ', $clean_search );
    $final_search_words = array ( );
    if ( count ( $search_words ) > 0 ) {
        foreach ( $search_words as $word ) {
            if ( !empty ( $word ) ) {
                $final_search_words[] = $word;
            }
        }
    }

    // Gera uma cláusula WHERE utilizando todas as plavras-chave da busca
    $where_list = array ( );
    if ( count ( $final_search_words ) > 0 ) {
        foreach ( $final_search_words as $word ) {
            $where_list[] = "description LIKE '%$word%'";
        }
    }
    $where_clause = implode ( ' OR ', $where_list );

    // Adiciona a palavra-chave da cláusula WHERE à consulta de busca
    if ( !empty ( $where_clause ) ) {
        $search_query .= " WHERE $where_clause";
    }

    // Classifica a consulta de busca utilizando a configuração de classificação
    switch ( $sort ) {
        // Ascendente por título de trabalho
        case 1:
            $search_query .= " ORDER BY title";
            break;
        // Decrescente por título de trabalho
        case 2:
            $search_query .= " ORDER BY title DESC";
            break;
        // Ascendente por estado
        case 3:
            $search_query .= " ORDER BY state";
            break;
        // Decrescente por estado
        case 4:
            $search_query .= " ORDER BY state DESC";
            break;
        // Ascendente pela data postada (mais velho primeiro)
        case 5:
            $search_query .= " ORDER BY date_posted";
            break;
        // Decrescente pela data postada (mais novo primeiro)
        case 6:
            $search_query .= " ORDER BY date_posted DESC";
            break;
        default:
      // Nenhuma configuração de classificação fornecida, portanto, não classificar a consulta
    }

    return $search_query;
}

// Esta função cria links de tópicos baseados na específica configuração da classificação
function generate_sort_links ( $user_search, $sort ) {
    $sort_links = '';
    $page = $_SERVER['PHP_SELF'];

    switch ( $sort ) {
        case 1:
            $sort_links .= "<td><a href = '$page?usersearch=$user_search&sort=2'>Título do Trabalho</a></td>
                            <td>Descrição</td>
                            <td><a href = '$page?usersearch=$user_search&sort=3'>Estado</a></td>
                            <td><a href = '$page?usersearch=$user_search&sort=5'>Data Postada</a></td>";
                break;
        case 3:
            $sort_links .= "<td><a href = '$page?usersearch=$user_search&sort=1'>Título do Trabalho</a></td>
                            <td>Descrição</td>
                            <td><a href = '$page?usersearch=$user_search&sort=4'>Estado</a></td>
                            <td><a href = '$page?usersearch=$user_search&sort=3'>Data Postada</a></td>";
                break;
        case 5:
            $sort_links .= "<td><a href = '$page?usersearch=$user_search&sort=1'>Título do Trabalho</a></td>
                        <td>Descrição</td>
                        <td><a href = '$page?usersearch=$user_search&sort=3'>Estado</a></td>
                        <td><a href = '$page?usersearch=$user_search&sort=6'>Data Postada</a></td>";
                break;
        default:
            $sort_links .= "<td><a href = '$page?usersearch=$user_search&sort=1'>Título do Trabalho</a></td>
                            <td>Descrição</td>
                            <td><a href = '$page?usersearch=$user_search&sort=3'>Estado</a></td>
                            <td><a href = '$page?usersearch=$user_search&sort=5'>Data Postada</a></td>";
    }

    return $sort_links;
}

// Esta função cria links de navegação de página baseado na página atual e o número de páginas
function generate_page_links ( $user_search, $sort, $cur_page, $num_pages ) {
    $page_links = '';
    $page = $_SERVER['PHP_SELF'];

    // Se esta página não é a primeira página, gera o link da página "anterior"
    if ( $cur_page > 1 ) {
        $page_links .= "<a href='$page?usersearch=$user_search&sort=$sort&page={( $cur_page - 1 )}'><-</a> ";
    } else {
        $page_links .= '<- ';
    }

    // Percorre as páginas gerando os links do número de páginas
    for ( $i = 1; $i <= $num_pages; $i++ ) {
        if ( $cur_page == $i ) {
            $page_links .= ' ' . $i;
        } else {
            $page_links .= " <a href='$page?usersearch=$user_search&sort=$sort&page=$i'> $i</a>";
        }
    }

    // Se esta página não é a última página, gera o link da "próxima" página
    if ( $cur_page < $num_pages ) {
        $page_links .= " <a href='$page?usersearch=$user_search&sort=$sort&page={( $cur_page + 1 )}'>-></a>";
    } else {
        $page_links .= ' ->';
    }

    return $page_links;
}
