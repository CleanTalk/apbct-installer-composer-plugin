<?php

namespace Cleantalk\ApbctInstaller;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class Installer extends LibraryInstaller
{
    /**
     * @inheritDoc
     */
    public function supports($packageType)
    {
        return $packageType === 'cleantalk-apbct-lib';
    }

    /**
     * @inheritDoc
     */
    public function getInstallPath(PackageInterface $package)
    {
        $name = explode('/', $package->getName());
        $name = end($name);
        $name = explode('-', $name);
        $name_processed = [];
        foreach ( $name as $name_item ) {
            $name_processed[] = ucfirst($name_item);
        }
        return "lib/Cleantalk/Common/" . implode('', $name_processed);
    }

}