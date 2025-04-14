<?php
require_once __DIR__ . '/../../core/Db.php';

class BaseModel {
    protected $table = "";
    protected $pdo;
    protected $columns = [];
    protected $query;
    protected $params = [];
    
    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function select($columns = ['*']) {
        $this->columns = $columns;
        $this->query = "SELECT " . implode(',', $this->columns) . " FROM {$this->table}";
        return $this;
    }

    public function where($column, $operator, $value) {
        $this->query .= " WHERE {$column} {$operator} ?";
        $this->params = [$value];
        return $this;
    }

    public function orderBy($column, $direction = 'ASC') {
        $this->query .= " ORDER BY {$column} {$direction}";
        return $this;
    }

    public function get() {
        if (empty($this->query)) {
            throw new Exception("Query is not set before calling get()");
        }
        $stmt = $this->pdo->prepare($this->query);
        $stmt->execute($this->params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function first() {
        $this->query .= " LIMIT 1";
        $result = $this->get();
        return $result[0] ?? null;
    }
}
