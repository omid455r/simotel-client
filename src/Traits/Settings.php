<?php

declare(strict_types=1);

namespace Ayzanet\Simotel\Traits;

trait Settings {

    public function updateSettings(array $data) {

    }

    public function getSettings() {

        $collection = $this->setCollection('settings');
    }
}