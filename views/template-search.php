<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Risky Jobs - Busca</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Aplicação WEB com o propósito de realizar uma busca no dados no banco" />
        <meta name="keywords" content="php mysql trabalho perigoso">
        <meta name="autor" content="André Moura">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" type="text/css" href="assets/style.css" />
    </head>
    <body>
        <a href="/"><img src="image/riskyjobs_title.gif" alt="Risky Jobs" /></a>
        <img src="image/riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />
        <h3>Risky Jobs - Resultados da Busca</h3>

        <!-- Inicia gerando a tabela de resultados -->
        <table cellpadding="2">
            <!-- Gera os tópicos do resultado da busca -->
            <tr class='heading'>
                <?= generate_sort_links ( $user_search, $sort ) ?>
            </tr>

            <?php foreach ( $jobs as $job ) : ?>
                <tr class='results'>
                    <td valign='top' width='20%'><?= $job -> getTitle ( ) ?></td>
                    <td valign='top' width='50%'>
                        <?= substr ( $job -> getDescription ( ), 0, 100 ) ?>...
                    </td>
                    <td valign='top' width='10%'><?= $job -> getState ( ) ?></td>
                    <td valign='top' width='20%'><?= substr ( $job -> getDatePosted ( ), 0, 10 ) ?></td>
                </tr>
            <?php endforeach ?>

        </table>

        <!-- Gera os links de navegação de página se tivermos mais do que uma página -->
        <?php if ( $num_pages > 1 ) : ?>
            <?= generate_page_links ( $user_search, $sort, $cur_page, $num_pages ) ?>
        <?php endif ?>

    </body>
</html>