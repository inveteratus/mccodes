<?php

class database
{
    private PDO $db;

    public string $host;
    public string $user;
    public string $pass;
    public string $database;
    public string $last_query;
    public mysqli_result|bool $result;
    public mysqli|int $connection_id;
    public int $num_queries = 0;
    public array $queries = [];

    public function __construct(string $dsn, string $user, string $password)
    {
        $this->db = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }

    public function execute(string $sql, array $context = []): PDOStatement
    {
        $statement = $this->db->prepare($sql);
        $statement->execute($context);

        return $statement;
    }

    public function lastInsertId(): int
    {
        return (int)$this->db->lastInsertId();
    }

    /**
     * @param $host
     * @param $user
     * @param $pass
     * @param $database
     * @return int
     * @deprecated
     */
    public function configure($host, $user, $pass, $database): int
    {
        $this->host     = $host;
        $this->user     = $user;
        $this->pass     = $pass;
        $this->database = $database;
        return 1; //Success.
    }

    /**
     * @return false|mysqli
     * @deprecated
     */
    public function connect(): false|mysqli
    {
        if (!$this->host) {
            $this->host = 'localhost';
        }
        if (!$this->user) {
            $this->user = 'root';
        }
        $conn =
            mysqli_connect($this->host, $this->user, $this->pass,
                $this->database);
        if (mysqli_connect_error()) {
            error_critical(mysqli_connect_errno() . ': ' . mysqli_connect_error(),
                'Attempted to connect to database on ' . $this->host,
                debug_backtrace());
        }
        // @overridecharset mysqli
        $this->connection_id = $conn;
        return $this->connection_id;
    }

    /**
     * @param $query
     * @return mysqli_result|bool
     * @deprecated
     */
    public function query($query): mysqli_result|bool
    {
        $this->last_query = $query;
        $this->queries[]  = $query;
        $this->num_queries++;
        $this->result =
            mysqli_query($this->connection_id, $this->last_query);
        if ($this->result === false) {
            error_critical(mysqli_errno($this->connection_id) . ': '
                . mysqli_error($this->connection_id),
                'Attempted to execute query: ' . nl2br($this->last_query),
                debug_backtrace());
        }
        return $this->result;
    }

    /**
     * @param mysqli_result|int $result
     * @return false|array|null
     * @deprecated
     */
    public function fetch_row(mysqli_result|int $result = 0): false|array|null
    {
        if (!$result) {
            $result = $this->result;
        }
        return mysqli_fetch_assoc($result);
    }

    /**
     * @param mysqli_result|int $result
     * @return int|string
     * @deprecated
     */
    public function num_rows(mysqli_result|int $result = 0): int|string
    {
        if (!$result) {
            $result = $this->result;
        }
        return mysqli_num_rows($result);
    }

    /**
     * @return int|string
     * @deprecated
     */
    public function insert_id(): int|string
    {
        return mysqli_insert_id($this->connection_id);
    }

    /**
     * @param mysqli_result|int $result
     * @return mixed
     * @deprecated
     */
    public function fetch_single(mysqli_result|int $result = 0): mixed
    {
        if (!$result) {
            $result = $this->result;
        }
        //Ugly hack here
        mysqli_data_seek($result, 0);
        $temp = mysqli_fetch_array($result);
        return $temp[0];
    }

    /**
     * @param $text
     * @return string
     * @deprecated
     */
    public function escape($text): string
    {
        return mysqli_real_escape_string($this->connection_id, $text);
    }

    /**
     * @return int|string
     * @deprecated
     */
    public function affected_rows(): int|string
    {
        return mysqli_affected_rows($this->connection_id);
    }

    /**
     * @param mysqli_result|int $result
     * @return void
     * @deprecated
     */
    public function free_result(mysqli_result|int $result): void
    {
        mysqli_free_result($result);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return void
     * @deprecated
     */
    public function __call(string $name, array $arguments)
    {
        call_user_func_array([$this->connection_id, $name], $arguments);
    }

}
