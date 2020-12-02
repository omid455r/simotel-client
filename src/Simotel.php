<?php

declare(strict_types=1);

namespace Ayzanet\Simotel;

use Ayzanet\Simotel\Exceptions\SimotelException;
use Ayzanet\Simotel\Traits\Settings;

final class Simotel {

    use Settings;
    protected $connection;

    public function __construct(Connection $connection) {
        $this->connection = $connection;
    }

    protected function setCollection(string $name) {

        if (!in_array($name, Configs::COLLECTIONS))
            throw new SimotelException('Collection name is not valid!');

        return $this->connection->selectCollection($name);
    }
}