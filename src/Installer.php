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
        return "lib/Cleantalk/Common/" . end($name);
    }

}