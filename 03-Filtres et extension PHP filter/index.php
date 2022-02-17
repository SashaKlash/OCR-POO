<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listes des filtres en PHP</title>
</head>

<body>
    <h1>Filtres filter_list()</h1>
    <?php
    echo '<pre>';
    print_r(filter_list());
    echo '</pre>';

    echo '
          <table>
            <tr>
                <th>Nom du filtre</th>
                <th>Id numéroté</th>
            </tr>';
    $filtre_tb = filter_list();
    foreach ($filtre_tb as $clef => $nom) {
        echo '
            <tr>
                <td>' . $nom . '</td>
                <td>' . filter_id($nom) . '</td>
            </tr>
            <tr>';
    }

    echo '
    <table>
      <tr>
          <th>Nom du filtre</th>
          <th>Id numéroté</th>
      </tr>';

    $filtersTab = array_combine($filtre_tb, array_map('filter_id', $filtre_tb));
    echo '<pre>';
    var_dump($filtersTab);
    echo '</pre>';


    foreach ($filtersTab as $clef => $nom) {
        echo '
            <tr>
                <td>' . $clef . '</td>
                <td>' . filter_id($clef) . '</td>
            </tr>
            <tr>';
    }

    ?>
    <?php



    echo '<table>';
    echo '<tr>';
    echo '<th>Filter Name</th>';
    echo '<th>Filter Int ID</th>';
    echo '<th>Filter Const ID</th>';
    echo '</tr>';

    foreach (filter_list() as $id => $filter) {
        $const = 'FILTER_';
        switch ($filter) {
            case 'int':
            case 'boolean':
            case 'float':
                $const .= 'VALIDATE_' . $filter;
                break;

            case 'string':
            case 'stripped':
            case 'encoded':
            case 'special_chars':
            case 'full_special_chars':
            case 'unsafe_raw':
            case 'email':
            case 'url':
            case 'number_int':
            case 'number_float':
            case 'magic_quotes':
                $const .= 'SANITIZE_' . $filter;
                break;
        }

        if (substr($filter, 0, 8) == 'validate' || $filter == 'callback')
            $const .= $filter;

        echo '<tr><td>' . $filter . '</td><td align="center">' . filter_id($filter) . '</td><td>' . strtoupper($const) . '</td></tr>';
    }
    ?>
</body>

</html>