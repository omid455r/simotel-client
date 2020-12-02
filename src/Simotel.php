<?php

declare(strict_types=1);

namespace Ayzanet\Simotel;

use Ayzanet\Simotel\Exceptions\SimotelException;
use Ayzanet\Simotel\Traits\Settings;
use Ayzanet\Simotel\Traits\Users;

final class Simotel {

    use Settings;
    use Users;

    private $connection;
    private $collection;

    public function __construct(Connection $connection) {
        $this->connection = $connection;
    }

    private function _setCollection(string $name) {

        if (!in_array($name, Configs::COLLECTIONS))
            throw new SimotelException('Collection name is not valid!');

        $this->collection = $this->connection->selectCollection($name);
        return $this;
    }
}