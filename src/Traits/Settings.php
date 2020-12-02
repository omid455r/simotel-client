<?php

declare(strict_types=1);

namespace Ayzanet\Simotel\Traits;

use Ayzanet\Simotel\Exceptions\SimotelException;

trait Settings {

    public function updateSettings(array $data) {
        try {
            $this->_setCollection('settings');
            return $this->collection->findOneAndUpdate(
                [],
                ['$set' => (object)$data]
            );
        } catch (\Exception $e) {
            throw new SimotelException($e->getMessage());
        }
    }

    public function getSettings() {
        try {
            $this->_setCollection('settings');
            return $this->collection->findOne();
        } catch (\Exception $e) {
            throw new SimotelException($e->getMessage());
        }
    }
}