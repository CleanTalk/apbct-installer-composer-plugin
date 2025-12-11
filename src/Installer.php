<?php

namespace Cleantalk\ApbctInstaller;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class Installer extends LibraryInstaller
{
    /**
     * @inheritDoc
     */
    public function getInstallPath(PackageInterface $package)
    {
        $package_name = $package->getName();
        $package_type = $package->getType();

        if (
            $package_type === 'cleantalk-apbct-lib' ||
            strpos($package_name, 'cleantalk/') === 0
        ) {
            $name = explode('/', $package->getName());
            $name = end($name);
            $name = explode('-', $name);
            $name_processed = [];
            foreach ( $name as $name_item ) {
                $name_processed[] = ucfirst($name_item);
            }
            return "lib/Cleantalk/Common/" . implode('', $name_processed);
        }
        return parent::getInstallPath($package);
    }

}
