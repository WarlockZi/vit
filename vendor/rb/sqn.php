<?php
use \R as R;

R::ext('sqn', function( $query, $aliases = null, $q = '`' ) {
    $map = [
        '|'  => 'INNER JOIN',
        '||' => 'INNER JOIN',
        '>'  => 'RIGHT JOIN',
        '>>' => 'RIGHT JOIN',
        '<'  => 'LEFT JOIN',
        '<<' => 'LEFT JOIN',
    ];
    $select = [];
    $from   = '';
    $joins  = [];
    $prev   = '';
    $ents   = preg_split( '/[^\w_]+/', $query );
    $tokens = preg_split( '/[\w_]+/', $query );
    array_pop($tokens);
    foreach( $ents as $i => $ent ) {
        $select[] = " {$q}{$ent}{$q}.* ";
        if (!$i) {
            $from = $ent;
            $prev = $ent;
            continue;
        }
        if ( $tokens[$i] == '<' || $tokens[$i] == '>' || $tokens[$i] == '|') {
            $join[] = " {$map[$tokens[$i]]} {$q}{$ent}{$q} ON {$q}{$ent}{$q}.{$prev}_id = {$q}{$prev}{$q}.id ";
        }
        if ( $tokens[$i] == '<<' || $tokens[$i] == '>>' || $tokens[$i] == '||') {
            $combi = [$prev, $ent];
            sort( $combi );
            $combi = implode( '_', $combi );
            $select[] = " {$q}{$combi}{$q}.* ";
            $join[] = " {$map[$tokens[$i]]} {$q}{$combi}{$q} ON {$q}{$combi}{$q}.{$prev}_id = {$q}{$prev}{$q}.id ";
            $join[] = " {$map[$tokens[$i]]} {$q}{$ent}{$q} ON {$q}{$combi}{$q}.{$ent}_id = {$q}{$ent}{$q}.id ";
        }
        $prev = $ent;
    }
    if (!is_null($aliases)) {
        $aliases = explode(';', $aliases);
        foreach($aliases as $alias) {
            list($table, $cols) = explode('/', $alias);
            $cols = explode(',', $cols);
            foreach($cols as $col) {
                $select[] = " {$q}{$table}{$q}.{$q}{$col}{$q} AS {$q}{$table}_{$col}{$q} ";
            }
        }
    }
    $selectSQL = implode( ",\n", $select );
    $joinSQL   = implode( "\n", $join );
    return "SELECT{$selectSQL}\n FROM {$q}{$from}{$q}\n{$joinSQL}";
});