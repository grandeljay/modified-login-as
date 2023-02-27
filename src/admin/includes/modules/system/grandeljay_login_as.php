<?php

/**
 * Login as
 *
 * @author  Jay Trees <login-as@grandels.email>
 * @link    https://github.com/grandeljay/modified-login-as
 * @package GrandelJayLoginAs
 *
 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
 */

use RobinTheHood\ModifiedStdModule\Classes\StdModule;

class grandeljay_login_as extends StdModule
{
    public const VERSION = '0.1.0';

    public function __construct()
    {
        parent::__construct();

        $this->checkForUpdate(true);
    }

    public function install()
    {
        parent::install();

        $this->setAdminAccess(self::class);
    }

    protected function updateSteps()
    {
        if (version_compare($this->getVersion(), self::VERSION, '<')) {
            $this->setVersion(self::VERSION);

            return self::UPDATE_SUCCESS;
        }

        return self::UPDATE_NOTHING;
    }

    public function display()
    {
        return $this->displaySaveButton();
    }

    public function remove()
    {
        parent::remove();

        $this->deleteAdminAccess(self::class);
    }
}
