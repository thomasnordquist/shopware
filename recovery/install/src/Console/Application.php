<?php
/**
 * Shopware 5
 * Copyright (c) shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

namespace Shopware\Recovery\Install\Console;

use Pimple\Container;
use Shopware\Recovery\Install\Command\InstallCommand;
use Shopware\Recovery\Install\ContainerProvider;
use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Input\InputOption;

/**
 * @category  Shopware
 * @package   Shopware\Recovery\Install\Console
 * @copyright Copyright (c) shopware AG (http://www.shopware.de)
 */
class Application extends BaseApplication
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @param string $env
     */
    public function __construct($env)
    {
        $this->registerErrorHandler();

        parent::__construct('Shopware Installer', '1.0.0');

        $config = require __DIR__ .'/../../config/' . $env .'.php';
        $this->container = new Container();
        $this->container->register(new ContainerProvider($config));

        $this->getDefinition()->addOption(new InputOption('--env', '-e', InputOption::VALUE_REQUIRED, 'The Environment name.', $env));

        $command = new InstallCommand();
        $this->add($command);
        $this->setDefaultCommand($command->getName());
    }

    /**
     * @return Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    private function registerErrorHandler()
    {
        set_error_handler(function ($errno, $errstr, $errfile, $errline, array $errcontext) {
            // error was suppressed with the @-operator
            if (0 === error_reporting()) {
                return false;
            }

            throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
        });
    }
}
