<?php

declare(strict_types=1);

namespace Ayzanet\Simotel;

use Ayzanet\Simotel\Exceptions\SimotelException;
use MongoDB\Client;

/**
 * Getters
 * @method \Ayzanet\Simotel\Connection getHost()
 * @method \Ayzanet\Simotel\Connection getUsername()
 * @method \Ayzanet\Simotel\Connection getPassword()
 * @method \Ayzanet\Simotel\Connection getConnection()
 * Setters
 * * @method \Ayzanet\Simotel\Connection setHost(string $host)
 * * @method \Ayzanet\Simotel\Connection setUsername(string $username)
 * * @method \Ayzanet\Simotel\Connection setPassword(string $password)
 **/
class Connection {

    private $host = 'localhost', $username = null, $password = null, $connection = null;

    public function __construct(array $configs = []) {
        foreach ($configs as $key => $value) {
            if (isset($this->{$key})) {
                $this->{$key} = $value;
            }
        }
    }

    public function __get(string $name) {
        $name = strtolower($name);
        return $this->{$name};
    }

    public function __set(string $name, $value) {
        $name = strtolower($name);
        $this->{$name} = $value;
        return $this;
    }

    public function connect() {
        try {
            $dsn = sprintf(
                'mongodb://%s:%s@%s',
                $this->username,
                $this->password,
                $this->host
            );
            $this->connection = new Client($dsn);
            return $this->connection->selectDatabase(Configs::DATABASE);
        } catch (\Exception $e) {
            throw new SimotelException($e->getMessage());
        }
    }
}