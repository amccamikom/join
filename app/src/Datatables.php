<?php
namespace App;

/**
*
*/
class Datatables
{

    static function get($db, $request)
    {
        $table = 'member';

        $draw = $request["draw"];//counter used by DataTables to ensure that the Ajax returns from server-side processing requests are drawn in sequence by DataTables
        $orderByColumnIndex  = $request['order'][0]['column'];// index of the sorting column (0 index based - i.e. 0 is the first record)
        $orderBy = $request['columns'][$orderByColumnIndex]['data'];//Get name of the sorting column from its index
        $orderType = $request['order'][0]['dir']; // ASC or DESC
        $start  = $request["start"];//Paging first record indicator.
        $length = $request['length'];//Number of records that the table can display in the current draw
        /* END of POST variables */
        $recordsTotal = $db->count($table);
        /* SEARCH CASE : Filtered data */
        if(!empty($request['search']['value'])){
            /* WHERE Clause for searching */
            for($i=0 ; $i<count($request['columns']);$i++){
                $column = $request['columns'][$i]['data'];//we get the name of each column using its index from POST request
                $where[]="$column like '%".$request['search']['value']."%'";
            }
            $where = "WHERE ".implode(" OR " , $where);// id like '%searchValue%' or name like '%searchValue%' ....
            /* End WHERE */
            $sql = sprintf("SELECT * FROM %s %s", $table , $where);//Search query without limit clause (No pagination)
            $recordsFiltered = count($db->query($sql)->fetchAll());//Count of search result
            /* SQL Query for search with limit and orderBy clauses*/
            $sql = sprintf("SELECT * FROM %s %s ORDER BY %s %s limit %d , %d ", $table , $where ,$orderBy, $orderType ,$start,$length  );
            $data = $db->query($sql)->fetchAll();
        }
        /* END SEARCH */
        else {
            $sql = sprintf("SELECT * FROM %s ORDER BY %s %s limit %d , %d ", $table ,$orderBy,$orderType ,$start , $length);
            $data = $db->query($sql)->fetchAll();
            $recordsFiltered = $recordsTotal;
        }
        /* Response to client before JSON encoding */
        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data
        );

        return $response;
    }
}
