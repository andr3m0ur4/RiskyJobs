<?php  

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
                            <td><a href = '$page?usersearch=$user_search&sort=5'>Data Postada</a></td>";
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
