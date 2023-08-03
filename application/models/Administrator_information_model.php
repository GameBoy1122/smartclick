<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Administrator_information_model extends CI_Model
{
    /** ========================================================================================= **
     **           SETTING
     ** ========================================================================================= **/
    private $db_master_query;
    private $db_master_modify;
    private $db_master_report;

    private $table_name = "administrator_information";
    private $table_primary_key = "administrator_information_id";
    private $table_columns;

    private $query_functions = array("where", "or_where", "like", "or_like", "where_in");

    /** ========================================================================================= **
     **           MANDATORY FUNCTION
     ** ========================================================================================= **/
    function __construct()
    {
        parent::__construct();

        $this->db_master_query = $this->load->database("master_query",true);
        $this->db_master_modify = $this->load->database("master_modify",true);
        $this->db_master_report = $this->load->database("master_report",true);

        $this->db_master_query->cache_on();
        $this->table_columns = $this->db_master_query->list_fields($this->table_name);
        $this->db_master_query->cache_off();
    }

    function rawQuery($query = null)
    {
        $results = $this->db_master_query->query($query)->result();
        $this->logs($this->db_master_query->queries, $this->db_master_query->query_times);
        return $results;
    }

    function rawModify($query = null)
    {
        $results = $this->db_master_modify->query($query);
        $this->logs($this->db_master_modify->queries, $this->db_master_modify->query_times);
        return $results;
    }

    function rawReport($query = null)
    {
        $results = $this->db_master_report->query($query)->result();
        $this->logs($this->db_master_report->queries, $this->db_master_report->query_times);
        return $results;
    }

    function search($search = null)
    {
        $select_string = "";
        if(isset($search->join))
        {
            if(isset($search->select))
            {
                $select_string = $search->select;
            }
            else
            {
                foreach($this->table_columns as $table_column)
                {
                    $select_string .= ($select_string == "")?$this->table_name.".".$table_column." AS ".$this->table_name."::".$table_column:", ".$this->table_name.".".$table_column." AS ".$this->table_name."::".$table_column;
                }
                foreach($search->join as $join_table_name => $join_table_name_value)
                {
                    $join_table_columns = $this->db_master_query->list_fields($join_table_name);
                    foreach($join_table_columns as $join_table_column)
                    {
                        $select_string .= ($select_string == "")?$join_table_name.".".$join_table_column." AS ".$join_table_name."::".$join_table_column:", ".$join_table_name.".".$join_table_column." AS ".$join_table_name."::".$join_table_column;
                    }
                }
            }
        }
        else
        {
            if(isset($search->select))
            {
                $select_string = $search->select;
            }
            else
            {
                $select_string = implode(", ",$this->table_columns);
            }
        }

        $this->db_master_query->select($select_string);
        $this->db_master_query->from($this->table_name);

        if(isset($search->join))
        {
            foreach($search->join as $join_table_name => $join_table_column)
            {
                $this->db_master_query->join($join_table_name, $this->table_name.".".$join_table_column." = ".$join_table_name.".".$join_table_column);
            }
        }

        foreach($this->query_functions as $query_function)
        {
            if(isset($search->{$query_function}))
            {
                foreach($search->{$query_function} as $search_key => $search_value)
                {
                    $this->db_master_query->{$query_function}($search_key,$search_value);
                }
            }
        }

        if(isset($search->custom_where))    $this->db_master_query->where($search->custom_where,null,false);
        if(isset($search->group_by))        $this->db_master_query->group_by($search->group_by);
        if(isset($search->order_by))        $this->db_master_query->order_by($search->order_by);
        if(isset($search->limit))           $this->db_master_query->limit($search->limit, (isset($search->limit_start))?$search->limit_start:null);

        $result = $this->db_master_query->get()->result();
        $this->logs($this->db_master_query->queries, $this->db_master_query->query_times);

        if(isset($search->get_first) && $search->get_first == true)
        {
            if(count($result) > 0)
            {
                return $result[0];
            }
            else
            {
                return null;
            }
        }
        else if(isset($search->get_query) && $search->get_query == true)
        {
            return $this->db_master_query->last_query();
        }
        else if(isset($search->get_json) && $search->get_json == true)
        {
            return json_encode($result);
        }
        else if(isset($search->get_count) && $search->get_count == true)
        {
            return count($result);
        }
        else
        {
            return $result;
        }
    }

    function find($id)
    {
        $this->db_master_query->select("*");
        $this->db_master_query->from($this->table_name);
        $this->db_master_query->where($this->table_primary_key,$id);

        $result = $this->db_master_query->get()->result();
        $this->logs($this->db_master_query->queries, $this->db_master_query->query_times);

        if(count($result) > 0)
        {
            return $result[0];
        }
        else
        {
            return null;
        }
    }

    function save($save = null)
    {
        $data = array();
        foreach($save as $save_key => $save_value)
        {
            if(array_key_exists($save_key,$save) && in_array($save_key,$this->table_columns))
            {
                $data = array_merge($data,array($save_key=>$save_value));
            }
        }

        if(isset($data[$this->table_primary_key]))
        {
            $this->db_master_modify->where($this->table_primary_key,$data[$this->table_primary_key])->update($this->table_name, $data);
            $this->logs($this->db_master_modify->queries, $this->db_master_modify->query_times);

            return $data[$this->table_primary_key];
        }
        else
        {
            $this->db_master_modify->insert($this->table_name, $data);
            $this->logs($this->db_master_modify->queries, $this->db_master_modify->query_times);

            return $this->db_master_modify->insert_id();
        }
    }

    function update($search = null, $save = null)
    {
        $data = array();
        foreach($save as $save_key => $save_value)
        {
            if(array_key_exists($save_key,$save) && in_array($save_key,$this->table_columns))
            {
                $data = array_merge($data,array($save_key=>$save_value));
            }
        }

        foreach($this->query_functions as $query_function)
        {
            if(isset($search->{$query_function}))
            {
                foreach($search->{$query_function} as $search_key => $search_value)
                {
                    $this->db_master_modify->{$query_function}($search_key,$search_value);
                }
            }
        }

        $this->db_master_modify->set($save);
        $this->db_master_modify->update($this->table_name);
        $this->logs($this->db_master_modify->queries, $this->db_master_modify->query_times);
    }

    function delete($delete = null)
    {
        foreach($this->query_functions as $query_function)
        {
            if(isset($delete->{$query_function}))
            {
                foreach($delete->{$query_function} as $delete_key => $delete_value)
                {
                    $this->db_master_modify->{$query_function}($delete_key,$delete_value);
                }
            }
        }

        if(isset($delete->custom_where)) $this->db_master_modify->where($delete->custom_where,null,false);

        $this->db_master_modify->delete($this->table_name);
        $this->logs($this->db_master_modify->queries, $this->db_master_modify->query_times);
    }

    /** ========================================================================================= **
     **           INTERNAL USAGE FUNCTION
     ** ========================================================================================= **/
    function logs($database_queries, $database_query_times)
    {
        foreach ($database_queries as $key => $query) {
            $data = array(
                "table" => $this->table_name,
                "session" => json_encode($this->session->userdata()),
                "query" => $query,
                "date" => date("Y-m-d H:i:s"),
                "time" => $database_query_times[$key],
            );

            $this->db_master_report->insert("system_database_log", $data);
        }
    }

    /** ========================================================================================= **
     **           EXTERNAL USAGE FUNCTION
     ** ========================================================================================= **/
    function getAdministratorInformationByAdministratorId($administrator_id)
    {
        $model_filter = new stdClass();
        $model_filter->where["administrator_id"] = $administrator_id;
        $model_filter->get_first = true;
        $administrator_information = $this->search($model_filter);

        return $administrator_information;
    }
}