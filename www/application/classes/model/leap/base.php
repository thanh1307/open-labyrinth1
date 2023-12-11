<?php defined('SYSPATH') OR die('Không được phép truy cập trực tiếp.');

class Model_Leap_Base extends DB_ORM_Model
{

    public function as_array($with_relations = false)
    {
        $buffer = array();
        if ($with_relations) {
            foreach ($this->relations as $name => $relation) {
                $buffer[$name] = $relation->result;
            }
        }
        foreach ($this->fields as $name => $field) {
            $buffer[$name] = $field->value;
        }

        return $buffer;
    }

    public function insert($reload = false)
    {
        $self = get_class($this);
        $is_savable = call_user_func(array($self, 'is_savable'));
        if (!$is_savable) {
            throw new Kohana_Marshalling_Exception('Message: Failed to save record to database. Reason: Model is not savable.',
                array(':class' => self::get_called_class()));
        }
        $primary_key = call_user_func(array($self, 'primary_key'));
        if (!is_array($primary_key) || empty($primary_key)) {
            throw new Kohana_Marshalling_Exception('Message: Failed to save record to database. Reason: No primary key has been declared.');
        }
        $data_source = call_user_func(array($self, 'data_source'));
        $table = call_user_func(array($self, 'table'));
        $columns = array_keys($this->fields);

        $is_auto_incremented = call_user_func(array($self, 'is_auto_incremented'));
        if ($is_auto_incremented) {
            foreach ($primary_key as $column) {
                $index = array_search($column, $columns);
                if ($index !== false) {
                    unset($columns[$index]);
                }
            }
        }
        if (!empty($columns)) {
            $builder = DB_SQL::insert($data_source)
                ->into($table);
            $count = 0;
            foreach ($columns as $column) {
                if ($this->fields[$column]->savable) {
                    $builder->column($column, $this->fields[$column]->value);
                    $this->fields[$column]->modified = false;
                    $count++;
                }
            }
            if ($count > 0) {
                if ($is_auto_incremented) {
                    $this->fields[$primary_key[0]]->value = $builder->execute(true);
                } else {
                    $builder->execute();
                }
            }
            $this->metadata['saved'] = $this->hash_code();
        }

        if ($reload) {
            $this->load();
        }
    }
}