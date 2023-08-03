<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address_districts_model extends CI_Model
{
    // select, join, query_functions, custom_where, group_by, order_by, 
    // limit, limit_start, get_first, get_query, get_json, get_count
    private $db_master_query;

    private $table_name = 'districts';
    private $table_primary_key = 'id';
    private $table_columns;

    private $query_functions = array('where', 'or_where', 'like', 'or_like', 'where_in', 'where_not_in');
    
    function __construct()
    {
        parent::__construct();

        $this->db_master_query = $this->load->database('master_query', true);
        
        $this->db_master_query->cache_on();
        $this->table_columns = $this->db_master_query->list_fields($this->table_name);
        $this->db_master_query->cache_off();
    }
    
    public function rawQuery($query = null)
    {
        $results = $this->db_master_query->query($query)->result();
        return $results;
    }
    
    public function rawModify($query = null)
    {
        $results = $this->db_master_query->query($query);
        return $results;
    }
    
    public function search($search = null)
    {
        if(empty($search) || count((array)$search) == 0) return null;
        
        $select_string = '';

        if(isset($search->select)) {
            $select_string = $search->select;
        
        } else {
            if(isset($search->join))
            {
                // This table name.
                foreach($this->table_columns as $table_column)
                {
                    if($select_string != '') {
                        $select_string .= ', ';
                    }

                    $select_string .= $this->table_name.'.'.$table_column.' AS '.$this->table_name.'::'.$table_column;
                }

                // Join table name.
                foreach($search->join as $join_table_name => $join_table_on)
                {
                    $join_table_columns = $this->db_master_query->list_fields($join_table_name);

                    foreach($join_table_columns as $join_table_column)
                    {
                        if($select_string != '') {
                            $select_string .= ', ';
                        }

                        $select_string .= $join_table_name.'.'.$join_table_column.' AS '.$join_table_name.'::'.$join_table_column;
                    }
                }
            }
            else
            {
                $select_string = implode(', ', $this->table_columns);
            }
        }

        $this->db_master_query->select($select_string);
        $this->db_master_query->from($this->table_name);

        if(isset($search->join))
        {
            foreach($search->join as $join_table_name => $join_table_on)
            {
                $this->db_master_query->join($join_table_name, $join_table_on, 'LEFT');
            }
        }

        foreach($this->query_functions as $query_function)
        {
            if(isset($search->{$query_function}))
            {
                foreach($search->{$query_function} as $search_key => $search_value)
                {
                    $this->db_master_query->{$query_function}($search_key, $search_value);
                }
            }
        }

        if(isset($search->custom_where))    $this->db_master_query->where($search->custom_where, null, false);
        if(isset($search->group_by))        $this->db_master_query->group_by($search->group_by);
        if(isset($search->order_by))        $this->db_master_query->order_by($search->order_by);
        if(isset($search->limit))           $this->db_master_query->limit($search->limit, (isset($search->limit_start)) ? $search->limit_start : null);

        $result = $this->db_master_query->get()->result();

        // Option.
        if(isset($search->get_first) && $search->get_first == true)
        {
            if(count($result) > 0) {
                return $result[0];

            } else {
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
        
        return $result;
    }

    public function find($id = null)
    {
        $this->db_master_query->select('*');
        $this->db_master_query->from($this->table_name);
        $this->db_master_query->where($this->table_primary_key, $id);

        $result = $this->db_master_query->get()->result();
        
        if(count($result) > 0) {
            return $result[0];
        }

        return null;
    }
    
    public function save($save = null)
    {
        if(empty($save) || count((array)$save) == 0) return null;
        
        $data = array();
        
        // Set data for insert.
        foreach($save as $save_key => $save_value)
        {
            if(isset($save_key, $save) && in_array($save_key, $this->table_columns))
            {
                $data = array_merge($data, array($save_key => $save_value));
            }
        }

        if(isset($data[$this->table_primary_key]))
        {
            $id = $data[$this->table_primary_key];
            unset($data[$this->table_primary_key]);

            $this->db_master_query->where($this->table_primary_key, $id)->update($this->table_name, $data);
            return $id;
        }
        
        $this->db_master_query->insert($this->table_name, $data);
        return $this->db_master_query->insert_id();
    }

    public function update($search = null, $save = null)
    {
        if(empty($search) || empty($save) || count((array)$search) == 0 || count((array)$save) == 0) return null;
        
        $data = array();

        foreach($save as $save_key => $save_value)
        {
            if(isset($save_key, $save) && in_array($save_key, $this->table_columns))
            {
                $data = array_merge($data, array($save_key => $save_value));
            }
        }

        foreach($this->query_functions as $query_function)
        {
            if(isset($search->{$query_function}))
            {
                foreach($search->{$query_function} as $search_key => $search_value)
                {
                    $this->db_master_query->{$query_function}($search_key, $search_value);
                }
            }
        }

        if(isset($search->custom_where)) $this->db_master_query->where($search->custom_where, null, false);
        
        return $this->db_master_query->update($this->table_name, $data);
    }
    
    public function delete($delete = null)
    {
        if(empty($delete) || count((array)$delete) == 0) return null;

        foreach($this->query_functions as $query_function)
        {
            if(isset($delete->{$query_function}))
            {
                foreach($delete->{$query_function} as $delete_key => $delete_value)
                {
                    $this->db_master_query->{$query_function}($delete_key, $delete_value);
                }
            }
        }

        if(isset($delete->custom_where)) $this->db_master_query->where($delete->custom_where, null, false);

        return $this->db_master_query->delete($this->table_name);
    }
}
