<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Datatables_library
{
    public function generate($datatables_request, $search_query, $row_count_query, $total_count_query)
    {
        /** ------------------------------------------------------- **
         **           CONSTRUCT PHASE
        /** ------------------------------------------------------- **/
        $codeigniterInstance =& get_instance();
        $database_query = $codeigniterInstance->load->database("master_query", true);

        /** ------------------------------------------------------- **
         **           PROCESS PHASE
        /** ------------------------------------------------------- **/
        // DRAW NUMBER
        $search_draw = $datatables_request["draw"];

        // SEARCH PHASE
        $sql = $search_query;
        $results = $database_query->query($sql)->result();

        // COUNT PHASE
        $sql = $row_count_query;
        $total_rows = $database_query->query($sql)->result();
        $sql = $total_count_query;
        $result_rows = $database_query->query($sql)->result();

        $output = array(
            "draw" => $search_draw,
            "recordsTotal" => $total_rows[0]->total,
            "recordsFiltered" => $result_rows[0]->total,
            "data" => $results,
        );
        echo json_encode($output);
    }

    public function buildSearchQuery($datatables_request, $table, $default_filter, $request_filter, $join, $default_group = null)
    {
        $select_statement = "";
        foreach($request_filter as $request_filter_key => $request_filter_value)
        {
            if($request_filter_value["type"] == "FULL_DATE")
            {
                if($select_statement != "")
                {
                    $select_statement = $select_statement.", DATE_FORMAT(".$request_filter_key.", '%d %M %Y') AS '".$request_filter_value["alias"]."'";
                }
                else
                {
                    $select_statement = $request_filter_key." AS '".$request_filter_value["alias"]."'";
                }
            }
            else
            {
                if($select_statement != "")
                {
                    $select_statement = $select_statement.", ".$request_filter_key." AS '".$request_filter_value["alias"]."'";
                }
                else
                {
                    $select_statement = $request_filter_key." AS '".$request_filter_value["alias"]."'";
                }
            }
        }
        $join_statement = "";
        foreach($join as $join_key => $join_value)
        {
            if($join_statement != "")
            {
                $join_statement = $join_statement." LEFT JOIN ".$join_key." ON ".$join_value;
            }
            else
            {
                $join_statement = "LEFT JOIN ".$join_key." ON ".$join_value;
            }
        }
        $search_filter = $default_filter;
        foreach($request_filter as $request_filter_key => $request_filter_value)
        {
            if($request_filter_value["value"] != "")
            {
                $field = $request_filter_key;
                $value = $request_filter_value["value"];
                $method = $request_filter_value["method"];
                if($method == "LIKE")
                {
                    $search_filter .= ($search_filter == "")?" ".$field." LIKE '%".$value."%'":" AND ".$field." LIKE '%".$value."%'";
                }
                else if($method == "EQUAL")
                {
                    $search_filter .= ($search_filter == "")?" ".$field." = '".$value."%":" AND ".$field." = '".$value."'";
                }
            }
        }
        if($search_filter != "")
        {
            $search_filter = " WHERE ".$search_filter;
        }
        $group = "";
        if($default_group != ""){
            $group = " GROUP BY ".$default_group;
        }
        $order = "";
        foreach($request_filter as $request_filter_key => $request_filter_value)
        {
            if($request_filter_value["alias"] == $datatables_request["columns"][$datatables_request["order"]["0"]["column"]]["data"])
            {
                $order = $request_filter_key." ".$datatables_request["order"]["0"]["dir"];
            }
        }
        $limit = $datatables_request["start"].", ".$datatables_request["length"];

        $search_query = "SELECT 
                            $select_statement
                        FROM $table 
                            $join_statement
                        $search_filter $group ORDER BY $order LIMIT $limit";

        return $search_query;
    }

    public function buildRowCountQuery($datatables_request, $table, $default_filter, $request_filter, $join, $default_group = null)
    {
        $join_statement = "";
        foreach($join as $join_key => $join_value)
        {
            if($join_statement != "")
            {
                $join_statement = $join_statement." LEFT JOIN ".$join_key." ON ".$join_value;
            }
            else
            {
                $join_statement = "LEFT JOIN ".$join_key." ON ".$join_value;
            }
        }
        $search_filter = $default_filter;
        foreach($request_filter as $request_filter_key => $request_filter_value)
        {
            if($request_filter_value["value"] != "")
            {
                $field = $request_filter_key;
                $value = $request_filter_value["value"];
                $method = $request_filter_value["method"];
                if($method == "LIKE")
                {
                    $search_filter .= ($search_filter == "")?" ".$field." LIKE '%".$value."%'":" AND ".$field." LIKE '%".$value."%'";
                }
                else if($method == "EQUAL")
                {
                    $search_filter .= ($search_filter == "")?" ".$field." = '".$value."%":" AND ".$field." = '".$value."'";
                }
            }
        }
        if($search_filter != "")
        {
            $search_filter = " WHERE ".$search_filter;
        }
        $group = "";
        if($default_group != ""){
            $group = " GROUP BY ".$default_group;
        }

        $row_count_query = "SELECT 
                                COUNT(*) AS 'total'
                            FROM $table 
                                $join_statement
                            $search_filter $group";

        return $row_count_query;
    }

    public function buildTotalCountQuery($datatables_request, $table, $default_filter, $request_filter, $join, $default_group = null)
    {
        $join_statement = "";
        foreach($join as $join_key => $join_value)
        {
            if($join_statement != "")
            {
                $join_statement = $join_statement." LEFT JOIN ".$join_key." ON ".$join_value;
            }
            else
            {
                $join_statement = "LEFT JOIN ".$join_key." ON ".$join_value;
            }
        }
        $search_filter = $default_filter;
        foreach($request_filter as $request_filter_key => $request_filter_value)
        {
            if($request_filter_value["value"] != "")
            {
                $field = $request_filter_key;
                $value = $request_filter_value["value"];
                $method = $request_filter_value["method"];
                if($method == "LIKE")
                {
                    $search_filter .= ($search_filter == "")?" ".$field." LIKE '%".$value."%'":" AND ".$field." LIKE '%".$value."%'";
                }
                else if($method == "EQUAL")
                {
                    $search_filter .= ($search_filter == "")?" ".$field." = '".$value."%":" AND ".$field." = '".$value."'";
                }
            }
        }
        if($search_filter != "")
        {
            $search_filter = " WHERE ".$search_filter;
        }
        $group = "";
        if($default_group != ""){
            $group = " GROUP BY ".$default_group;
        }

        $total_count_query = "SELECT 
                                COUNT(*) AS 'total'
                            FROM $table 
                                $join_statement
                            $search_filter $group";

        return $total_count_query;
    }
}